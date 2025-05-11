<?php

$dbPath = __DIR__ . '/musics.db';
$db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

if (!$db) {
    die("Error de connexió: " . $db->lastErrorMsg());
}

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
    ('Ali Zafar', 'Cantant, compositor i actor pakistanès.', 'https://i.pinimg.com/originals/ed/47/1b/ed471b2f0eaf714368a8090ca888e241.jpg', 'https://www.alizafar.net'),
    ('Rahat Fateh Ali Khan', 'Nepot de Nusrat Fateh Ali Khan i una estrella de la música sufi moderna.', 'https://rahatfatehalikhantour.com/assets/img/info.ec7e8c46.jpg.webp', 'https://www.rahatfatehalikhan.com'),
    ('Momina Mustehsan', 'Cantant i actriu pakistanesa, coneguda per la seva actuació a Coke Studio.', 'https://i1.sndcdn.com/artworks-000216661953-orob1s-t500x500.jpg', 'https://www.instagram.com/momina_mustehsan/'),
    ('Hassan Raheem', 'Cantant i compositor pakistanès conegut per les seves cançons pop i la seva presència carismàtica.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGljxH3NekmdNUI8u9SFT8FosFqo8YHPxGjg&s', 'https://www.instagram.com/hassanraheem/'),
    ('Qurat-ul-Ain Balouch (QB)', 'Coneguda pel seu estil vocal emocional i poderosa presència escènica.', 'https://fankaronline.com/content/uploads/2016/08/T6OvTkM1_400x400.jpg', 'https://www.instagram.com/qb_says/'),
    ('Asim Azhar', 'Cantant i compositor pakistanès conegut per les seves balades i cançons de pop.', 'https://jang.com.pk/assets/uploads/updates/2016-01-08/1070_7782499_ms_updates.jpg', 'https://www.instagram.com/asiimazhar/'),
    ('Hadiqa Kiani', 'Cantant de pop i clàssic, també activista humanitària.', 'https://m.media-amazon.com/images/M/MV5BZDVhMjA1ZmItZjA2NS00ZThkLThlZTQtOTk4MjFmYjZiOGI4XkEyXkFqcGc@._V1_.jpg', 'https://www.hadiqakiani.net'),
    ('Aima Baig', 'Cantant pakistanesa coneguda per les seves poderoses balades i èxits en cinema i televisió.', 'https://i.brecorder.com/wp-content/uploads/2018/08/aima-baig-1.jpg', 'https://www.instagram.com/aima_baig_official/')
");

if (!$insert) {
    die("Error en l'INSERT: " . $db->lastErrorMsg());
}

echo "Base de dades creada i músics inserits correctament.";

?>
