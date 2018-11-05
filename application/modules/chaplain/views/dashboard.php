<div class=""><?=topic('chaplain Dashboard')?></div>


<h3  class="pull-left col-sm-8 col-md-7"><span id="names"><?=pflink($patient)?></span>
<small  class="text-secondary col-md-3 h6"><span id="section"><?=$section?></span></small></h3>
<!-- <h5 class='pull-right col-sm-4 col-md-2' >pNo.<span class='h3  p-2 ' id='pno'><?=$pno?></span></h5> -->
<hr>
<!-- <small class="pull-right">NOTE:</small> -->
<form action="<?=base_url('screening/query')?>" method="post" id="search" class="col-md-6 pull-left mb-3">
<input type="text" placeholder="Pno Search." name='sval' id='sval' class="form-control col-md-11 col-sm-11 col-xs-11 pull-left">
<button type="submit" value="" class="btn alert-primary col-xs-1 col-sm-1 col-md-1"><i class="fa fa-check-square"></i></button>
</form>
<hr>

<?php 

pf($q);

$d = new tablo("chaplain");
// $d->read_only("pid");
$d->formgrid(6,12,12);
$d->values("pid",10);
$d->newform();


?>
