<?php 

defined("BASEPATH") || exit("Stop It");

class Sys_Model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    /* retrieve distinct years of accumulated logs */
    public function cum_years(){
        return get("select distinct year(date) as id, year(date) as year from datalog");
    }

    /* a list of the dates so far */
    public function logged_dates(){
        $d = get('select distinct date(date) as dates from datalog order by date desc');
        return $d;
    }
    
    /* get the logged events  */
    public function active_logs(){
        return $this->db
                    ->select('d.*, u.username as user')
                    ->from('datalog d')
                    ->join('users u', 'u.id = d.userid', 'left')
                    ->order_by('d.date','DESC')
                    ->get()
                    ->result();
    }

    /* clear the logged events and make backup */
    public function clearlogs(){
        $year = $_POST["year"];
        $month = $_POST["month"];

        $data = $this->db
                    ->where("year(d.date) = '$year' and month(d.date) = '$month' ")
                    ->select('d.date, u.username, d.operation, d.host')
                    ->from('datalog d')
                    ->join('users u', 'u.id = d.userid')
                    ->get()
                    ->result_array();

        $dat = array_map(function($j){
            return join(">>|<<",$j);
        },[array_map(function($i){ return join(";;",$i); },$data)]);

        if($dat[0])
        {
            $this->dumptext($dat[0]);
            process("delete from datalog where year(date) = '$year' and month(date) = '$month'");

        } else {
            notify("No Data Available",2);
        }
    }


    /* dump text of any string */
    protected function dumptext($string){
        $filename = ('assets/logs/'.date("d-m-Y").strtotime("now").'.sky');
        $j = fopen($filename,"wb");
        fwrite($j,$string);
        fclose($j);
    }


    /* save or delete depending on mouse click */
    public function flipstore($xd, $id){
        $where = ["b"=>$xd, "c"=>$id, "a"=>"groupstore"];
        
        $exists  = $this->db->select(" count(id) as a ")->where($where)->get("dataconf")->row('a');
    
        if($exists){ 
            $this->db->delete("dataconf", $where);
        }else{
            $this->db->insert("dataconf", $where);
        }

    }


    /* load defaults for the questate */
    public function questate($section){
        $section = strtolower($section);
        $data = [];
        if($section === "chaplain"){
            $pq = $_SESSION["chaplainq"] ?? array();
            $id = empty($pq)? $this->patient_model->activechaplain() : current($pq);
            $data = $this->patient_model->profile($id);
            $data['cc'] = fetch("select cc from screening where pid = ".$id." ");
            $data['faith'] = fetch("select d.b as faith from chaplain as c 
                                        left join dataconf as d on d.a = 'religion' and d.id = c.religion
                                        where c.pid = ".$id." ");
            $data['isold'] = isset($_SESSION["chaplainq"]) ? FALSE : TRUE;
        }

        return $data;
    }

}