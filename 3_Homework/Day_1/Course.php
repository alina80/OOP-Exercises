<?php
//below, write code for defining class
class Course{
    private $name;
    private $hours;
    private $startDate;
    private $students;

    public function __construct(string $name, int $hours, string $startDate)
    {
        $this->setName($name);
        $this->setHours($hours);
        $this->setStartDate($startDate);
        $this->students = [];
    }

    public function addStudent(string $name) : bool {
        if (count($this->getStudents()) < 7){
            $this->students[] = $name;
            return true;
        }else{
            echo "Class already full";
            return false;
        }
    }

    public function removeStudent(string $name): bool{
        $toRemove = array_search($name,$this->students);

        if($toRemove !== false) {
            unset($this->students[$toRemove]);
        }

        return $toRemove !== false;
    }

    public function daysToStart(): void{
        if($this->getStartDate() == null) {
            echo 'startDate not set';

        } else {
            $now = new DateTime('now');
            $then = DateTime::createFromFormat("Y-m-d", $this->getStartDate());

            $diff = $then->diff($now);

            if ($then > $now) {
                echo $diff->days;
            } else {
                echo 'Course started';
            }
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): bool
    {
        if (strlen($name) > 0 && strlen($name) <=10) {
            $this->name = $name;
            return true;
        }else{
            echo "Incorect name";
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours): bool
    {
        if (is_integer($hours) && $hours > 0 && $hours <= 50) {
            $this->hours = $hours;
            return true;
        }else{
            echo "Incorect hours";
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): bool
    {
        $tmp = explode('-',$startDate);
        if(strlen($tmp[0]) == 4 && $tmp[0] > 2019){
            if (strlen($tmp[1]) == 2 && $tmp[1] >0 && $tmp[1] < 13){
                if (strlen($tmp[2]) == 2 && $tmp[2] > 0 && $tmp[2] < 32){
                    $this->startDate = $startDate;
                    return true;
                }else{
                    echo "incorrect day";
                    return false;
                }
            }else{
                echo "incorrect month";
                return false;
            }

        }else{
            echo "incorrect year";
            return false;
        }
    }

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }


}

$course1 = new Course('curs1',40,'2020-05-20');
echo $course1->getName();
echo "<br>";
echo $course1->getStartDate();
$course1->addStudent('One');
$course1->addStudent('Two');
$course1->addStudent('Three');
$course1->addStudent('Four');
$course1->addStudent('Five');

echo $course1->daysToStart();
echo "<br>";
print_r($course1->getStudents());
echo "<br>";
echo $course1->removeStudent('Two');
print_r($course1->getStudents());