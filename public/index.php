<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../models/musics.php';

$app = AppFactory::create();

$dbPath = __DIR__ . '/../db/musics.db';
$db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

$musicsModel = new Musics($db);

// Ruta principal
$app->get('/', function (Request $request, Response $response) use ($musicsModel) {
    $musics = $musicsModel->getAllMusics();

    // Carreguem la vista des de /view/biografia.php
    ob_start();
    include __DIR__ . '/../view/biografia.php'; 
    $output = ob_get_clean();

    $response->getBody()->write($output);
    return $response->withHeader("Content-Type", "text/html");
});

$app->run();
