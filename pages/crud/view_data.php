<?php

$i = current ( $_SESSION["params"] ) ;



$d = new tablo($i);
switch($i) {
    case "settings" : $d->hide("school_code,logo,sign,email,category"); break;
    case "patient_master" : $d->sqlstring = "Select * from `$i` limit 100"; break;
}


$d->table();

?>
