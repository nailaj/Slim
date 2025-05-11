<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3(__DIR__ . '/../db/musics.db');  // Ruta a la base de datos
?>