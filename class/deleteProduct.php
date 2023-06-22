<?php

class DeleteProduct extends Database {

    public function DeleteProduit() {
        if (isset($_GET['delete'])) {
            if (isset($_GET['confirm'])) {
                if ($_GET['confirm'] === "oui") {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM produit WHERE id = :id";
                    $stmt = $this->getConnection()->prepare($sql);
                    $stmt->bindParam(":id", $id);

                    $stmt->execute();

                    header("location:listeProduit.php");
                } else {
                    header("location:listeProduit.php");
                }
            }
        } 
    }
}