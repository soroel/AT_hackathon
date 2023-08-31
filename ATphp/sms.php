<?php
$headers = [
    'apiKey: 4b04974557ed796e6978f3af009758e104d6284be7bd5e657eba9c8d443043b2',
    'Content-Type: application/json',
    'Accept: application/json',
];

require 'vendor/autoload.php';
require_once 'constants.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username   = "sandbox";
$apiKey     = "4b04974557ed796e6978f3af009758e104d6284be7bd5e657eba9c8d443043b2";

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = "+254794824427";

// Set your message
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Set your shortCode or senderId
$from       = "7309";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}