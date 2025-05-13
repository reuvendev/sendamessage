<?php
$host = 'db2.sillydevelopment.co.uk';
$db   = 's49151_sendamessage';
$user = 'u49151_RbZrGtGyg8';
$pass = 'Vg7ac29.Usu^PcQDCV.^UddS';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $stmt = $pdo->prepare("INSERT INTO messages (content) VALUES (:message)");
    $stmt->execute(['message' => $_POST['message']]);
    echo "Message saved";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
