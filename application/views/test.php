<?php
require 'pdfcrowd.php';

try
{
    // create an API client instance
    $client = new Pdfcrowd("imranbajwa", "3e73bf6dfa56e27b91a04c31b39cc425");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://127.0.0.1/quotations/index.php/quotation/view/1');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"google_com.pdf\"");

    // send the generated PDF
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>
