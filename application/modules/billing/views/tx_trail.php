<?php 

$data = $this->bills->txtrail($bill);
$pmeths = gett("select id, pmethod from payment_methods");
$user = gett("select id, concat(first_name,' ',last_name)as names from users");

echo "<div class='panel-wrapper'>";
echo "<div class='panel-group accordion-struct'>";

foreach($data as $d=>$x){
    // spill($x);
    echo "
    <div class='panel panel-info pb-10 pl-10 pt-10 col-sm-12 txt-dark' style='border-bottom:1px solid #ddd; background:#fff'>
    <span class='col-sm-2'>".datef($x["date"])."</span>
    <span class='col-sm-2'> KES ".number_format($x["amount"],2)."</span>
    <span class='col-sm-2'> ".rx($pmeths[$x["pmethod"]],2)."</span>
    <span class='col-sm-2'>Served By ".rx($user[$x["user_id"]])."</span>
    <span class='col-sm-3 col-xs-12'><a class='btn btn-xs btn-primary btn-rounded' href='".base_url("billing/paybill/".$x['txnid'])."' >VIEW</a>
    <a class='btn btn-xs btn-success btn-rounded' href='".base_url("billing/paybill/".$x['txnid'])."' >PRINT</a></span>
    </div>";
}

