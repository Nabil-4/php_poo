<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    ul {
        list-style: none;
    }
</style>
<body>
    <h1>Dashboard</h1>

    <?php 
    if (isset($_SESSION['admin'])): ?>
        <h2>Bonjour <?= $_SESSION['admin']["username"] ?></h2>

        <ul>
            <li><a href="ajoutProduit.php">Ajouter un produit</a></li>
            <li><a href="listeProduit">Liste des produits</a></li>
        </ul>

    <?php else: ?>
        <?php header("location:index.php") ?>
    <?php endif ?>
</body>
</html>