<?php

require_once ('autoload.php');

$employee = new Employee('Kolev');
$task = new Task('Homework', '8');

$employee->setCurrentTask($task);

$employee->setHoursLeft(20);

$employee->work();

$employee->showReport();