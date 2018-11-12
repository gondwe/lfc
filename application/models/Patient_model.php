<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

    function __construct()
    {
        // $this->load->helper("template");
        $_SESSION["activepatient"] = fetch("select max(id) from patient_master");
    }

    /* 
    *   initialize active patient
    */
    function init(){
        $this->session->activepatient  =  $this->activepatient();
    }

    /*  
        *   send a list of clinic section data to the view
        *   @param:$section
        *   @return:object();
    */
    public function clinics($section = null){
        $types = gl("select id, b as section from dataconf where a='patient_type' ");
		$data["clinic_types"] = $types;
		$data["category_count"] = gl("select dc.b as section, count(pm.id) as total from patient_master as pm left join dataconf as dc on dc.id = pm.category group by dc.id");
        $data["section"] = is_null($section)? current(array_keys($types)) : $section;
        return $data;
    }


    /*  
        *   list of 100 last patients
        *   @param:$limit
        *   @return:object();
    */
    function recent($svc=null, $id=null, $limit="100"){
        $data["clinics"] = $this->clinics();
        $where = is_null($id)? null : " where p.id = '$id' ";
        switch($svc) {
            case "chaplain" : $sql = "select p.*, dcc.b as faith, lcase(u.last_name) as chaplain, ucase(p.patient_names) as patient_names, pt.b as ptype from patient_master as p 
                                left join dataconf as pt 
                                on pt.id = p.category and pt.a = 'patient_type' 
                                right join chaplain as ch on ch.pid = p.id
                                left join users as u on u.id = ch.pastor
                                left join dataconf as dcc on dcc.a = 'religion' and dcc.id = ch.religion
                                $where
                                order by ch.date desc ";
            break;

            default : $sql = "select p.*, ucase(p.patient_names) as patient_names, pt.b as ptype from patient_master as p 
                                left join dataconf as pt 
                                on pt.id = p.category and pt.a = 'patient_type' 
                                $where
                                order by p.date desc ";
            break;
        }

        $data["recent"] = get($sql."limit ". $limit);


        return $data;
    }


    /*  
        *   filter names in dashboard table -- to be scraped off by datatable
        *   @param:$i 
        *       phonenumber
        *       names
        *   @return:object();
    */
    function namesearch($i){
        return get("select p.*, pt.b as ptype from patient_master as p 
        left join dataconf as pt 
        on pt.id = p.category and pt.a = 'patient_type' 
        where patient_names like '%$i%' or nationalid like '$i' or tel1 like '$i' order by p.date desc");
    }


    /*  
        *   patient details
        *   @param:$id
        *   @return:object array;
    */
    function profile($id=null){
        if(is_null($id)) return array();
        return get("select p.*, ucase(p.patient_names) as patient_names, age(p.dob) as age,  pt.b as ptype, gender.b as sex 
        from patient_master as p 
        left join dataconf as pt on pt.id = p.category and pt.a = 'patient_type' 
        left join dataconf as gender on gender.id = p.sex and gender.a = 'gender'
        where p.id = '$id'");
    }




    /*  
        *   info required at screening dashboard
        *   @param:$id
        *   @return:object
    */
    public function screening($id){
        if(is_null($id)) return array();
        return get("select sc.* 
            from screening as sc 
            where pid = '$id'");
    }





    /*  
        *   note sure whyi have a double function here *******
        *   @param:$id
        *   @return:object();
    */
    public function patient_details($id){
        $id = current($id)->charge_id;
        return $this->profile($id);
    }


    /*  
        *   return the last id in patient_master
        *   @return:string;
    */
    public function activepatient(){
        return fetch("select id from patient_master where id = (select max(id) from patient_master)");
    }



    /* 
    *search patient using id 
    *@returns patient object
     */
    public function find($id){
        return $this->db->where("id", $id)->get("patient_master")->row();
    }


    

    // /*
    //     *   setting and unsetting stack 
    //     *   @param $section
    //     *   @param $action
    //     *   @param $data
    //     *
    //     *   USAGE
    //     *   ===========
    //     *   $j = $this->patient_model->qstack("testing","set", '11');
    //     *   $j = $this->patient_model->qstack("testing","get");
    // */
    // public function qstack($section, $action, $id=null){
        
    //     if(!isset($_SESSION[$section])) $this->session->set_userdata([$section=>[]]);

    //     if($action == "get"){
    //         if(!is_null($id)) {
    //             $ret = ($_SESSION[$section[$id]]);
    //             unset($_SESSION[$section[$id]]);
    //         }
    //         if (empty($_SESSION[$section])) return "$section queue is empty ";
    //         return $ret;
    //     }else{
    //         $_SESSION[$section][$id] = $id;
    //     }

	// }


}