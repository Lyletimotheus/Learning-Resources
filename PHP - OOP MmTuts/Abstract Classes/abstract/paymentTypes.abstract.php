<?php

abstract class Visa {
    public function visaPayment() {
        return "Perform a payment";
    }
    abstract public function getPayment(); // Any class that extends the abstract Visa class has to have the abstract method getPayment
}