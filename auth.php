<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

// Load Firebase credentials
$factory = (new Factory)
    ->withServiceAccount(__DIR__ . '/firebase_credentials.json');

$auth = $factory->createAuth(); // ✅ Correct way to initialize authentication

?>
