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
		$data["recent"] = $this->recent()["recent"];
		$data["clinics"] = $this->patient_model->clinics();

		serve("dashboard",$data);
	}


	function osod(){
		$data["recent"] = $this->recent()["recent"];
		serve("main",$data);
	}



	public function tablesearch(){
		$s = $this->input->post("x");
		if($s == ""){ 
			$data["search"]  = $this->recent()["recent"];
		}else{
			$data["search"] = $this->patient_model->namesearch($s);
		}
		$this->load->view("screening/namesearch",$data);
		// $this->load->view("screening/namesearch",$data);
	}


	
	function query(){
		pf($_POST);
	}

	
	function update(){
		pf($_POST);
	}



}
