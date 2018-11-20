<div class="card border-top-0 py-4">
<?php 

$id = $this->uri->segment(3);

$d = new tablo("patient_master");

$d->edit($id);

?>

</div>