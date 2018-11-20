<?php

$p = current($patient);
$data["p"]= $p;

?>
<div class="mx-md-3">
<?=pflink($p->id)?> 
</div>
<hr>
    <div class="my-md-4">
<a href="<?=base_url('doctor/enqueue/'.$p->id)?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> BOOK PATIENT</a>



<!-- appointments section -->
<!-- ==================================== -->
<?=topic("Appointments")?>
<hr>
<?php 
foreach($list as $date => $item){
  $this->load->view("upcoming", ["data"=>$item, "date"=>$date]);
}

$this->load->view("theatreModal", ["p"=>$p]);
?>

