<?php
class Test extends Dbh {
    public function getUsers() {
        $sql = "SELECT * FROM tbl_test";
        $stmt = $this -> connect() -> query($sql);
        while($row = $stmt -> fetch()) {
            echo $row['username'] ."<br/>";
        }
    }

    public function getUsersStmt($username, $email) {
        $sql = "SELECT * FROM tbl_test WHERE username= ? AND email= ?";
        $stmt = $this -> connect() -> prepare($sql);
        $stmt-> execute([$username, $email]);
        $UserNames = $stmt->fetchAll();

        foreach($UserNames as $UserName) {
            echo $UserName['username'] ."<br/>";
        }
    }

    public function setUsers($username, $email) {
        $sql = "INSERT INTO tbl_test(username, email) VALUES(?,?)";
        $stmt = $this -> connect() -> prepare($sql);
        $stmt-> execute([$username, $email]);
    }

}

?>