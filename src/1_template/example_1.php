<?php

abstract class Salary {

    protected $name         = '';
    protected $typeEmploy   = '';
    protected $totalSalary  = '';

    public $timeOT = '';
    public $salOT  = '';

    public function __construct($name, $type, $salary){
        $this->name         = $name;
        $this->typeEmploy   = $type;
        $this->salary       = $salary;
    }

    // trọng tâm template method pattern la final class
    public final function TotalSalary ()
    {
        
        $this->calOT();
        $this->calSalary();
        $this->exportPayslip();
    }


    abstract public function calOT();
    abstract public function calSalary();

    private function exportPayslip()
    {
        
        $result = $this->name . " is employee " . $this->typeEmploy . 
                "<br> Salary of per month is : " . $this->salary . " USD " . 
                "<br> Time OT is : " . $this->timeOT . " Hours" .
                "<br>Total Salary of you is : " . $this->totalSalary . " USD ";

        echo "<h3>".$result."</h3>";
    }
}


class Fulltime extends Salary{

    public function __construct($name, $typeEmploy, $salary, $timeOT){

        parent::__construct($name, $typeEmploy, $salary);
        $this->timeOT = ( !empty($timeOT) && $timeOT !=0) ? $timeOT :  1;
        
    }

    public function calOT(){
        $this->salOT = $this->salary * $this->timeOT;
    }

    public function calSalary(){
        return $this->totalSalary = $this->salary + $this->salOT;
    } 
}


class Parttime extends Salary{

    public function __construct($name, $typeEmploy, $salary, $timeOT){

        parent::__construct($name, $typeEmploy, $salary);
        $this->timeOT = ( !empty($timeOT) && $timeOT != 0) ? $timeOT / 2 : 0;
        
    }

    public function calOT(){
        $this->salOT = $this->salary * $this->timeOT;
    }

    public function calSalary(){
        return $this->totalSalary = ($this->salary / 2) + $this->salOT;
    } 
}

$employee1 = new Fulltime('Kenny Tèo', 'Full Time', 50, 2);
echo $employee1->TotalSalary();

echo "<br>";

$employee2 = new Parttime('Tony Tý', 'Part Time', 50, '');
echo $employee2->TotalSalary();
