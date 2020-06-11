<?php
//below, write code for defining class
class Calculator{
    protected $history;

    public function __construct()
    {
        $this->history = [];
    }

    public function add(float $num1, float $num2) : float {
        $result = $num1 + $num2;
        $this->history[] = "added $num1 to $num2 got $result";
        return $result;
    }

    public function multiply(float $num1,float $num2) : float {
        $result = $num1 * $num2;
        $this->history[] = "multiplied $num1 with $num2 got $result";
        return $result;
    }

    public function subtract(float $num1, float $num2) : float {
        $result = $num2 - $num1;
        $this->history[] = "subtracted $num1 from $num2 got $result";
        return $result;
    }

    public function divide(float $num1, float $num2) : float {
        $result = $num1 / $num2;
        $this->history[] = "divided $num1 by $num2 got $result";
        return $result;
    }

    public function printOperations() :void {
        print_r($this->history);
    }

    public function clearOperations() : void {
        $this->history = [];
    }
}
$a = new Calculator();
$a->add(3,5);
$a->multiply(3,5);
$a->subtract(7,3);
$a->divide(12,3);
$a->printOperations();

var_dump($a);
$a->clearOperations();