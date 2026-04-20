<?php

require "pdfcrowd.php";



try

{

    // create the API client instance

    $client = new \Pdfcrowd\HtmlToImageClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");



    // configure the conversion

    $client->setOutputFormat("png");



    // run the conversion and write the result to a file

    $client->convertUrlToFile("https://hmmatrimony.com/matrimonyadmin/take_snap.php?user_id=26625", "example.png");

}

catch(\Pdfcrowd\Error $why)

{

    // report the error

    error_log("Pdfcrowd Error: {$why}\n");



    // rethrow or handle the exception

    throw $why;

}



?>