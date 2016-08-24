<?php

require_once ('autoload.php');


$gsm1 = new GSM('nokia');
$gsm1->insertSimCard('0885852345');

$gsm2 = new GSM('lenovo');
$gsm2->insertSimCard('0888123456');


$gsm1->call($gsm2, 50);

var_dump($gsm1->getModel());
var_dump($gsm2->getInfo());

