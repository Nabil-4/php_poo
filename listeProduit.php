<?php
session_start();
include_once "./config/config.php";
include_once "./class/listeProduct.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Liste des produits</h1>
    <?php
    $listeProduit = new ListeProduit();
    $listeProduit->getAllProduit();
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
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <a href="dashboard">Dashboard</a>
</body>

</html>