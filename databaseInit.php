<?php

$dbPath = __DIR__ . '/db/musics.db';
$db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

if (!$db) {
    die("Error de connexió: " . $db->lastErrorMsg());
}

// Eliminar i crear taula
$db->exec("DROP TABLE IF EXISTS musicians;");
$db->exec("CREATE TABLE IF NOT EXISTS musicians (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    biography TEXT NOT NULL,
    image_url TEXT,
    website TEXT
);");

// Inserció
$insert = $db->exec("INSERT INTO musicians (name, biography, image_url, website) VALUES
    ('Nusrat Fateh Ali Khan', 'Considerat un dels millors artistes de Qawwali de tots els temps.', 'https://cdn.realworldrecords.com/wp-content/uploads/2018/04/04120340/Artist19-1200x675.jpg', 'https://www.youtube.com/results?search_query=nusrat+fateh+ali+khan'),
    ('Atif Aslam', 'Cantant famós per les seves balades romàntiques i la seva veu potent.', 'https://fankaronline.com/content/uploads/2016/08/atif-aslam-759.jpg', 'https://www.atifaslammusic.com'),
    ('Abida Parveen', 'Una llegenda viva de la música sufi.', 'https://m.media-amazon.com/images/M/MV5BYjczYWM3MDAtYmUzMy00ZDkxLWJlYjUtNDA2NjAzNWVkODQxXkEyXkFqcGc@._V1_.jpg', 'https://www.youtube.com/results?search_query=abida+parveen'),
    ('Ali Zafar', 'Cantant, compositor i actor pakistanès.', 'https://i.pinimg.com/originals/ed/47/1b/ed471b2f0eaf714368a8090ca888e241.jpg', 'https://www.alizafar.net')
");

if (!$insert) {
    die("Error en l'INSERT: " . $db->lastErrorMsg());
}

echo "Base de dades creada i músics inserits correctament.";
