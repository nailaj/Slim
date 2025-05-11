<?php

class Musics {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Funció per obtenir tots els músics
    public function getAllMusicians() {
        $stmt = $this->db->query("SELECT * FROM musicians");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
