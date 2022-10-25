<?php
require_once 'config.php';//this is using send grid veriso 7
require 'vendor/autoload.php'; // If you're using Composer (recommended)


$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("EMAIL_HERE", "greensoft");//sending from
$email->setSubject("WELCOME TO MALAWI");
$email->addTo("EMAIL_HERE", "hey bro");//sending to
$email->addContent("text/plain", "Malawi is a lovely country"); //your message
$email->addContent(
    "text/html", "<strong>Malawi is a lovely country</strong>"
);
$sendgrid = new \SendGrid( SENDGRID_API_KEY );
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}