<?php
// This class will handle all the viewing of the database information, so it will read all the data (UI DISPLAY)

class UsersView extends Users {
    public function showUser($username) {
        $results = $this->getUser($username);
        echo "Full name: ". $results[0]['username']. "<br />";
        echo "Email: ". $results[0]['email']. "<br />";
    }
}