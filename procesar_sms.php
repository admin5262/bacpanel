<?php
include 'db.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código SMS desde el formulario
    $codigo_sms = $_POST['codigo_sms'];

    try {
        // Preparar la consulta para actualizar el código SMS en la base de datos
        $stmt = $conn->prepare("UPDATE usuarios SET codigo_sms = :codigo_sms, sms_status = 'pendiente' WHERE codigo_sms IS NULL");
        $stmt->bindParam(':codigo_sms', $codigo_sms, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Enviar respuesta exitosa (status 200)
            echo "Código SMS actualizado correctamente.";
        } else {
            // Enviar respuesta de error (status 500)
            echo "Error al actualizar el código SMS.";
        }

    } catch (PDOException $e) {
        // Capturar errores de la base de datos
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>
