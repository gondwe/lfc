<?php 


$this->load->model("billing/bills_model");
$data = $this->bills_model->txtrail($bill);

$pmeths = gl("select id, b as pmethod from dataconf where a = 'payment_method'");
$user = gl("select id, concat(first_name,' ',last_name)as names from users");



echo "<div class='panel-wrapper'>";
echo "<div class='panel-group accordion-struct'>";


// spill($this->session);

foreach($data as $d=>$x){


    echo "
    <div class=''>
        <div class='alert alert-dark pb-10 pl-10 pt-10 col-sm-12 text-secondary rowd mt-3' 
        style='border-bottom:1px solid #eee;'>
        <span class='col-sm-2'>".datef($x->date)."</span>
        <span class='col-sm-2'> KES ".number_format($x->amount,2)."</span>
        <span class='col-sm-2'> ".rx($pmeths[$x->pmethod],2)."</span>
        <span class='col-sm-2'>Served By ".rx($user[$x->user_id])."</span>
        
        <a class='btn btn-sm btn-info pull-right' href='".base_url("billing/receipt/".$x->txnid."/".$x->id)."' >RE PRINT</a></span>
    </div>";

}



