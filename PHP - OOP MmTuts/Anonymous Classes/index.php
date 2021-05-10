<?php
// Regular class example
include_once "classes/simpleclass.class.php";
$obj = new SimpleClass();

$obj -> helloWorld();


// Anonymous Class example
$newObj = new Class() {
    public function helloWorld() {
        echo "Hello World !!";
    }
};

$newObj -> helloWorld();