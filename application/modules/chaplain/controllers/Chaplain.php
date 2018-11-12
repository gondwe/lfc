<?php 


class Chaplain extends MX_Controller {

    protected $pcat;

    public function __construct()
    {
        $this->load->model("patient_model");
        $this->pcat = $this->db->where('a','patient_type')->get("dataconf")->row("b");
    }

    public function index(){
        $pq = $_SESSION["chaplainq"] ?? array();
        $data["q"] = array_map(function($i){
            return $this->db->where('id',$i)->get('patient_master')->row();
        }, $pq);

        $this->session->chaplain = $patient = empty($pq)? $this->patient_model->activepatient() : current($pq);
        $data["patient"] = $patient;
        $cat = fetch("select b from dataconf where a = 'patient_type' and id = (select category from patient_master where id = '$patient')");
        $data["category"] = $cat;
        $data["section"] = $cat;

        serve("dashboard", $data);
    }

    public function religion(){
        $data = [];
        serve("religion",$data);
    }

	
	function query($id=null){
		$data ["prof"] = $this->patient_model->profile($id);
		$data ["chaplain"]  = $this->patient_model->chaplain($id);
		// $data ["prof"] = $recent;
		// $data ["chaplain"] = $chaplain;

		if(!empty($data["prof"])){
			$_SESSION['screening'] = $id;
		} else {
			notice('PATIENT NO. NOT FOUND',2);
		}

		echo json_encode($data);
	}


}