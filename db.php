<?php
$host = 'db2.sillydevelopment.co.uk';
$db = 's49151_sendamessage';
$user = 'u49151_RbZrGtGyg8';
$pass = 'Vg7ac29.Usu^PcQDCV.^UddS';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
