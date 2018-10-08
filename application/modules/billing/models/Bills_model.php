<?php 



if(!defined("BASEPATH")) exit("No direct script allowed") ;



class Bills_model extends CI_Model {





    public $p_options;



    function __construct(){

        parent::__construct();

        $this->p_options = gl("select id, ucase(b) as pmethod from dataconf where a ='payment_method'");

    }





    function recent($lim= 5){

        $all = $this->charges();

        return array_chunk($all, $lim );

    }



    public function receipts($bill=null){
        $txids = gl("select distinct txn from tbl_charges");
        $dd = array_map([$this, "txn_trail"], $txids);
        return $dd;
    }



    

    function txn_trail($billno){
        return $this->load->view("billing/tx_trail", ["bill"=>$billno],"TRUE");
    }

        

    function pay($bill){
        $cost =  $this->paidup($bill);
        $amt = $this->input->post("amount");
        $amount = $amt > $cost ? $cost : $amt;
        $change = $amt - $cost;
        $star = $amount == $cost ? 1 : 3;
        
        
        $pmethod = $this->input->post("pmethod");
        // $txno = $this->input->post("txn");
        
        
        // pf($amount);
        // pf($cost);
        // pf($bill);
                
                // exit("wait");


        if($amount > 0){

            if($amount < $cost) success("Payment Successful");
            if($amount > $cost) success(`Payment Successful \n `."Change : KES ".number_format($change,2));
            if($amount == $cost) success("Payment Successful");

            $insert = "insert into tbx_transact (txnid, pmethod, amount, user_id) 
                        values('".$bill."','".$pmethod."','".$amount."','".$this->session->user_id."')";

            $update = "update tbl_charges set a_status = '$star' where txn = $bill";

            $this->db->query($insert);
            $this->db->query($update);

        }else{
            warning("Amount Cannot be Empty");
        }

    }

    

    function create_invoice($bill){

        $insert = "insert into tbx_transact (txnid, user_id) values('".$this->input->post("txn")."','".$this->session->user_id."')";

        $update = "update tbl_charges set a_status = 2 where txn = $bill";

        $this->db->query($insert);

        $this->db->query($update);

        $this->session->set_flashdata("Invoice Created Successfully");

    }



    public function txtrail($bill){

        return get("select * from tbx_transact where txnid = '$bill' order by date desc");

    }



    public function patientbill($pid){

        $pending =  array_sum(array_map(@[$this, "costbychargeid"],gl("select id from tbl_charges where a_status <> 1 and charge_id = '$pid'")));

        $payments = get("select sum(amount) from tbx_transact where txnid in (select distinct(txn) from tbl_charges where charge_id = '$pid')");
        $sql = "select distinct(txn) from tbl_charges where charge_id = '$pid'";
        $balance = array_sum(array_map(@[$this, "paidup"],gl($sql)));

        
        return [

            "pending" => $pending,

            "paid" => $payments,

            "balance" => $balance,

        ];

    }



    function exists($bill){

        return get("select count(id) from tbl_charges where txn = '$bill'") > 0 ? true : false;

    }



    function bill_owner($bill){

        return get("select charge_id from tbl_charges where txn = '$bill'");

    }



    function bill_status($bill){

        return fetch("select a_status from tbl_charges  where txn = '$bill' limit 1 ");

    }





    function paidup($bill,$dateid=null){

        $date = is_null($dateid)? date("Y-m-d G:i:s") : fetch("select date from tbx_transact where id = $dateid");
        // spill($date);
        // $cumul = fetch("select ifnull(sum(amount),0) as paid from tbx_transact where txnid = '$bill' and date <= '$date' ");
        $sql = "select ifnull(sum(amount),0) as paid from tbx_transact where txnid = '$bill' and date <= '$date' ";
        $paid = fetch($sql);
        $cost = $this->costbytxn($bill);
        // pf($cost);
        // pf($paid);
        // pf($cumul);
        $rem = $cost - $paid;
        // pf($rem);
        return $rem;
    }





    function balances(){
        $paid = fetch("select ifnull(sum(amount),0) from tbx_transact");
        $cost = $this->allcost();
        return $cost - $paid;
    }





    function costbytxn($bill){
        $txnlist = get("select id from tbl_charges where txn = '$bill' ");
        return array_sum(array_map([$this, "costbychargeid"],$txnlist));
        // pf($txnlist);
        // pf($i);
        // die();

    }



    function costbychargeid($charg_id){
        // pf($charg_id);
        return  fetch("select ti.unit_cost * tc.quantity as cost from tbl_charges as tc left join tbl_item as ti on tc.item_id = ti.id where tc.id = '$charg_id->id'");
        // pf($i);
        // return $i;
        // die();
    }



    function allcost(){

        return get("select sum(ti.unit_cost * tc.quantity) from tbl_charges as tc left join tbl_item as ti on tc.item_id = ti.id");

    }



	public function charges($id=null){



        $where = is_null($id)? "where tc.id > 0 " : "where tc.txn = '$id'"; 

        

		$j =  get("select ti.id, tc.txn, ti.item, tc.a_status,  concat(' \( ', tc.quantity, ' x ', ti.unit_cost, ' \)' ) as rate, ti.unit_cost*tc.quantity as total, concat(u.first_name,' ',u.last_name) as user, 

		if(tc.a_status =1, '<button class=\'btn btn-success btn-xs\'>PAID</button>', if(tc.a_status = 3, '<button class=\'btn-xs btn-rounded btn btn-warning\'>BALANCE DUE</button>','<button class=\'btn-xs btn-rounded btn btn-warning\'>UNPAID</button>' ) ) as status , tc.date 

		from tbl_charges as tc 

		left join tbl_item as ti on tc.item_id = ti.id

        left join users as u on tc.user_id = u.id
        

		$where

		group by tc.id

		order by tc.date desc

        ");

        

        $txns = array_unique(array_column($j,"txn"));



        $txn = [];

        foreach($j as $y){

            foreach($txns as $t){

                if($y->txn == $t) $txn[$t][] = $y;

            }

        }



        return $txn;

	}



	public function chargesbyid($id=null){



        $where = is_null($id)? "where tc.id > 0 " : "where tc.charge_id = '$id'"; 

        

		$j =  get("select ti.id, tc.txn, ti.item, tc.a_status, tbx.id as tbxid, concat(' \( ', tc.quantity, ' x ', ti.unit_cost, ' \)' ) as rate, ti.unit_cost*tc.quantity as total, concat(u.first_name,' ',u.last_name) as user, 

		if(tc.a_status =1, '<button class=\'btn btn-success btn-xs\'>PAID</button>', if(tc.a_status = 3 , '<button class=\'btn-xs btn-rounded btn btn-warning\'>BALANCE DUE</button>', '<button class=\'btn-xs btn-rounded btn btn-warning\'>UNPAID</button>') ) as status , tc.date 

		from tbl_charges as tc 

		left join tbl_item as ti on tc.item_id = ti.id

        left join users as u on tc.user_id = u.id

        left join tbx_transact as tbx on tbx.txnid = tc.txn
        

		$where

		group by tc.id

		order by tc.date desc

        ");

        
// pf(get_object_vars($j));
        $txns = array_unique(array_column($j,"txn"));

// pf($txns);

        $txn = [];

        foreach($j as $y){

            foreach($txns as $t){

                if($y->txn == $t) $txn[$t][] = $y;

            }

        }



        return $txn;

    }
    
    function lastpay($billno){
        return fetch("select amount from tbx_transact where id = (select max(id) from tbx_transact where txnid = '$billno') ");
    }
    


    function receipt($bill,$id=null){
        return gl("select * from tbx_transact where id = '$id'");
    }

    function pay_trail($id){
        return $this->charges($id);
    }
}