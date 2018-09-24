<?php


	ob_start();
	session_start();


	define("host"		, 	"localhost");
	define("usr"		, 	"root");
	define("pwd"		,	"");
	define("database"	, 	"lighthouse");
	

	define("site_url", "http://localhost:8081/house");
	define("base_url", "/house");


	if(isset($_SESSION['erc'])){ echo $_SESSION['erc']!==FALSE ? "" : "" ; unset($_SESSION["erc"]);} 



	require_once ("functions.php");
	require_once ("app.php");
	require_once ("tablo.php");

?>

	<script src="js/scripts.js"></script>
