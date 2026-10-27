<?php
require_once __DIR__ . '/../config/constants.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_GET['lang']) && in_array($_GET['lang'], AVAILABLE_LANGS)) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? DEFAULT_LANG;

$strings = require __DIR__ . "/$lang.php";

function __($key, ...$args) {
    global $strings;
    $txt = $strings[$key] ?? $key;
    return $args ? vsprintf($txt, $args) : $txt;
}

function current_lang() {
    global $lang;
    return $lang;
}

function lang_switch_url($l) {
    $q = $_GET;
    $q['lang'] = $l;
    return '?' . http_build_query($q);
}