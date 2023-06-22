<?php

class Categorie extends Database {

    public function getCategorie() {
        $sql = "SELECT * FROM categorie";
        $stmt = $this->getConnection()->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        $_SESSION['categorie'] = [];
        foreach ($result as $key) {
            foreach ($key as $value => $rest) {
                if ($value == "categorie") {
                    array_push($_SESSION['categorie'], $rest);
                }
            }
        }
    }
}