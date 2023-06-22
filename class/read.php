<?php

class Read extends Database {

    public function readData() {
        $sql = "SELECT * FROM user";
        $stmt = $this->getConnection()->query($sql);
        while($row = $stmt->fetchAll()) {
            echo $row['username'];
        }
    }
}