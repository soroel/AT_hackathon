<?php
$headers = [
    'apiKey: 4b04974557ed796e6978f3af009758e104d6284be7bd5e657eba9c8d443043b2',
    'Content-Type: application/x-www-form-urlencodedn',
    'Accept: application/json'
];
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username = "sandbox";
$apikey   = "4b04974557ed796e6978f3af009758e104d6284be7bd5e657eba9c8d443043b2";

// Initialize the SDK
$AT       = new AfricasTalking($username, $apiKey);

// Get the voice service
$voice    = $AT->voice();

// Set your Africa's Talking phone number in international format
$from     = "+254794824427";

// Set the numbers you want to call to in a comma-separated list
$to       = "+254115787812";

try {
    // Make the call
    $results = $voice->call([
        'from' => $from,
        'to'   => $to
    ]);

    print_r($results);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}