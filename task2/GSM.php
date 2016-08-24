<?php

require_once ('autoload.php');

class GSM
{

    private $model;
    private $hasSimCard = false;
    private $simMobileNumber;
    private $outgoingCallsDuration;
    private $lastIncomingCall;
    private $lastOutgoingCall;


    public function __construct($model)
    {
        $this->model = $model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setHasSimCard($hasSimCard)
    {
        $this->hasSimCard = $hasSimCard;
    }

    public function getHasSimCard()
    {
        return $this->hasSimCard;
    }

    public function setSimMobileNumber($simMobileNumber)
    {
        $this->simMobileNumber = $simMobileNumber;
    }

    public function getSimMobileNumber()
    {
        return $this->simMobileNumber;
    }

    public function setOutgoingCallsDuration($outgoingCallsDuration)
    {
        $this->outgoingCallsDuration = $outgoingCallsDuration;
    }

    public function getOutgoingCallsDuration()
    {
        return $this->outgoingCallsDuration;
    }

    public function setLastIncomingCall($lastIncomingCall)
    {
        $this->lastIncomingCall = $lastIncomingCall;
    }

    public function getLastIncomingCall()
    {
        return $this->lastIncomingCall;
    }

    public function setLastOutgoingCall($lastOutgoingCall)
    {
        $this->lastOutgoingCall = $lastOutgoingCall;
    }

    public function getLastOutgoingCall()
    {
        return $this->lastOutgoingCall;
    }


    public function insertSimCard($simMobileNumber)
    {

        if (preg_match('/08[789]\d{7}/', $simMobileNumber)) {
            $this->setSimMobileNumber($simMobileNumber);
            $this->setHasSimCard(true);
        }
    }


    public function removeSimCard()
    {
        $this->setHasSimCard(false);
    }

    public function getInfo()
    {
        $flag = $this->getHasSimCard() ? "yes" : "no";
        echo ' '.'Does' . $this->getModel() . ' ' . 'have SIM card:' . ' ' . $flag.' ';
        echo $this->getModel() . "'s mobile number is:" . ' ' . $this->getSimMobileNumber();
        if ($this->getLastIncomingCall()) {
            echo ' '.$this->getModel() . "'s last incoming call's duration is:" . ' ' . $this->getLastIncomingCall() . ' ' . 'minutes';
        }
    }


    public function call(GSM $receiver, $duration)
    {
        var_dump($this->getModel());

        if ($this->getHasSimCard() == true && $receiver->getHasSimCard() == true) {
            if ($this->getSimMobileNumber() == $receiver->getSimMobileNumber()) {
                echo 'Same numbers';
                return false;
            }

        }

        $call = new Call($this, $receiver, $duration);
        $this->setLastOutgoingCall($duration);
        $receiver->setLastIncomingCall($duration);
        $this->setOutgoingCallsDuration($this->getOutgoingCallsDuration() + $this->getLastOutgoingCall());



        echo 'The receiver of'.' '. $this->getModel() . "'s last outgoing call is:" . ' ' . $receiver->getSimMobileNumber().' ';
        $this->getInfo();

        echo $this->getModel() . "'s last outgoing call's duration is:" . ' ' . $this->getLastOutgoingCall() . 'minutes';
        echo $this->getModel() . "'s sum for all outgoing calls so far is:" . ' ' . $this->getSumForCall($call) . 'BGN';

    }

        public function getSumForCall(Call $object) {
            return $object->getPriceForAMinute() * $this->getOutgoingCallsDuration();
        }

}






