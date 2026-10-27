<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['ok'=>false,'message'=>'Método no permitido']); exit; }
$marca = trim($_POST['marca'] ?? '');
$modelo = trim($_POST['modelo'] ?? '');
$contacto = trim($_POST['contacto'] ?? '');
if (!$marca || !$modelo || !$contacto) {
    echo json_encode(['ok'=>false,'message'=>'Datos inválidos']); exit;
}
$stmt = $pdo->prepare("INSERT INTO sell_leads (marca,modelo,contacto) VALUES (?,?,?)");
$stmt->execute([$marca, $modelo, $contacto]);
echo json_encode(['ok'=>true,'message'=>'Solicitud recibida. Te contactaremos.']);