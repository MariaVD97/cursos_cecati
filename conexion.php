<?php

$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "sistema";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); 
}
