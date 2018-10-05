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



    public function receipts(){

        $txids = gl("select distinct txn from tbl_charges");

        $dd = array_map(@[$this, "txn_trail"], $txids);

        return $dd;

    }



    

    function txn_trail($billno){

        return $this->load->view("billing/tx_trail", ["bill"=>$billno],"TRUE");

    }

        

    function pay($bill){

        $cost =  $this->paidup($bill);



        $amt = $this->input->post("amount");

        $amount = $amt > $cost ? $cost : $amt;

        $change = $amount - $cost;

        $star = $amount == $cost ? 1 : 3;

        

        // die("wait");



        if($amt > 0){

            if($amt > $cost) $this->session->set_flashdata("Payment Successfully<br>Change : ".number_format($change,2));

            if($amt = $cost) $this->session->set_flashdata("Payment Successfully");



            $insert = "insert into tbx_transact (txnid, pmethod, amount, user_id) 

                        values('".$this->input->post("txn")."','".$this->input->post("pmethod")."','".$amount."','".$this->session->user_id."')";

            $update = "update tbl_charges set a_status = '$star' where txn = $bill";

            $this->db->query($insert);

            $this->db->query($update);

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

        return gett("select * from tbx_transact where txnid = '$bill'");

    }



    public function patientbill($pid){

        $pending =  array_sum(array_map(@[$this, "costbychargeid"],gl("select id from tbl_charges where a_status <> 1 and charge_id = '$pid'")));

        $payments = gt("select sum(amount) from tbx_transact where txnid in (select distinct(txn) from tbl_charges where charge_id = '$pid')");
        $sql = "select distinct(txn) from tbl_charges where charge_id = '$pid'";
        $balance = array_sum(array_map(@[$this, "paidup"],gl($sql)));

        
        return [

            "pending" => $pending,

            "paid" => $payments,

            "balance" => $balance,

        ];

    }



    function exists($bill){

        return gt("select count(id) from tbl_charges where txn = '$bill'") > 0 ? true : false;

    }



    function bill_owner($bill){

        return gt("select charge_id from tbl_charges where txn = '$bill'");

    }



    function bill_status($bill){

        return gt("select a_status from tbl_charges  where txn = '$bill' limit 1 ");

    }





    function paidup($bill){

        $paid = gt("select ifnull(sum(amount),0) from tbx_transact where txnid = '$bill'");

        $cost = $this->costbytxn($bill);

        return $cost - $paid;

    }



    function balances(){

        $paid = gt("select ifnull(sum(amount),0) from tbx_transact");

        $cost = $this->allcost();

        return $cost - $paid;

    }





    function costbytxn($bill){

        return array_sum(array_map(@[$this, "costbychargeid"],gl("select id from tbl_charges where txn = '$bill' ")));

    }



    function costbychargeid($charg_id){

        return gt("select ti.unit_cost * tc.quantity from tbl_charges as tc left join tbl_item as ti on tc.item_id = ti.id where tc.id = '$charg_id'");

    }



    function allcost(){

        return gt("select sum(ti.unit_cost * tc.quantity) from tbl_charges as tc left join tbl_item as ti on tc.item_id = ti.id");

    }



	public function charges($id=null){



        $where = is_null($id)? "where tc.id > 0 " : "where tc.txn = '$id'"; 

        

		$j =  gett("select ti.id, tc.txn, ti.item, tc.a_status,  concat(' \( ', tc.quantity, ' x ', ti.unit_cost, ' \)' ) as rate, ti.unit_cost*tc.quantity as total, concat(u.first_name,' ',u.last_name) as user, 

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

                if($y["txn"] == $t) $txn[$t][] = $y;

            }

        }



        return $txn;

	}



	public function chargesbyid($id=null){



        $where = is_null($id)? "where tc.id > 0 " : "where tc.charge_id = '$id'"; 

        

		$j =  gl("select ti.id, tc.txn, ti.item, tc.a_status, concat(' \( ', tc.quantity, ' x ', ti.unit_cost, ' \)' ) as rate, ti.unit_cost*tc.quantity as total, concat(u.first_name,' ',u.last_name) as user, 

		if(tc.a_status =1, '<button class=\'btn btn-success btn-xs\'>PAID</button>', if(tc.a_status = 3 , '<button class=\'btn-xs btn-rounded btn btn-warning\'>BALANCE DUE</button>', '<button class=\'btn-xs btn-rounded btn btn-warning\'>UNPAID</button>') ) as status , tc.date 

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

                if($y["txn"] == $t) $txn[$t][] = $y;

            }

        }



        return $txn;

	}

}