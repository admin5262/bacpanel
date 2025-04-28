<?php
session_start();
include 'db.php';

// Último usuario insertado (puedes mejorar esto si quieres seguridad extra)
$stmt = $conn->query("SELECT status FROM usuarios ORDER BY id DESC LIMIT 1");
$status = $stmt->fetchColumn();

echo json_encode(['status' => $status]);
?>
