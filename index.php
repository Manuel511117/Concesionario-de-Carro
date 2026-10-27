<?php
// Cargar datos
$cars = require __DIR__ . '/config/cars.php';

// Capturar filtros de la URL
$type     = $_GET['type']      ?? 'Todos';
$brand    = $_GET['brand']     ?? 'Todas';
$maxPrice = (int) ($_GET['max_price'] ?? 1000000);
$search   = trim($_GET['q'] ?? '');

// Filtrar los autos
$filteredCars = array_filter($cars, function ($car) use ($type, $brand, $maxPrice, $search) {
    $okType  = ($type === 'Todos') || ($car['type'] === $type);
    $okBrand = ($brand === 'Todas') || ($car['brand'] === $brand);
    $okPrice = $car['price'] <= $maxPrice;
    $okSearch = $search === '' || stripos($car['brand'] . ' ' . $car['model'] . ' ' . $car['type'], $search) !== false;
    return $okType && $okBrand && $okPrice && $okSearch;
});

// Incluir secciones
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/hero.php';
require __DIR__ . '/includes/catalogo.php';
require __DIR__ . '/includes/financiamiento.php';
require __DIR__ . '/includes/vender.php';
require __DIR__ . '/includes/nosotros.php';
require __DIR__ . '/includes/testimonios.php';
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/modals.php';
?>