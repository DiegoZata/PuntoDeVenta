<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>

<nav>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Ventas</a></li>
        <li><a href="#">Usuarios</a></li>
        <li><a href="#">Cerrar sesión</a></li>
    </ul>
</nav>

<div class="container">
    <h2>Dashboard</h2>
    <p>Esta es la página principal del sistema de punto de venta.</p>
</div>

</body>
</html>
