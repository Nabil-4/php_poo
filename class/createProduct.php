<?php

class Produit extends Database {

    public function createProduct($titre, $description, $categorie, $avis, $prix, $img) {
        $sql = "SELECT titre FROM produit WHERE titre = :titre";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(":titre", $titre);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Ce produit existe deja";
        } else {
            $sql = "INSERT INTO produit VALUES(id, :titre, :description, :categorie, :avis, :prix, :img)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(":titre", $titre);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":categorie", $categorie);
            $stmt->bindParam(":avis", $avis);
            $stmt->bindParam(":prix", $prix);
            $stmt->bindParam(":img", $img);

            $stmt->execute();

            header('location:listeProduit.php');
        } 
    }
}