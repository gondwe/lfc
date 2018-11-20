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
        $data["procs"] = $this->doctor_model->procs();
        $data["list"] = $this->doctor_model->theatrelist();

        serve("bookpatient",$data);
    }

    function savebooking($id){

    }

    function index(){
        // $a = $a ?? $_SESSION["activepatient"];
        $data["patient"] = $this->patient_model->profile($a ?? $this->session->active_patient);
        $data["list"] = $this->doctor_model->theatrelist();
        $data["recent"] = $this->patient_model->recent();
        $data["clinics"] = $this->patient_model->clinics();
        serve("dashboard",$data);
    }


    function enqueue($id){
        $data["id"] = $id;
        $data["drlist"] = $this->doctor_model->active_doctors();
        $data["procs"] = $this->doctor_model->procs();
        serve("enqueue",$data);
    }

/* book a session for a given patient
    *   @param $patient id
    *   @param $date
    *   @param $doctor in charge
    *   @param $procedure to be conducted
 */

    function book($id){
        $p = $_POST;
        $rf = isset($p["rf"]) ? "1" : null;
        $lf = isset($p["lf"]) ? "2" : null;
        $bf = (isset($p["lf"]) && isset($p["rf"])) ? "3" : null;
        
        $eye = $rf ?? $lf; $eye = $bf ?? $eye;

        if($eye){
            if(isset($p["lf"])) unset($p["lf"]);
            if(isset($p["rf"])) unset($p["rf"]);
            $p["eye"] = $eye;
            $p["pid"] = $id;

            if($this->db->insert("bookings", $p)){ redirect("doctor/theatrelist"); }

        }else{
            error("Please Select Eye");
            $values = $p;
            
            $data["id"] = $id;
            $data["drlist"] = $this->doctor_model->active_doctors();
            $data["procs"] = $this->doctor_model->procs();
            $data["values"]= $values;
            render("enqueue",$data);
        }
        
    }

/* retrieve all future appointments starting now */
    public function theatrelist($a=null){
        $a = $a ?? $_SESSION["activepatient"];
        $data["patient"] = $this->patient_model->profile($a);
        $data["list"] = $this->doctor_model->theatrelist();
        render("theatrelist",$data);
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