<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screening extends MX_Controller {

	protected $data;

	public function __construct()
	{
		$this->load->model("patient_model");
	}

	public function recent(){
		return  $this->patient_model->recent(); 
	}

	public function dashboard(){
		$data["recent"] = $this->recent();
		serve("dashboard",$data);
	}


	public function tablesearch(){
		$s = $this->input->post("x");
		if($s == ""){ 
			$data["search"]  = $this->recent();
		}else{
			$data["search"] = $this->patient_model->namesearch($s);
		}
		$this->load->view("screening/namesearch",$data);
		// $this->load->view("screening/namesearch",$data);
	}
}
