<?php

class Doctor extends MX_Controller {

    function __construct(){
        $this->load->model("patient_model");
        $this->load->model("doctor_model");

    }

    function diary($a=null){
        $a = $a ?? $_SESSION["activepatient"];
        $data["patient"] = $this->patient_model->profile($a);
        $data["doctors"] = $this->doctor_model->active_doctors();
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

    function training(){
        serve("checklist");
    }

    

	public function svc($service=null){
		if(file_exists(APPPATH."modules/doctor/views/".$service.".php")){
			$data = $this->patient_model->recent();
			serve($service,$data);
		}else{
			render("service_not_found");
		}
	}

}