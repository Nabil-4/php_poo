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
<body>
    <h1>Utilisateur</h1>

    <?php 
    if (isset($_SESSION['user'])): ?>
        <h2>Bonjour <?= $_SESSION['user']["username"] ?></h2>

        <div>
            <img src="upload/<?= $_SESSION['user']["img"] ?>" alt="<?= $_SESSION['user']["img"] ?>" style="max-width:200px">
            <p>Username : <?= $_SESSION['user']["username"] ?></p>
            <p>First name : <?= $_SESSION['user']["f_name"] ?></p>
            <p>Last name : <?= $_SESSION['user']["l_name"] ?></p>
        </div>
    <?php else: ?>
        <?php header("location:index.php") ?>
    <?php endif ?>
</body>
</html>

