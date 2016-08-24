<?php

class Computer
{
    private $year;
    private $price;
    private $isNoteBook;
    private $hardDiskMemory;
    private $freeMemory;
    private $operationSystem ;

    public function __construct($year, $price, $isNoteBook, $hardDiskMemory, $freeMemory, $operationSystem)
    {
        $this->year = $year;
        $this->price = $price;
        $this->isNoteBook = $isNoteBook;
        $this->hardDiskMemory = $hardDiskMemory;
        $this->freeMemory = $freeMemory;
        $this->operationSystem = $operationSystem;

    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        return $this->year = $year;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        return $this->price = $price;
    }

    public function getIsNotebook() {
        return $this->isNoteBook;
    }
    public function setIsNoteBook($isNoteBook) {
        return $this->isNoteBook = $isNoteBook;
    }

    public function getHardDiskMemory() {
        return $this->hardDiskMemory;
    }
    public function setHardDiskMemory($hardDiskMemory) {
        return $this->hardDiskMemory = $hardDiskMemory;
    }

    public function getFreeMemory() {
        return $this->freeMemory;
    }
    public function setFreeMemory($freeMemory) {
        return $this->freeMemory = $freeMemory;
    }

    public function getOperationSystem() {
        return $this->operationSystem;
    }
    public function setOperationSystem($operationSystem) {
        return $this->operationSystem = $operationSystem;
    }

    public function changeOperationSystem($newOperationSystem) {
        if ($newOperationSystem == $this->operationSystem) {
            echo 'The operation system was already a'.' '.$this->operationSystem;
        } else {
            echo 'The operation system is changed to'.' '.$this->setOperationSystem($newOperationSystem);
        }
    }

    public function useMemory($memory) {
        if ($memory > $this->freeMemory) {
            echo 'There is not enough disk space!';
        } else {
            echo 'You have'.' '.$this->setFreeMemory($this->freeMemory-$memory).' '.'memory left!';
        }
    }
}




$computer1 = new Computer('1991', 'alot money', false, 5000, 2000, 'Mac');

echo $computer1->changeOperationSystem('Linux').PHP_EOL;

echo $computer1->useMemory(2000).PHP_EOL;


