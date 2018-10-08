<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
<?php 
require 'vendor/autoload.php';
use Knp\Snappy\Pdf;

$snappy = new Pdf('C://"Program Files (x86)"/wkhtmltopdf/bin/wkhtmltopdf.exe' );




echo $html = $_SESSION["pdf"];
// pf($snappy);

header('Content-Type: application/pdf');
echo  $snappy->getOutputFromHtml($html);
// header('Content-Disposition: attachment; filename="file.pdf"');
// echo $snappy->getOutput('http://www.google.com');
// unset($_SESSION['pdf']);