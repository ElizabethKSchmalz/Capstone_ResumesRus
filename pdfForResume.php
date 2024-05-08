<?php
// Bring in base library file for TCPDF
require('TCPDF-main/tcpdf.php');

// Create new TCPDF
$pdf = new TCPDF();

// Set author to user's name, and file name to "Cover Letter"
$pdf->SetAuthor($name);
$pdf->SetTitle('Resume');

// Add a new blank page
$pdf->AddPage();

// Set margins
$pdf->SetMargins(10, 10, 10);

// Set width for the content
$contentWidth = $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'];
$contentHeight = $pdf->getPageHeight() - $pdf->getMargins()['top'] - $pdf->getMargins()['bottom'];

// Trim letterContent to 2000 characters
if (strlen($letterContent) > 5000) {
  $letterContent = substr($letterContent, 0, 5000);
} 

// Create HTML and inline CSS for cover letter
$html = "
<div style=\"font-family: Arial, sans-serif; font-size: 12px; padding: 0; margin: 0;\">
  <div style=\"border-bottom: 1px solid black; width: 100%; font-size: large; font-weight: bold;\">
    <p>$name</p>
    <p>$address</p>
    <p>$email</p>
    <p>$pNumber</p>
  </div>
  <div style=\"border-bottom: 1px solid black; width: 100%; font-size: large; font-weight: bold;\">
    <p>$managerName</p>
    <p>$cName</p>
    <p>$cAddress</p>
  </div>
  <p style=\"font-size: large; font-weight: bold;\">$date</p>
  <p>Dear $managerName,</p>
  <p style=\"max-width: 15.6cm; overflow-wrap: break-word; font-size: 10px;\">$letterContent</p>
  <p>Sincerely,<br>$name</p>
</div>
";

// Put the HTML into the pdf
$pdf->writeHTML($html, true, false, true, false, '');

// Delete the second page, if it was created
$pdf->deletePage(2);

// Output the file and download it
$pdf->Output('cover_letter.pdf', 'D');
?>