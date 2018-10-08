<?php
session_start();
//print_r($_SESSION['vars']);
$html=$_SESSION['vars'];
ini_set('memory_limit','256M');
ini_set('max_execution_time',600);
ob_start();
 
//ob_start(); 
if(isset($_SESSION['vars'])){
 

//==============================================================
//==============================================================
include("mpdf.php");

$mpdf=new mPDF('','A5','11','courier new',0,0,0,0,10,10); 
$mpdf->setTitle('students');
//$mpdf->setHeader($header);
$mpdf->SetFooter($footer);
//$img="images/nyakach.png";
//$mpdf->SetWatermarkImage($img);
$mpdf->showWatermarkImage=false;
$mpdf->WriteHTML($html);
$mpdf->Output(test,'I'); 

exit;
}



?>