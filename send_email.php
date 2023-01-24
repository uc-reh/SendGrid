<?php
require_once "config.php";
require 'vendor/autoload.php';

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("abdul.rehman@ucertify.com", "Abdul Rehman Sendgrid");
$email->setSubject("The email is sent using sendgrid");
$email->addTo("raj.maurya@ucertify.com", "Raj Maurya");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent("text/html", "<strong>and easy to do anywhere, even with PHP</strong>");
$sendgrid = new \SendGrid(getenv(SENDGRID_API_KEY));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}