<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends MX_Controller {



	public function listing(){
		$this->page_render->_([], "Items, overview", 'items/listing');
	}

	public function outpatient(){
		$data = ["id"=>2];
		$this->page_render->_($data, "Patients, out patients", 'patient/inpatient');
		// redirect("view_data/tbl_patient");
	}

	function inventory(){
		$this->page_render->_([], "Items, overview", 'items/listing');
	}

	public function rooms(){redirect("view_data/tbl_room");}
	public function beds(){redirect("view_data/tbl_bed");}

	
	
		
	
}
