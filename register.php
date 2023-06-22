<?php 
include_once "./config/config.php";
include_once "./class/inscription.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 500px;
    }
</style>
<body>
    <form action="register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">

        <label for="f_name">First Name</label>
        <input type="text" name="f_name">

        <label for="l_name">Last Name</label>
        <input type="text" name="l_name">

        <label for="photo">Photo de profil</label>
        <input type="file" name="photo">

        <input type="submit" value="S'inscrire">
    </form>

    <br>
    <a href="index.php">Login</a>
</body>
</html>

<?php

if ($_POST) {
    $msg_error = "Veuiller remplir les champs suivants : ";
    foreach ($_POST as $key => $value) {
        ${$key} = $value;

        if (!isset($key)) {
            $error = true;
            $msg_error .= "<br>".$key;
        }
    }

    if (isset($error)) {
        echo $msg_error;
    } else {
        $inscription = new Inscription();
        $inscription->registerUser($username, $password, $f_name, $l_name, $photo);
    }   
}