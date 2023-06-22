<?php

class Inscription extends Database {

    public function registerUser($username, $password, $f_name, $l_name, $photo) {
        $sql = "SELECT username FROM user WHERE username = :username";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(":username", $username);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Ce nom est indisponible";
        } else {
            $sql = "INSERT INTO user VALUES (id, :username, :password, :f_name, :l_name, :admin, :img)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":f_name", $f_name);
            $stmt->bindParam(":l_name", $l_name);
            $stmt->bindValue(":admin", "non");
            $stmt->bindParam(":img", $photo);

            $stmt->execute();

            header("location:index.php");
        }

        
    }
}