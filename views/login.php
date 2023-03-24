<?php
session_start();
if(isset($_SESSION['username'])){
  header("Location: dashboard.php");
  exit();
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  require_once('../config/config.php');
  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $row = $stmt->fetch();
    if($row && password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit();
    } else {
      $error = "Usuario o contraseña incorrectos.";
    }
  } catch(PDOException $e) {
    $error = "Error al conectarse a la base de datos: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
</head>
<body>
  <h1>Iniciar sesión</h1>
  <?php if(isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="POST">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Iniciar sesión">
  </form>
</body>
</html>
