<?php 
session_start();
include_once "./config/config.php";
include_once "./class/connexion.php" ;

if (isset($_SESSION["user"]) || isset($_SESSION['admin'])) {
    session_destroy();
}
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
    <form action="index.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">

        <input type="submit" value="Connexion">
    </form>

    <a href="register.php">Inscription</a>
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
        $connexion = new Connexion();
        $connexion->seConnecter($username, $password);
    }   
}