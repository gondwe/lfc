<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends MX_Controller {

	// protected $data;

	public function __construct()
	{
		$this->load->model("patient_model");
	}

	// public function recent(){
	// 	return  $this->patient->recent(); 
	// }

	// public function dashboard(){
	// 	$data["recent"] = $this->recent();
	// 	serve("dashboard",$data);
	// }
	public function pfdata($id){
		return $this->patient_model->profile($id);
	}

	public function profile($id){
		$data["profile"] = $this->pfdata($id);
		serve("profile",$data);
	}

	public function diagnosis($id){
		$data["prof"] = $this->pfdata($id);
		serve("diagnosis",$data);
	}


	// public function tablesearch(){
	// 	$s = $this->input->post("x");
	// 	if($s == ""){ 
	// 		$data["search"]  = $this->recent();
	// 	}else{
	// 		$data["search"] = $this->patient->namesearch($s);
	// 	}
	// 	$this->load->view("screening/namesearch",$data);
	// }


	public function edit($id){
		$data["profile"]  = $this->pfdata($id);
		serve("patient_edit",$data);
	}

	public function new(){
		redirect("crud/new/patient_master");
		// $data["profile"] = $this->patient_model->profile($id);
	}
}
