<?php

class Musics {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMusics() {
        $query = "SELECT * FROM musicians";
        $results = $this->db->query($query);

        $musics = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $musics[] = $row;
        }

        return $musics;
    }
}
?>
