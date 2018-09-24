<?php
include("../config.php");
$table = array_pop($_POST);
echo insert($table);