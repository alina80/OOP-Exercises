<?php
//below, write code for defining class
class BankAccount{
    private $number;
    private $balance;

    public function __construct(int $number)
    {
        $this->number = $number;
        $this->balance = 0;
    }

    public function depositCash(float $amount): void {
        if (is_numeric($amount) && $amount > 0){
            $this->balance = $this->getBalance() + $amount;
        }
    }

    public function withdrawCash(float $amount): void{
        if (is_numeric($amount) && $amount > 0){
            if ($amount < $this->getBalance()){
                $this->balance =  $this->getBalance() - $amount;
            }else{
                echo "Insuficient fonds";
            }
        }
    }

    public function printInfo() : void {
        echo "ID: " . $this->getNumber() . " Balance: " . $this->getBalance();
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

}

$client1 = new BankAccount(10);
$client1->depositCash(40);
$client1->withdrawCash(10);

$client1->printInfo();