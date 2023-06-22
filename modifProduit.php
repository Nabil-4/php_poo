<?php session_start();
include_once "./config/config.php";
include_once "./class/getProduit.php";
include_once "./class/updateProduct.php";
?>


<?php if($_SESSION['admin']['admin'] =="oui"): ?>

    <h1>Modification</h1>

    <style>
        form {
            display: flex;
            flex-direction: column
        }
    </style>

    <?php 
    $produit = new getProduit();
    $produit->getProduit();

    foreach ($_SESSION['produit'] as $key => $value) {
        ${$key} = $value;
    }

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
            $updateProduit = new updateProduct;
            $updateProduit->updateProduit($titre, $description, $categorie, $avis, $prix, $img);
            header("location:listeProduit.php");
        }
    } ?>

    <form action="" method="POST" id="form-produit">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?= $titre ?>">

        <label for="description">Description</label>
        <textarea name="description" id="description"><?= $description ?></textarea>

        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" id="categorie" value="<?= $categorie ?>">

        <label for="avis">Avis</label>
        <input type="text" name="avis" id="avis" value="<?= $avis ?>">

        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix" value="<?= $prix ?>">

        <label for="img">Image</label>
        <img src="upload/<?= $img ?>" alt="<?= $img ?>" style="max-width:150px">
        <input type="file" name="img" id="img">

        <input type="submit" value="Modifier">
    </form>

    <br>
    <span><a href="dashboard.php">RETOUR</a></span>
<?php else: ?>
    <?php header('location:index.php') ?>
<?php endif ?>