<?php
// Interfaces

interface PaymentInterface {
    public function payNow(); // If a class follows this interface it needs to have a method of payNow()
}

interface LoginInterface {
    public function loginFirst();
}

class Paypal implements PaymentInterface, LoginInterface  {
    public function loginFirst() {}
    public function payNow() {}
    public function paymentProcess() {
        $this -> loginFirst();
        $this -> payNow();
    }
}

class BankTransfer implements PaymentInterface, LoginInterface  {
    public function loginFirst() {}
    public function payNow() {}
    public function paymentProcess() {
        $this -> loginFirst();
        $this -> payNow();
    }
}

class Visa implements PaymentInterface {
    public function payNow() {}
    public function paymentProcess() {
        $this -> payNow();
    }
}

class Cash implements PaymentInterface {
    public function payNow() {}
    public function paymentProcess() {
        $this -> payNow();
    }
}

class BuyProduct {
    public function pay(PaymentInterface $paymentType){
        $paymentType -> paymentProcess();
    }
}

// Creating the objects
$paymentType = new Cash();
$buyProduct = new BuyProduct();
$buyProduct -> pay($paymentType);
