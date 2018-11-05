<a href="<?=base_url("optical/new_order")?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> NEW ORDER</a>
<?=topic('Current Orders')?>

<div class="pt-4">
<?php 

$d = new tablo("optical_orders");
// $d->combos("pid", "select p.id, p.patient_names  from patient_master as p'");
$d->sqlstring = "select p.id, p.patient_names, o.* from patient_master as p 
                    right join optical_orders o on o.pid = p.id";
$d->aliases["frame_upcharge"] = "frame & upcharge";
$d->aliases["pid"] = "pno";
$d->table(0);