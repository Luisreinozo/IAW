<?php
// Archivo de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Abcd1234.";
$dbname = "instituto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
