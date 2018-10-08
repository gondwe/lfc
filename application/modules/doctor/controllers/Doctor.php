<?php

class Doctor extends MX_Controller {

    function __construct(){
        $this->load->model("patient_model");

    }

    function diary($a){
        
        $data["patient"] = $this->patient_model->profile($a);
        serve("bookpatient",$data);
    }

    function savebooking($id){

    }

    function index(){
        $data["recent"] = $this->patient_model->recent();
        $data["clinics"] = $this->patient_model->clinics();
        serve("dashboard",$data);
    }


    function enqueue($id){
        serve("enqueue",["id"=>$id]);
    }


    function book(){
        pf($_POST);
    }
}