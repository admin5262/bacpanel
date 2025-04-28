<?php
session_start();
include '../db.php';

if (isset($_POST['usuario'], $_POST['contrasena'])) {
    $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ? AND contrasena = ?");
    $stmt->execute([$_POST['usuario'], $_POST['contrasena']]);
    $admin = $stmt->fetch();
    
    if ($admin) {
        $_SESSION['admin'] = true;
        header('Location: panel.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Login</title>
</head>
<body>
    <h1>Iniciar sesión en el Panel</h1>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="contrasena" placeholder="Contraseña" required><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
