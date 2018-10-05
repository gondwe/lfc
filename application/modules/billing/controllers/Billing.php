<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends MX_Controller {

	 
	 
	function __construct(){
		parent :: __construct();
		
		$this->load->model("bills");
		$this->load->model("patient/patientmodel");
        
	}

    function cashier(){
        $data["charges"] = $this->bills->charges();
        $this->page_render->_($data,"Billing, Cashier", "billing/dashboard");
    }

    function paybill($bill, $view="billing/payment"){
        $data["billno"] = $bill;

        if(!$this->bills->exists($bill)) redirect("");

        $data["p_options"] = $this->bills->p_options;
        $data["charges"] = $this->bills->charges($bill);
        $data["costing"] = $this->bills->costbytxn($bill);
        $data["paidup"] = $this->bills->paidup($bill);
        $data["bill_to"] = $this->patientmodel->patient_details($this->bills->bill_owner($bill))["patient"];
        $bstat = $this->bills->bill_status($bill);
        if($bstat == 2) $view = "billing/paymentss";
        $slug = ($bstat == 2)?  "Invoices" : "Payments";
        $data["bill_status"] = $bstat;
        $this->page_render->_($data,"Billing, $slug", $view);
    }

    function payment($bill=null){
        if(is_null($bill)) redirect("");
        $this->bills->pay($bill);
        // $this->paybill($bill);
        redirect("billing/paybill/".$bill);
    }

    public function receipts($id = null){
        $data["recent"] = $this->bills->receipts();
        $this->page_render->_($data, "Billing, Receipts", "billing/receipts");
    }

    function invoice($bill=null){
        if(is_null($bill)){ $this->invoicelisting();  }else{
            $this->bills->create_invoice($bill);
            $this->paybill($bill,"billing/paymentss");
        }
    }

    function preparedocument(){
        return $this->load->view("doc_print");
    }

    function printdocument(){
        // $this->load->library("mpdf");
        return $this->load->view("documentprint");
    }


    function invoicelisting(){
        $data["balance"] = $this->bills->balances();
        $this->page_render->_($data,"Billing, Invoices", "invoicelisting");
    }
}