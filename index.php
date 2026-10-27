<?php
// php/index.php

// 1. Cargar los datos de los vehículos
$carsFile = __DIR__ . '/config/cars.php';

if (!file_exists($carsFile)) {
    die("No se encontró el archivo de vehículos: $carsFile");
}

$cars = require $carsFile;

if (!is_array($cars)) {
    die("config/cars.php debe retornar un array. Devolvió: " . gettype($cars));
}

// 2. Capturar los filtros de la URL (para el buscador)
$type     = $_GET['type']      ?? 'Todos';
$brand    = $_GET['brand']     ?? 'Todas';
$maxPrice = (int) ($_GET['max_price'] ?? 1000000);
$search   = trim($_GET['q'] ?? '');

// 3. Filtrar los autos (lógica que antes hacía JS)
$filteredCars = array_filter($cars, function ($car) use ($type, $brand, $maxPrice, $search) {
    $carType  = $car['type']  ?? '';
    $carBrand = $car['brand'] ?? '';
    $carModel = $car['model'] ?? '';
    $carPrice = $car['price'] ?? 0;

    $okType   = ($type === 'Todos')  || ($carType === $type);
    $okBrand  = ($brand === 'Todas') || ($carBrand === $brand);
    $okPrice  = $carPrice <= $maxPrice;
    $okSearch = $search === '' || stripos($carBrand . ' ' . $carModel . ' ' . $carType, $search) !== false;

    return $okType && $okBrand && $okPrice && $okSearch;
});

// Reindexar para que las claves sean 0,1,2... (útil en los foreach)
$filteredCars = array_values($filteredCars);

// 4. Incluir las partes de la página
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/hero.php';
require __DIR__ . '/includes/catalogo.php';
require __DIR__ . '/includes/financiamiento.php';
require __DIR__ . '/includes/vender.php';
require __DIR__ . '/includes/nosotros.php';
require __DIR__ . '/includes/testimonios.php';
require __DIR__ . '/includes/footer.php';
require __DIR__ . '/includes/modals.php';