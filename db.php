<?php
$servername = "localhost";
$username = "root"; // o tu usuario de phpMyAdmin
$password = "";     // tu contraseña (vacía si estás en localhost)
$dbname = "control_accesos";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
