<!-- <div class="mt-5"></div> -->
<?php
// include("config.php");

$id = array_pop($_SESSION["params"]);
$table = array_pop($_SESSION["params"]);
echo "<h5 class='m-3 text-info'>Edit ".titles()."</h5>";

$d = new tablo($table);
$d->edit($id);