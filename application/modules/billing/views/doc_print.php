<?php 

// require ("include/config.php"); 
// session_start();
$html = $_POST["div"];

/* filter unwanted chars */
// $html = str_replace('src="assets/','src="../../assets/',$html);
// $html = str_replace('src="assets/','src="../../assets/',$html);

$_SESSION["html"] = $html;

echo $html;

?>

