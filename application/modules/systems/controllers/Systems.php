<?php 

class Systems extends CI_Controller {

    protected $admin_msg = "Admin Section. This Module is restricted to the reserved account. Thanks";
    protected $admin_action = "Admin Section. This Operation is restricted to the reserved account. Thanks";
    protected $accessible = false;

    public function __construct(){
        parent::__construct();
        $this->load->library("ion_auth");
        $this->load->model("sys_model");
        $this->load->model("patient_model");
        $this->check_access();
    }
    
    
    function index(){  $this->admin(); }


    /* 
    * set current user accesibility on construct 
    */
    private function check_access(){
        if($this->ion_auth->is_admin()){
            $this->accessible = true;
        }
    }


    
    /* 
    * serve & protect the admin route 
    */    
    function admin(){
        $data = [];
        if($this->accessible){
            datalog("access on admin dashboard",1);
            serve("dashboard",$data);
        }else{
            datalog("access attempt on admin dashboard");
            protect($this->admin_msg);
        }
    }

    

    /* 
    * serve & protect the developer route 
    */
    function developer(){
        $data = [];
       
        if($this->ion_auth->is_admin()){
            serve("developer",$data);
        }else{
            protect($this->admin_msg);
        }
    }



    /* 
    *   redirect the the 404 overide route 
    *   redirect the the faqs route 
    */
    public function lost(){ serve("lost"); }
    
    public function faqs(){ render("faqs"); }
    
    
    

    /* 
    *   purge logs
    */
    public function purge($what=null){
        if($this->accessible) {
            if(isset($_POST['year'])){ $this->sys_model->clearlogs(); }
            
            $data["years"] = $this->sys_model->cum_years();
            
            $data["backups"] = array_slice(scandir("assets/logs",1), 0,-2);
            
            serve("purge", $data);
        }else{
            protect($this->admin_action);
        }
    }



    

    /* 
    *   serve & protect audit trail
    */
    public function audit_trail($date=null){
        if($this->accessible) {
            $data["dates"] = $this->sys_model->logged_dates();
           
            $data["logs"] = $this->sys_model->active_logs();
           
            render("trails",$data);
        }else{
            protect($this->admin_msg);
        }
    }


    /* 
    *   get notifications as they trickle in 
    */
    public function notifications($id=null, $from=null){

        /* from whom ? */
        $who = $this->db->where("id",$from)->get("users")->row("username") ?? "Skylark Bot";
        $direct = $this->session->user_id ==  $id ? TRUE : FALSE;
        $array = ["mine"=>$direct,"from"=>rx($who.":")];

        echo json_encode($array);
    }


    

    /* 
    *   get queing as it trickles in 
    */
    public function qnotes($id=null, $from=null){

        /* from whom ? */
        $who = $this->db->where("id",$from)->get("users")->row("username") ?? "Skylark";

        /* is part of a group message ? ? */
        $groups = array_column($this->ion_auth->groups($this->session->user_id)->result(),'id');
        $groups = "'".join("','",$groups)."'";
        
        $sql = "SELECT dd.b AS cat 
                    FROM dataconf AS dd 
                    WHERE dd.a = 'group_cat' AND dd.id 
                    IN (SELECT DISTINCT d.b 
                        FROM dataconf AS d 
                        WHERE d.a = 'groupstore' 
                        AND d.c IN ($groups)
                    )
                ";
        
        $gcat = array_column(get($sql),"cat");

        $group = "false";
        foreach($gcat as $g){ if(preg_match("/$id?/i",$g,$i)){ $group = "true"; break; } }
        
        pf($group);

        $direct = $this->session->user_id ==  $id || $group ? TRUE : FALSE;
        
        $array = ["mine"=>$direct,"from"=>$who];
        echo json_encode($array);
    }


    /* mainly to handle queuing */
    public function access_control(){
        $data['groups'] = $this->ion_auth->groups()->result();
        $data['group_cats'] = $this->db->where('a','group_cat')->get('dataconf')->result();       
        $data['qtypes'] = $this->db->where('a','qtype')->get('dataconf')->result();       
        serve('groupcat', $data);
    }


    /* set the active group access list tab */
    function activegal($action,$id, $xd=null){

        switch($action){
            case "set" : $this->session->set_userdata('activegal', $id); break;
            case "del" : $this->db->delete("dataconf", ["id"=>$id]); break;
            case "pop" : $this->sys_model->flipstore($id, $xd); break;
        }


    }




    /* save group categories  */
    function addgroupcats(){
        $_POST["b"] = "skylark_".$_POST["b"];
        if($this->db->insert("dataconf", $_POST)){
            redirect("systems/access_control");
        }
    }

}