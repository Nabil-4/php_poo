<?php 
session_start();
include_once "./config/config.php";
include_once "./class/getCategorie.php";
include_once "./class/createProduct.php"
?>
<?php if($_SESSION['admin']['admin'] === "oui"): ?>

    <h1>Ajouter un produit</h1>

    <style>
        form {
            display: flex;
            flex-direction: column
        }
    </style>


    <?php
    if ($_POST) {
        $msg_error = "Veuiller remplir le champs suivant : ";
        foreach ($_POST as $key => $value) {
            ${$key} = $value;
            if (empty($value)) {
                $error = true;
                $msg_error .= "<br>". $key;
            }
        }
        
        if (isset($error)) {
            echo '<br>'.$msg_error;
        } else {
            $produit = new Produit;
            $produit->createProduct($titre, $description, $categorie, $avis, $prix, $img);
        }
    } ?>

    <form action="ajoutProduit.php" method="POST">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre">

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>

        <label for="categorie">Categorie</label>
        <?php 
        $getCategorie = new Categorie;
        $getCategorie->getCategorie();
        ?>
        <select name="categorie" id="categorie">
            <option value="">Categorie</option>
            <?php foreach ($_SESSION['categorie'] as $key => $value): ?>
                
                <option value="<?= $value ?>"><?= $value ?></option>
            <?php endforeach ?>
        </select>

        <label for="avis">Avis</label>
        <input type="text" name="avis" id="avis">

        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix">

        <label for="img">Image</label>
        <input type="file" name="img" id="img">

        <input type="submit" value="Ajouter">
    </form>

    <br>
    <span><a href="dashboard.php">RETOUR</a></span>
<?php else: ?>
    <?php header('location:index.php') ?>
<?php endif ?>