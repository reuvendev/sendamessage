<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id'])) {
    die("No message ID provided.");
}

try {
    $pdo = new PDO("mysql:host=db2.sillydevelopment.co.uk;dbname=s49151_sendamessage", "u49151_RbZrGtGyg8", "Vg7ac29.Usu^PcQDCV.^UddS");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM messages WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $message = $stmt->fetch();

    if (!$message) {
        die("Message not found.");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message #<?= htmlspecialchars($message['id']) ?></title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f0f0f0;
      padding: 20px;
      max-width: 700px;
      margin: auto;
    }
    .message-box {
      background: #fff;
      padding: 20px;
      border-left: 5px solid #ce0000;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      word-wrap: break-word;
    }
    h2 {
      color: #ce0000;
    }
  </style>
</head>
<body>
  <h2>Message #<?= htmlspecialchars($message['id']) ?></h2>
  <div class="message-box">
    <?= nl2br(htmlspecialchars($message['message'])) ?>
  </div>
</body>
</html>
