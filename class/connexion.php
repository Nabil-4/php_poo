<?php

class Connexion extends Database {

    public function seConnecter($username, $password) {
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            echo $result["admin"];
            if ($result['admin'] === "oui") {
                $_SESSION["admin"] = $result;
                header("location:dashboard.php");
            } else if ($result['admin'] === "non") {
                $_SESSION["user"] = $result;
                header("location:user.php");
            }
        } else {
            echo "Username ou password incorrect";
        }
    }
}