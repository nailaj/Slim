<?php

use Slim\App;
use Models\Musics;

// Connexió amb la base de dades SQLite
function getDb() {
    return new PDO('sqlite:' . __DIR__ . '/../db/musics.db');
}

return function (App $app) {
    // Ruta per obtenir i mostrar les biografies dels músics
    $app->get('/', function ($request, $response, $args) {
        // Obtenim les dades de la base de dades
        $db = getDb();
        $musics = new Musics($db);
        $musicians = $musics->getAllMusicians();
        
        // Mostrar les biografies amb PHP
        ob_start();
        include __DIR__ . '/../view/biografia.php';
        $output = ob_get_clean();
        
        $response->getBody()->write($output);
        return $response;
    });
};
