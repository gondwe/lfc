<?php

/* custom mpdf api */

error_reporting(0);
// no error reporting to preserve header content type


// require_once('include/config.php');
// session_start();

ini_set('memory_limit','256M');
ini_set('max_execution_time',600);


$html =""; 

/* localized */
$html ='<style>
    #logo,table td,table th{text-align:center}h1,table th{font-weight:400}footer,h1,table .desc,table .service{text-align:left}.clearfix:after{content:"";display:table;clear:both}a{color:#5D6975;text-decoration:underline}body{position:relative;width:21cm;height:29.7cm;margin:0 auto;color:#001028;background:#FFF;font-size:12px;font-family:Arial}header{padding:10px 0;margin-bottom:30px}#logo{margin-bottom:10px}#logo img{width:90px}h1{color:#26498a;font-size:2.4em;line-height:1.4em;margin:0 0 20px}#project{float:left}#project span{color:#5D6975;text-align:right;width:52px;margin-right:10px;display:inline-block;font-size:.8em}#company{float:right;text-align:right}#company div,#project div{white-space:nowrap;line-height:12pt}table{width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:20px}table tr:nth-child(2n-1) td{background:#F5F5F5}table th{padding:8px 20px;color:#fff;border-bottom:1px solid #C1CED9;white-space:nowrap;background:#689747}table td{padding:10px 20px;text-align:right}table td.desc,table td.service{vertical-align:top}table td.qty,table td.total,table td.unit{font-size:1.1em}table td.total{font-size:1.2em;font-weight:700}table td.grand{border-top:1px solid #5D6975;font-weight:700;color:#1e4286}#notices .notice{color:#5D6975;font-size:1.1em;padding:10px 0;font-style:italic}footer{color:#5D6975;width:100%;height:30px;position:absolute;bottom:0;border-top:1px solid #C1CED9;padding:8px 0}.subtitle{color:#153b81;font-weight:bolder;margin:5px 0}
    </style>'; 


$html .=$_SESSION["html"];
// echo $html;
// die();
$this->load->library("mpdf/mpdf");
$title = '_'.date("M").date("y").".pdf";
// include("mpdf/mpdf.php");
$orient = "P";
$mpdf=new mpdf('','A4','12','century gothic',10,10,10,0,10,10,$orient); 
$mpdf->setTitle('Document');

//$mpdf->setHeader($header);
// $mpdf->SetFooter($footer);
// $mpdf->showWatermarkImage=true;


$mpdf->WriteHTML($html);
$mpdf->Output($title,'I'); 

exit;
// }

