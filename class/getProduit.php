<?php

class getProduit extends Database {

    public function getProduit() {
        $id = $_GET['modif'];

        $sql = "SELECT * FROM produit WHERE id = :id";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetchAll();

        $_SESSION['produit'] = $result[0];

    }
}