<?php 

// pf($rec);
    // $amount = $rec->amount;
    $paid = $costing - $paidup;
    $bill_to = current($bill_to);

    // $lastpay = fetch("select amount from tbx_transact where id = (select max(id) from tbx_transact where txnid = '$billno') ");

    // pf($paidup);

    $names = $bill_to->patient_names;

    $total = array_sum(array_column(current($charges),"total"));

    // $this->load->view("patient/stripe",["patient_details"=>$bill_to]);

    $invoicelink = $bill_status == 1? null : "href=".base_url("billing/invoice/".$billno);

?>

<!-- <h4><?=rx($names)?></h4> -->



<a class="pull-right btn btn-sm alert-primary btn-primary <?=$bill_status ==1? 'btn-disabled' : null ?>" <?=$invoicelink?> >INVOICE</a>

<p><?=$bill_status==1? "<button class='btn btn-lg  btn-light alert-success'><span>PAID</span></button>" : 
($bill_status == 3? "<button class='btn btn-sm badge-pill btn-danger '>PAID $paid BALANCE $paidup </button>

" : "<button class='btn  badge-pill btn-light alert-danger'>PENDING</button>" ) ?></p>



<?php 

$cdata['charges'] = $charges;
$cdata['total'] = $total;
$cdata['lastpay'] = $lastpay;
$cdata['paidup'] = $paidup;
$cdata['p_options'] = $p_options;
$cdata['bill_status'] = $bill_status;
$cdata['bill_status'] = $bill_status;
$data["billno"] = $billno;

// pf($amount);

$this->load->view('charge_section', $cdata);
 ?>



<div class="rowd"></div>
<hr>



<?php 
echo topic("previous txns");
$this->load->view("billing/tx_trail", ["bill"=>$billno]);

?>