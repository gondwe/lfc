<?php 
$total = array_sum(array_column(current($charges),"total"));

// pf($paidup);
 
$cdata['charges'] = $charges;
$cdata['total'] = $total;
$cdata['lastpay'] = $rec->amount;
$cdata['paidup'] = $paidup;
// $cdata['paidup'] = $total - $rec->amount;


$this->load->view('charge_section', $cdata);
