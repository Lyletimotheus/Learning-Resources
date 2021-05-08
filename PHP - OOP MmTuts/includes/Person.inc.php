<?php

class Person {
    public $first = "John"; 
    private $last = "Doe";
    private $age = "32";
}

class Pet extends Person{
    public function owner(){
        $a = $this -> first;
        return $a;
    }
}