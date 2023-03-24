<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'punto_de_venta';
$username = 'root';
$password = '';

// Creamos la conexión a la base de datos
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
