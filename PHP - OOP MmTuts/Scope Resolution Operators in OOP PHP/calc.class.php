<?php
//Scope Resolution Operator (::)

class FirstClass {
    const EXAMPLE = "You can't change this!";

    public static function test() {
        $testing = "This is a test!";
        return $testing;
    }
}

$a = FirstClass::test();
echo $a;

class SecondClass extends FirstClass {
    public static $staticProperty = "A static property!";

    public static function anotherTest(){
        echo parent::EXAMPLE; // Use the parent keyword to access the const from the parent class as it extends that class
        echo self::$staticProperty; //Use the self keyword to access the static property
    }
}

// $b = SecondClass::anotherTest();
// echo $b;