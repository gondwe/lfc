<div class="text-center" style="margin-top:10%">
<div class="alert alert-primary h4">Delete Successful</div>
<?php
// include("config.php");

$id = array_pop($_SESSION["params"]);
$table = array_pop($_SESSION["params"]);
$sql = "delete from `$table` where id = '$id'";
$a = $_SERVER["HTTP_REFERER"];
$b = str_replace("page=","/#",$_GET["url"]);

// exit("w");
?>

<a href="<?=site_url($b)?>" class="btn btn-success col-md-4 col-lg-3 col-sm-6 col-xs-12">OK</a>
</div>
<?php 
spill($a);
if(process($sql)):
code("logging CRUD activity..");
datalog("del");
code("Log successful");
code("Press OK to Continue");
endif;
