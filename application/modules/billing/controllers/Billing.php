<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



class Billing extends MX_Controller {



	function __construct(){
		parent :: __construct();
		$this->load->model("bills_model");
		$this->load->model("patient_model");
	}



    function cashier(){

        $data["charges"] = $this->bills_model->charges();

        $this->page_render->_($data,"Billing, Cashier", "billing/dashboard");

    }



    function paybill($bill, $view="billing/payment"){

        $data["billno"] = $bill;



        if(!$this->bills_model->exists($bill)) redirect("");



        $data["p_options"] = $this->bills_model->p_options;
        $data['rec'] = $this->bills_model->receipt($bill);
        $data["charges"] = $this->bills_model->charges($bill);
        $data["lastpay"] = $this->bills_model->lastpay($bill);
        $data["costing"] = $this->bills_model->costbytxn($bill);
        $data["paidup"] = $this->bills_model->paidup($bill);
        $data["bill_to"] = $this->patient_model->patient_details($this->bills_model->bill_owner($bill));
        $bstat = $this->bills_model->bill_status($bill);
        if($bstat == 2) $view = "billing/paymentss";
        $slug = ($bstat == 2)?  "Invoices" : "Payments";
        $data["bill_status"] = $bstat;

        serve($view, $data);

    }



    function payment($bill=null){
        if(is_null($bill)) redirect("");
        $this->bills_model->pay($bill);
        redirect("billing/paybill/".$bill);
    }



    public function receipts($id = null){

        $data["recent"] = $this->bills_model->receipts();

        serve("receipts",$data);
        // $this->page_render->_($data, "Billing, Receipts", "billing/receipts");

    }


    function recent($id){
        $data["prof"]=$this->patient_model->profile($id);
        // $data["charges"]=$charges;
        $data["charges"] = $this->bills_model->chargesbyid($id);
        // $(".recent").load("<?=base_url('billing/recent/'.$patient->id)");
        // $this->load->view("recent",$data);
        serve("recent",$data);
    }


    function invoice($bill=null){

        if(is_null($bill)){ $this->invoicelisting();  }else{

            $this->bills_model->create_invoice($bill);

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

        $data["balance"] = $this->bills_model->balances();

        $this->page_render->_($data,"Billing, Invoices", "invoicelisting");

    }


    function receipt($txn, $id=null){
        $data["billno"] = $txn;
        $data["charges"] = $this->bills_model->charges($txn);
        $data['rec'] = $this->bills_model->receipt($txn,$id);
        $data["paidup"] = $this->bills_model->paidup($txn,$id);
        $data["lastpay"] = $this->bills_model->lastpay($txn);
        $data["p_options"] = $this->bills_model->p_options;
        $data["bill_status"] = $this->bills_model->bill_status($txn);
        render("receipt",$data);
    }

    public function activecharge($txn=null){
        $data = [];
        render("activecharge",$data);
    }

}