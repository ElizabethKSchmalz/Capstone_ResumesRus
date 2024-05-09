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
for ($i = 0; $i < count($letterContent); $i++) {
  if (strlen($letterContent[$i]) > 2000) {
    $letterContent[$i] = substr($letterContent[$i], 0, 2000);
  }
}
// Create HTML and inline CSS for cover letter
$html = "
<header id=\"topInfo\">
    <br>
    <h1>{$name}</h1>
    <p>{$address}</p>
    <p>Email: {$email}</p>
    <p>Phone: {$pNumber}</p>
    <br>
</header>
<hr>
<section id=\"education\">
  <h2 style=\"text-align: center;\">Education</h2>
  <h3 id=\"schoolName\">{$schoolName}</h3>
  <p><strong>Degree:</strong> {$degree}</p>
  <p><strong>Field of Study:</strong> {$fieldOfStudy}</p>
  <p><strong>Duration:</strong> {$eduStartDate} - {$eduEndDate}</p>
</section>
<section id=\"experience\">
    <h2 style=\"text-align: center;\">Work Experience</h2>
    ";
  for ($i = 0; $i < count($cNames); $i++) {
   $html .="
    <p><strong>Job Title:</strong> {$jobTitles[$i]}</p>
    <p><strong>Company:</strong> {$cNames[$i]}</p>
    <p><strong>Location:</strong> {$cAddresses[$i]}</p>
    <p><strong>Duration:</strong> {$startDates[$i]} - {$endDates[$i]}</p>
    <br>
    <p><strong>Description of responsibilities or achievements</strong></p>
    <br>
    <ul class=\"workDesc\">
        <li>$letterContent[$i]</li>
    </ul>
    <hr>
    <br>
";
  }
  $html .= "</section>";

// Put the HTML into the pdf
$pdf->writeHTML($html, true, false, true, false, '');

// Delete the second page, if it was created
$pdf->deletePage(2);

// Output the file and download it
$pdf->Output('resume.pdf', 'D');
?>