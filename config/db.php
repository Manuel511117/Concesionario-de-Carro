<?php
require_once __DIR__ . '/constants.php';

$cfg = require __DIR__ . '/db.php.local'; // o inline tus credenciales:

$host   = 'localhost';
$dbname = 'manuel1_apex';
$user   = 'manuel1_apex';
$pass   = '1234';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    die('Error de conexión a la base de datos.');
}