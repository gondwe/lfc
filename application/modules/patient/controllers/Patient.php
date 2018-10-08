<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends MX_Controller {

	// protected $data;

	public function __construct()
	{
		$this->load->model("patient_model");
	}


	public function pfdata($id){ return $this->patient_model->profile($id); }

	public function profile($id){
		$data["profile"] = $this->pfdata($id);
		serve("profile",$data);
	}

	public function diagnosis($id){
		$data["prof"] = $this->pfdata($id);
		serve("diagnosis",$data);
	}

	public function section($section=null){
		$data = $this->patient_model->clinics($section);
		serve("clinic",$data);
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

	public function addcharge($id){

		$this->load->model("items/items_model");
		$this->load->model("billing/bills_model");

		$data["profile"] = $this->pfdata($id);
		$data["items"] = $this->items_model->itemslist(); 
		$data["charges"] = $this->bills_model->chargesbyid($id);
		
		serve("charge",$data);
	}

	// function savecharge(){
	// 	pf($_POST);
	// }


		
	public function savecharge(){
		if(isset($_POST["queries"])){

			$sql = "";
			$user = $this->session->user_id;		
			$txn = time();

			$post = $_POST["queries"];
	
			$sql = "";
			foreach($post as $i=>$j){
				$a = $j[1];$b = $j[0];$c = $j[2];
				$sql .= "insert into tbl_charges (txn, charge_id, item_id, quantity, user_id) values ('$txn','$a','$b','$c','$user');";
			}
		
			$sql = array_filter(explode(";",$sql));
			foreach($sql as $v){
				$this->db->query($v);
			}
		
			$this->session->set_flashdata('info', "Charge Saved Succesfully");
		}
	}

	public function discharge(){
		$data = $this->patient_model->recent();
		serve("discharge",$data);
	}
}
