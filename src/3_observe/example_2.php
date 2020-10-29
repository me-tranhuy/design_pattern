<?php


interface Subject {
 
    public function attach(Observer $observer);
 
    public function detach(Observer $observer);
 
    public function notifyAllObserver();
}

interface Observer {
    public function update(Subject $subject);
}


// init Subject User Register
class UseRegister implements Subject {

    protected $observers = [];
    
    public $email;
    
    public $name;

    public function __construct($email, $name)
    {
        $this->email   = $email;
        $this->name    = $name;
    }

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
        return $this;
    }
 
    public function detach(Observer $observer) {
        unset($this->observers[$key]);
    }
 
    public function notifyAllObserver() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class Email implements Observer
{
    public function update(Subject $subject)
    {
        echo "A new user register system : " . $subject->name . " proceed send mail active to email : " . $subject->email . "<br><br>";
    }
}

class LogRegisterUser implements Observer
{
    public function update(Subject $subject)
    {
        echo "A new user register system : " . $subject->name . " procceed write log history user : " . $subject->email . "<br><br>";
    }
}


$name = 'Tony Tèo';
$email = 'tonyteo@gamil.com';

echo "<h3>";

echo "New user register system <br><br>"; 


$User = new UseRegister($email, $name); // << the subject


echo "Adding observers to subject UserRegister<br><br>";


/*****  attach objects observe subject User  ****/

$User->attach(new Email())
     ->attach(new LogRegisterUser());  // << adding the 3 observers



echo "Now going to notify to all Observes of User register Subject<br><br>";


$User->notifyAllObserver();

echo "Done<br>";
echo "</h3>";


