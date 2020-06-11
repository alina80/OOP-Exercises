<?php
//below, write code for defining class
class Employee{
    private $id;
    private $firstName;
    private $lastName;
    private $salary;

    public function __construct(int $id, string $firstName, string $lastName, float $salary)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
    }

    public function raiseSalary(float $percent): void{
        if (is_numeric($percent) && $percent > 0){
            $this->salary = $this->getSalary() + $this->getSalary() * $percent;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }
}

$employee1 = new Employee(1,'Alina','Matei',45.5);
$employee1->raiseSalary(0.3);
echo $employee1->getSalary();