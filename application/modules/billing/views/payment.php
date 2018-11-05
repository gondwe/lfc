<?php 

$paid = $costing - $paidup;
$bill_to = current($bill_to);


?>
<h5 class='ml-5 mt-3' ><?=pflink($bill_to->id)?></h5>
<hr>
<?php 

    
    $names = $bill_to->patient_names;
    $total = array_sum(array_column(current($charges),"total"));

    

?>

<?php 

if($bill_status <> 1 ){
    $invoicelink = base_url("billing/invoice/".$billno);
    echo '<a href="'.$invoicelink.'" class="pull-right btn btn-sm alert-primary btn-primary">INVOICE</a>';
}
?>


<p><?=$bill_status==1? "<button class='btn btn-lg  btn-success pull-right'><span>PAID</span></button>" : ($bill_status == 3? "<button class='btn btn-sm badge-pill btn-danger '>PAID $paid BALANCE $paidup </button>" : "<button class='btn  badge-pill btn-light alert-danger'>PENDING</button>" ) ?></p>



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



<!-- <div class="row"></div> -->
<hr>



<?php 
echo topic("previous txns");
$this->load->view("billing/tx_trail", ["bill"=>$billno]);

?>