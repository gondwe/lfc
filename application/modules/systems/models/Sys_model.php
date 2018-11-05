<?php 

defined("BASEPATH") || exit("Acha Ujinga");

class Sys_Model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }


    public function cum_years(){
        return get("select distinct year(date) as id, year(date) as year from datalog");
    }

    public function logged_dates(){
        $d = get('select distinct date(date) as dates from datalog order by date desc');
        return $d;
    }
    

    public function active_logs(){
        return $this->db
                    ->select('d.*, u.username as user')
                    ->from('datalog d')
                    ->join('users u', 'u.id = d.userid', 'left')
                    ->order_by('d.date','DESC')
                    ->get()
                    ->result();
    }


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



    protected function dumptext($string){
        pf($string);
        $filename = ('assets/logs/'.date("d-m-Y").strtotime("now").'.sky');
        $j = fopen($filename,"wb");
        fwrite($j,$string);
        fclose($j);
    }
}