
<?php 
include_once "config.php";
// $p = $_GET['page'];

$params = explode("/",$_GET['page']);
$p = array_shift($params);

$_SESSION["params"] = $params;
$page = "pages/".$p.".php";

$par = current($params);

if(count($params)> 0 && !is_numeric($par)){
    $page = "pages/".$p."/".$par.".php";
}

switch($p){
    case "add_new" : $page = "pages/crud/add_new.php"; break;
    case "view_data" : $page = "pages/crud/view_data.php"; break;
    case "edit" : $page = "pages/crud/edit.php"; break;
    case "delete" : $page = "pages/crud/delete.php"; break;
}

// spill($p);
// spill($page);

$refresh = ["logout",];

if(file_exists($page)){
    include_once ($page);
    if(in_array($p,$refresh)) echo "<script>window.location.hash = ''; window.location.reload()</script>";
}else{
    include "404.php";
}