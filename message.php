<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=db2.sillydevelopment.co.uk;dbname=s49151_sendamessage", "u49151_RbZrGtGyg8", "Vg7ac29.Usu^PcQDCV.^UddS");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Fix: Removing 'content' column as it doesn't exist
    $messages = $pdo->query("SELECT id FROM messages ORDER BY id DESC")->fetchAll();
} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f8f8f8;
      padding: 20px;
      max-width: 700px;
      margin: auto;
    }
    h2 {
      color: #ce0000;
    }
    .msg {
      background: #fff;
      border-left: 5px solid #ce0000;
      margin-bottom: 15px;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .msg:hover {
      transform: scale(1.01);
    }
    a {
      text-decoration: none;
      color: #ce0000;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>All Messages</h2>
  <?php if (count($messages) === 0): ?>
    <p>No messages found.</p>
  <?php else: ?>
    <?php foreach ($messages as $m): ?>
      <div class="msg">
        <a href="view.php?id=<?= $m['id'] ?>">View Message #<?= $m['id'] ?></a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>
