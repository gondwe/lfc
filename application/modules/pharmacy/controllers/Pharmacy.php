<?php

class Pharmacy extends MX_Controller {

    function __construct(){
        $this->load->model("patient_model");
        $this->load->model("genmod");
		// $this->load->model(['item', 'transaction', 'analytic']);
		$this->load->model(['finance/item', 'finance/transaction', 'finance/analytic']);

    }

    function index(){
        $data = [];
        $data['topDemanded'] = $this->analytic->topDemanded();
        $data['leastDemanded'] = $this->analytic->leastDemanded();
        $data['totalSalesToday'] = (int)$this->analytic->totalSalesToday();
        render("dashboard",$data);
    }
   
}