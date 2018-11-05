<div class="p-5">
<?php 

$id = $this->uri->segment(3);

$d = new tablo("patient_master");

$d->edit($id);

?>

</div>