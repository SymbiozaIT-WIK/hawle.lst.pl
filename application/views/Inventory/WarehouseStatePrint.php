<?php 
$pdf = new MyTcPdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFont('dejavusans', '', 10);
$pdf->SetTitle('Stan w magazynie');
$pdf->SetHeaderMargin(10);
$pdf->SetTopMargin(10);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true,20);
$pdf->SetAuthor('https://zamowienia.hawle.pl/');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
$pdf->writeHTML($html);
$pdf->Output('Stan.pdf', 'I');
?>
