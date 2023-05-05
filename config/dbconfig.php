<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'punto_de_venta');

/* Conectarse a la base de datos MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Revisar la conexión
if($link === false){
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}
?>
