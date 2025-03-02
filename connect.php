<?php
$host = 'localhost'; 
$db = 'Astroxteller'; // Replace with your actual database name
$user = 'root'; // Default username for MAMP
$pass = 'root'; // Default password for MAMP

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
