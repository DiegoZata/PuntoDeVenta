<?php
session_start();

require_once('../config/dbconfig.php');

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

   $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($link, $query);
    

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['nombre'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "La contraseña es incorrecta";
        }
    } else {
        $error = "El correo electrónico no existe";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <form action="" method="post">
        <h2>Iniciar sesión</h2>
        <?php if(isset($error)) { ?>
            <div class="text-danger"><?php echo $error; ?></div>
        <?php } ?>
        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
</div>

</body>
</html>
