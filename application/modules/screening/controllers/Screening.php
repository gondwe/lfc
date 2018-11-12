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


	function osod($id=null){
		$this->session->screening = isset($this->session->screening) ? $this->session->screening : $this->session->activepatient;
		$id = $id ?? $this->session->screening;
		$data["id"] = $id;
		$recent = $this->patient_model->profile($id);
		$scrn = $this->patient_model->screening($id);
		$data["recent"] = empty($recent)? array() : current($recent);
		$data["screening"] = empty($scrn)? array() : end($scrn);
		serve("main",$data);
	}



	public function tablesearch(){
		$s = $this->input->post("x");
		if($s == ""){ $data["search"]  = $this->recent()["recent"]; }else{ $data["search"] = $this->patient_model->namesearch($s); }
		$this->load->view("screening/namesearch",$data);
	}


	
	function query($id=null){
		$recent = $this->patient_model->profile($id);
		$scrn = $this->patient_model->screening($id);
		$data ["prof"] = $recent;
		$data ["scrn"] = $scrn;

		if(!empty($data["prof"])){
			$_SESSION['screening'] = $id;
		} else {
			notice('PATIENT NO. NOT FOUND',2);
		}

		echo json_encode($data);
	}

	
	function update($pid = null, $ref = null){
		// pf($_POST);
		if(isset($_POST["pid"])){
			if($_POST["pid"]==""){
				notice("Patient Number not detected. Kindly Search No.",1);
			}else{
				$p = $_POST;
				$od = $p["rf"];
				$os = $p["lf"];
				$cc = trim($p["cc"]);
				$pid = $p["pid"];
				$record_exists = fetch("select id from screening where date <> curdate() and pid = '$pid' ");
				// var_dump($record_exists);
				if($record_exists){
					$sql = "update screening set od = '".$od."', os = '".$os."', cc = '".$cc."' where pid = '".$od."' ";
				}else{
					$sql = "insert into screening (pid, od, os, cc ) values( '".$pid."', '".$od."', '".$os."', '".$cc."' )";
				}
				// pf($sql);
				if(process($sql)) {
					notice("Data Saved Successfully");
					manage_stack("screening","chaplain", $pid);
				}
				
				// $_SESSION['screening'] = $pid;
			}
		}
		$ref = $ref ?? "screening/osod/".$pid;
		$ref = str_replace(".","/",$ref);
		
		// pf($ref);
		redirect($ref);
	}



}
