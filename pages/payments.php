<?php

$sql = "select  pos, receiptno, if(length(arname) > 20, concat(substring(arname,1,20),'..'),substring(arname,1,20))  as item, amount, paid, changee, tax, staff, arcode as mode, posdate as date_ from pos_header order by posdate limit 300 ";
$q = get($sql);
$total = array_sum(array_column($q,"paid"));
$tax = array_sum(array_column($q,"tax"));
?>

<div class="m-4 text-right pull-right">
    
    <h1>PAID $<?=number_format($total,2)?></h1>
    <h3 class='text-info'>TAX $<?=number_format($tax,2)?></h3>
    
</div>
<h3 class='pull-left m-5'>TXNS<br>
    <a href="#payments" class="btn btn-sm btn-primary">PAYMENT RECEIPTS</a>
    <a href="#payments" class="btn btn-sm btn-info">INVOICES</a>
</h3>
<?php

datatable($q, null, 0);

