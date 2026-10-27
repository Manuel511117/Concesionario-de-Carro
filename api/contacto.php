<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['ok'=>false,'message'=>'Método no permitido']); exit; }
$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$msg    = trim($_POST['mensaje'] ?? '');
if (!$nombre || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$msg) {
    echo json_encode(['ok'=>false,'message'=>'Datos inválidos']); exit;
}
$stmt = $pdo->prepare("INSERT INTO contact_msgs (nombre,email,mensaje) VALUES (?,?,?)");
$stmt->execute([$nombre, $email, $msg]);
echo json_encode(['ok'=>true,'message'=>'Mensaje enviado. ¡Gracias!']);