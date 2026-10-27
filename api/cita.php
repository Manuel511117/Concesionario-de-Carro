<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['ok'=>false,'message'=>'Método no permitido']); exit; }
$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$fecha  = trim($_POST['fecha'] ?? '');
$carName = trim($_POST['car_name'] ?? '');
if (!$nombre || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$fecha) {
    echo json_encode(['ok'=>false,'message'=>'Datos inválidos']); exit;
}
// buscar car_id por nombre (opcional)
$carId = null;
if ($carName) {
    $s = $pdo->prepare("SELECT id FROM cars WHERE CONCAT(brand,' ',model) = ? LIMIT 1");
    $s->execute([$carName]);
    $carId = $s->fetchColumn() ?: null;
}
$stmt = $pdo->prepare("INSERT INTO appointments (car_id,nombre,email,fecha) VALUES (?,?,?,?)");
$stmt->execute([$carId, $nombre, $email, $fecha]);
echo json_encode(['ok'=>true,'message'=>'Cita agendada. Te contactaremos.']);