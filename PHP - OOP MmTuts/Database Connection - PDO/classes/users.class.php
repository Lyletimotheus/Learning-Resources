<?php
// This class will handle all the database interactions

class Users extends Dbh {
    protected function getUser($username) {
        $sql = "SELECT * FROM tbl_test WHERE username = ?";
        $stmt = $this -> connect()->prepare($sql);
        $stmt ->execute([$username]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setUser($username, $email) {
        $sql = "INSERT INTO tbl_test(username, email) VALUES(?,?)";
        $stmt = $this -> connect()->prepare($sql);
        $stmt ->execute([$username, $email]);
    }
}