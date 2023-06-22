<?php

class updateProduct extends Database {

    public function updateProduit($titre, $description, $categorie, $avis, $prix, $img) {
        $id = $_GET['modif'];

        $sql = "UPDATE produit 
                SET 
                titre = :titre,
                description = :description,
                categorie = :categorie,
                avis = :avis,
                prix = :prix,
                img = :img
                WHERE id = $id
                LIMIT 1";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(":titre", $titre);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":categorie", $categorie);
        $stmt->bindParam(":avis", $avis);
        $stmt->bindParam(":prix", $prix);
        $stmt->bindParam(":img", $img);

        $stmt-> execute();
    }
}