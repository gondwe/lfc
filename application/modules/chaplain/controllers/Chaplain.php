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
        $data["category"] = $this->pcat;
        $data["section"] = $this->db
                        ->where("d.a", "patient_type")
                        ->select("d.b")->from("dataconf d")
                        ->join("patient_master m", "d.id = m.category")
                        ->get()
                        ->row("b");
        serve("dashboard", $data);
    }
}