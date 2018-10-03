<?php

class Doctor extends MX_Controller {

    function __construct(){

    }

    function diary($a){
        $this->load->model("patient_model");
        
        $data["patient"] = $this->patient_model->profile($a);
        serve("bookpatient",$data);
    }

    function savebooking($id){

    }
}