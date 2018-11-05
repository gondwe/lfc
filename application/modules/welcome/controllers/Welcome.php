<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	function __construct(){
		$this->load->model("user");
		$this->load->model("patient_model");
		$this->load->library("ion_auth");
	}
	
	public function index()
	{
		$this->user->init();
		$this->patient_model->init();
		$data["hello"] = "Welcome Back";
		serve("welcome_message",$data);


	}
}
