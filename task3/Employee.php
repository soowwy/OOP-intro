<?php

require_once ('Task.php');

class Employee
{

    private $name;
    private $currentTask;
    private $hoursLeft = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($newName){
        if ($newName == '') {
            echo 'name must not be empty!';
        }
        return $this->name = $newName;
    }

    public function getName() {

        return $this->name;
    }

    public function setCurrentTask(Task $currentTask) {
        return $this->currentTask = $currentTask;
    }

    public function getCurrentTask() {
        return $this->currentTask;
    }

    public function setHoursLeft($hoursLeft) {
        if ($hoursLeft < 0) {
            echo 'numbers must be positive!';
        }
        return $this->hoursLeft = $hoursLeft;
    }

    public function getHoursLeft() {
        return $this->hoursLeft;
    }


    public function work() {
        if($this->currentTask != '') {

            $difference = $this->getHoursLeft() - $this->getCurrentTask()->getWorkingHours();

            if ($this->getHoursLeft() < $this->getCurrentTask()->getWorkingHours()) {
                $this->getCurrentTask()->setWorkingHours($difference);
                $this->setHoursLeft(0);
            } else {
                $this->setHoursLeft($difference);
                $this->getCurrentTask()->setWorkingHours(0);
            }
        }
    }

    public function showReport() {
        echo 'The name of the employee is:'.' '.$this->getName().PHP_EOL;
        echo 'Name of the task is:'.' '.$this->getCurrentTask()->getName().PHP_EOL;
        echo 'Hours left to finish the task:'.' '.$this->getHoursLeft().PHP_EOL;
        echo 'Hours left of the working day:'.' '.$this->getCurrentTask()->getWorkingHours();
    }

}
