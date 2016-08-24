<?php


require_once ('autoload.php');

class Call
{

    private $priceForAMinute;
    private $caller;
    private $receiver;
    private $duration;



    public function __construct($caller, $receiver, $duration)
    {

        $this->caller = $caller;
        $this->receiver = $receiver;
        $this->duration = $duration;

    }


    public function setPriceForAMinute($setPriceForAMinute)
    {
        return $this->priceForAMinute = $setPriceForAMinute;

    }

    public function getPriceForAMinute(){
        return $this->priceForAMinute;
    }

    public function setCaller($caller) {
        return $this->caller = $caller;
    }

    public function getCaller(){
        return $this->caller;
    }

    public function setReceiver($receiver) {
        return $this->receiver = $receiver;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function setDuration($duration) {
        if ($duration < 0 || $duration > 120) {
            echo 'seconds must be between 0 and 120!';
        } else {
            $this->duration = $duration;
        }
    }

    public function getDuration() {
        return $this->duration;
    }
}