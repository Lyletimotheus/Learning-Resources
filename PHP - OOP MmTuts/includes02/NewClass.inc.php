<?php

class NewClass {
    public $data = "I am a property";

    public function __construct() {
        echo "This class has been instantiated! <br />";
    }

    public function setNewProperty($newData) {
        $this -> data = $newData;
    }

    public function getProperty() {
        return $this -> data;
    }

    public function __destruct(){ 
        echo "This is the end of the class!";
    }
}