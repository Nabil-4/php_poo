<?php

class ListeProduit extends Database {

    public function getAllProduit() {
        $sql = "SELECT * FROM produit";
        $stmt = $this->getConnection()->query($sql);

        $result = $stmt->fetchAll();

        $_SESSION['listeProduit'] = $result;

    }
}