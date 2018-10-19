<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$html = $this->load->view('zs/create', '', true);



// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->load_html_file(__DIR__.'\fak.html');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("hawle_faktura");
?>