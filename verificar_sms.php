<?php
include 'db.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$codigo_sms = isset($_POST['codigo_sms']) ? $_POST['codigo_sms'] : '';

if ($id == 0 || empty($codigo_sms)) {
    die("Datos incompletos.");
}

// Lógica para verificar el código SMS (esto puede depender de cómo realizas la validación)
$codigo_valido = '123456'; // Ejemplo: el código correcto es '123456'. Ajusta según tu lógica.

if ($codigo_sms == $codigo_valido) {
    // Si el código es correcto, actualizamos el estado a "pendiente"
    $stmt = $conn->prepare("UPDATE usuarios SET sms_status = 'pendiente' WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirigir a loading2.php para verificar el estado actualizado
    header("Location: loading2.php?id=$id");
} else {
    // Si el código es incorrecto, se muestra un mensaje de error
    echo "Código SMS incorrecto. Inténtalo de nuevo.";
    // Redirigir de nuevo a sms.php para reingresar el código
    header("Location: sms.php?id=$id");
}
?>
