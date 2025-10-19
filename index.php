<?php
// Simple PHP page that connects to MySQL using env vars
$host = getenv('DB_HOST') ?: 'mysql';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'secret';
$db   = getenv('DB_NAME') ?: 'myapp';

$conn = new mysqli($host, $user, $pass, $db);

?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>PHP MySQL App</title></head>
<body>
  <h1>PHP + MySQL Demo</h1>
  <?php if ($conn->connect_error): ?>
    <p style="color:red">DB connection failed: <?= htmlspecialchars($conn->connect_error) ?></p>
  <?php else: ?>
    <p style="color:green">Connected to MySQL successfully!</p>
    <?php
      $res = $conn->query("CREATE TABLE IF NOT EXISTS visits (id INT AUTO_INCREMENT PRIMARY KEY, ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
      $conn->query("INSERT INTO visits () VALUES ()");
      $r = $conn->query("SELECT COUNT(*) AS c FROM visits");
      $row = $r->fetch_assoc();
    ?>
    <p>Visit count: <?= (int)$row['c'] ?></p>
  <?php endif; ?>
</body>
</html>
