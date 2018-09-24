<?php
$table = end($_SESSION["params"]);

echo "<h5 class='text-info m-3'>New ".titles()."</h5>";

$d = new tablo($table);
$d->newform();
