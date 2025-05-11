<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response) {
    // Connectar a la base de dades
    $dbPath = __DIR__ . '/../db/musics.db';
    $db = new SQLite3($dbPath);

    // Obtenir dades
    $results = $db->query("SELECT * FROM musicians");

    // Començar el HTML
    $htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Músics del Pakistan</title>
</head>
<body>
    <h1>Músics icònics del Pakistan</h1>
    <h3>Desenvolupament Web en Entorn Servidor – Activitat A23</h3>
    <p>Consulta de biografies extretes dinàmicament d'una base de dades amb Slim PHP.</p>
    <h2>Pakistani Musicians</h2>
    <ul>
HTML;

    // Afegir cada músic a la llista
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $htmlContent .= "<li>
            <h3>{$row['name']}</h3>
            <p>{$row['biography']}</p>
            <img src=\"{$row['image_url']}\" alt=\"{$row['name']}\" width=\"200\"><br>
            <a href=\"{$row['website']}\" target=\"_blank\">Web / YouTube</a>
        </li><hr>";
    }

    $htmlContent .= <<<HTML
    </ul>
</body>
</html>
HTML;

    // Retornar el contingut
    $response->getBody()->write($htmlContent);
    return $response->withHeader("Content-Type", "text/html");
});

$app->run();
