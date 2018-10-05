<?php 


$d = new tablo("tbl_patient");
$d->sqlstring = "select * from tbl_patient where user_id = '$id'";
$d->table();


?>
