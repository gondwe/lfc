<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

    function __construct()
    {
        $this->load->helper("template");
    }

    function recent(){
        return get("select p.*, pt.b as ptype from patient_master as p 
        left join dataconf as pt 
        on pt.id = p.category and pt.a = 'patient_type' 
        order by p.date desc limit 100 ");
    }

    function namesearch($i){
        return get("select p.*, pt.b as ptype from patient_master as p 
        left join dataconf as pt 
        on pt.id = p.category and pt.a = 'patient_type' 
        where patient_names like '%$i%' or nationalid like '$i' or tel1 like '$i' order by p.date desc");
    }

    function profile($id){
        return get("select p.*, pt.b as ptype from patient_master as p 
        left join dataconf as pt 
        on pt.id = p.category and pt.a = 'patient_type' 
        where p.id = '$id'");

    }

}