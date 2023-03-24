<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
</head>
<body>
  <h1>Bienvenido <?php echo $_SESSION['username']; ?></h1>
  <p>Este es el panel de control de tu sistema de punto de venta.</p>
  <a href="logout.php">Cerrar sesión</a>
</body>
</html>
