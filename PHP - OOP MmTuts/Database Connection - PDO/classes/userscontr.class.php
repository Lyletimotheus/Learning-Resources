<?php
// This class will update the data in the database (INSERT AND UPDATE, DELETE QUERIES)

class UsersContr extends Users {
    public function createUser($username, $email) {
        $this -> setUser($username, $email);
    }
}