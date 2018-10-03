<?php 

// pf($table);

echo '<div class="rowd">';
titles(rxx("Add ".propername()),null,1);
// titles("Edit Patient",$prof->patient_names,0);
// echo '<div class="pull-right">';
// echo '</div>';
// echo '<a href="'.base_url('patient/new').'" class="btn btn-primary mt-3 pull-right" >VIEW TABLE</a>';
// echo '<a href="'.base_url('patient/new').'" class="btn btn-primary pull-left" >NEWs PATIENT</a>';
echo '</div>';


$d = new tablo($table);
$d->hide("dob");
$d->newform();


?>

<style>

</style>