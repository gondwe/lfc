<?php 

class Optical extends MX_Controller {

    function __construct(){
        $this->load->model("patient_model");
    }


    public function index(){
        serve("dashboard");
    }
    
    public function new_order(){
        $active_optical = $this->session->optical ?? null;
        $data["patient"] = $this->patient_model->find($active_optical);
        serve("new_order", $data);
    }

}