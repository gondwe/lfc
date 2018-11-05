<?php

class Pharmacy extends MX_Controller {

    function __construct(){
        $this->load->model("patient_model");

    }

    function index(){
        $data = [];
        render("dashboard",$data);
    }
   
}