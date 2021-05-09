<?php

class Person {
    public $name;
    public $eyeColor;
    public $age;

    public function setName(string $newName) {
        $this -> name = $newName;        
    }

    public function getName(){
        return $this -> name;
    }
}