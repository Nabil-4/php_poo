<?php
session_start();
include_once "./config/config.php";
include_once "./class/listeProduct.php";
include_once "./class/deleteProduct.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        text-align: center;
    }
</style>

<body>
    <h1>Liste des produits</h1>
    <?php
    $listeProduit = new ListeProduit();
    $listeProduit->getAllProduit();

    $deleteProduit = new DeleteProduct;
    $deleteProduit->DeleteProduit();
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Categorie</th>
                <th scope="col">Avis</th>
                <th scope="col">Prix</th>
                <th scope="col">Photo</th>
                <th scope="col">Modification</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['listeProduit'] as $list => $keyValue): ?> 
                <?php foreach ($keyValue as $key => $value) {
                    ${$key} = $value;
                } ?> 
                <tr>
                    <th scope="row"><?= $id ?></th>
                    <td><?= $titre ?></td>
                    <td><?= $description ?></td>
                    <td><?= $categorie ?></td>
                    <td><?= $avis ?></td>
                    <td><?= $prix ?></td>
                    <td><img src="upload/<?= $img ?>" alt="<?= $img ?>" style="max-width:100px"></td>
                    <td><a href="modifProduit.php?modif=<?= $id ?>">Modifier</a></td>
                    <td><a href="listeProduit.php?delete=<?= $id ?>">X</a>
                        <?php if (isset($_GET['delete'])): ?>
                            <span><a href="listeProduit.php?delete=<?= $id ?>&confirm=oui">oui</a></span>
                            <span><a href="listeProduit.php?delete=<?= $id ?>&confirm=non">non</a></span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <a href="dashboard">Dashboard</a>
</body>

</html>

    
