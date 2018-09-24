<?php 

include("../../config.php");


$table =$_GET["t"];

// spill($_POST);
// exit("wait");

if(!empty($_POST)){
    $id = array_pop($_POST); 
    foreach($_POST as $k=>$v){ $fields[] = "`$k`='$v'"; }
    $fields = implode(", ",$fields);
    $sql = "update $table set $fields where id = '$id'";
    
    /* save pictures */
    savefiles($table, $id);
    process($sql);
    
}