<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends MX_Controller {

	public function __construct()
	{
		$this->load->model("patient_model");
		$this->load->library("ion_auth");
		$this->can_register_patient = ["admin","reception"];
	}


	public function index(){
		$this->profile();
	}

	public function pfdata($id){ return $this->patient_model->profile($id); }

	public function profile($id=null){
		$id = $id ?? $_SESSION["activepatient"]; 
		$this->session->activepatient = $id;
		$data["profile"] = $this->pfdata($id);
		serve("profile",$data);
	}


	/* 
	* serve a list of sections  
	* general & private 
	*/
	public function section($section=null){
		$data = $this->patient_model->clinics($section);
		serve("clinic",$data);
	}

	
	public function edit($id){
		$data["profile"]  = $this->pfdata($id);
		serve("patient_edit",$data);
	}


	/* 
	* new patient registration view
	* require access to add new patient 
	*/
	public function new(){
		if($this->ion_auth->in_group($this->can_register_patient)){
			serve("new");
		}else{ protect();}
	}


	/* 
	* add charges to active  patient  
	* ************ Waiting Demolition ******************
	*/
	public function addcharge($id=null){
		$id = $id ?? $_SESSION["activepatient"]; 
		$this->load->model("items/items_model");
		$this->load->model("billing/bills_model");
		
		$data["profile"] = $this->pfdata($id);
		$data["items"] = $this->items_model->itemslist(); 
		$data["charges"] = $this->bills_model->chargesbyid($id);
		
		serve("charge",$data);
	}
	
	
	
	
	
	/* 
	* save added charges to active  patient  
	* ************ Waiting Demolition ******************
	*/
	public function savecharge(){
		if(isset($_POST["queries"])){

			$user = $this->session->user_id;		
			$txn = time();

			// $post = $_POST["queries"];
	
			$sql = "";
			foreach($_POST["queries"] as $i=>$j){
				$a = $j[1];$b = $j[0];$c = $j[2];
				$sql .= "insert into tbl_charges (txn, charge_id, item_id, quantity, user_id) values ('$txn','$a','$b','$c','$this->session->user_id');";
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


	/* 
	* retrieve patient related  services
	* @param:servicename
	* @return:serviceview  
	*/
	public function svc($service=null, $id=null){
		if(file_exists(APPPATH."modules/patient/views/".$service.".php")){
			$serviceq = $service."q";
			$view = is_null($id)? $service : $service."_detail";

			$data = $this->patient_model->recent($service, $id);
			if($id){
				
			}else{
				$qids = $this->session->$serviceq ?? []; /* mock  */ // $qids = ["4"=>"4",20=>"20"];
				$data["q"] = array_map(function($id){ return current($this->patient_model->profile($id)); },$qids);
			}

			serve($view,$data);
		}else{
			render("service_not_found");
		}
	}


	public function mwork(){
		$data = [];
		serve("mwork",$data);
	}



	/* 
	* search patient using id 
	* ajax calls Only !
	*/
	public function find($id, $field = null){
		// header("Access-Control-Allow-Origin : *");
		$data = $this->patient_model->find($id);
		$data = $data->$field ?? $data; 
		echo json_encode($data);
	}


	/* 
	* raise patient id on session service 
	* @param :patient id
	*/
	public function svc_activate($svc,$id){
		$_SESSION[$svc] = $id;
	}


	/* 
	* set the active profile tab 
	*/
	public function setpf_tab($active){
		$_SESSION["pftab"] = $active;
	}


	public function saveprescription($id){
		$p = $_POST;
		// pf($p);

		$od = isset($p["od"]) ? "1" : null;
        $os = isset($p["os"]) ? "2" : null;
        $bf = (isset($p["os"]) && isset($p["od"])) ? "3" : null;
        
		$eye = $od ?? $os; $eye = $bf ?? $eye;
		
		if($eye){
			if(isset($p["od"])) unset($p["od"]);
			if(isset($p["os"])) unset($p["os"]);
			$p["ratio"] = $p["a"]." X ".$p["b"]; 
            $p["eye"] = $eye;
            $p["pid"] = $id;
			
			unset($p["a"]);
			unset($p["b"]);
			
			pf($p);
            if($this->db->insert("prescriptions", $p)){ 
				notify("save successful");
				redirect("patient/profile/".$id); }
			
		}else{

			notify("Pleasse select eye", 2);
			$data = [];
			render("prescription", $data);
		}

	}


	public function deletePresc($id){
		process("delete from prescriptions where id = '$id'");
	}
}
