
<?php titles("Counseling Info", null, "BACK"); ?>
<div class="clearfix"></div>
<?php 

$recent = current($recent);
$comments = fetch("select remarks from chaplain where id = '$recent->id'");
$sex = gl("select id, b from dataconf where a = 'gender'");

?>


<div class="row col-md-12 py-4 alert-primary">
<div class="">
    <img src="<?=base_url('assets/images/bird.png')?>" width="150px" class=" p-3">
</div>
<div class="">
<h4 class='lead'><?=pflink($recent->id)?></h4>
<h6 class='text-success ml-md-3'>Faith/ Religion : <span class="text-success font-weight-light"><?=rxx($recent->faith)?></span></h6>
<h6 class='text-success ml-md-3'>ID # : <span class="text-success font-weight-light"><?=$recent->nationalid?></span></h6>
<h6 class='text-success ml-md-3'>Gender : <span class="text-success font-weight-light"><?=$sex[$recent->sex]?></span></h6>
<h6 class='text-success ml-md-3'>Regd Date : <span class="text-success font-weight-light"><?=datef($recent->date)?></span></h6>
<h6 class='text-success ml-md-3'>Age : <span class="text-success font-weight-light"><?=age($recent->dob)?></span></h6>
<h6 class='text-success ml-md-3'>Section : <span class="text-success font-weight-light"><?=$recent->ptype?></span></h6>
<h6 class='text-success ml-md-3'>Chaplain : <span class="text-success font-weight-light"><?=$recent->chaplain?></span></h6>
<h6 class='text-success ml-md-3'>Physical Address : <span class="text-success font-weight-light"><?=$recent->postaladdress?></span></h6>
<h6 class='text-success ml-md-3'>Contact : <span class="text-success font-weight-light"><?=$recent->tel1?></span></h6>
<h6 class='text-success ml-md-3'>Email : <span class="text-success font-weight-light"><?=$recent->email?></span></h6>
</div>
</div>


<?php

// pf($recent);


?>

    <style>
        .card-img-top { background-image:url("<?=base_url('assets/images/bird.png')?>"); }
        h6 { color:#dcdcdc}
</style>