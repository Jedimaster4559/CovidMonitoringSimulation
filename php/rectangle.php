<?php

class Rectangle {
    // Member variables
    public $people;
    public $destinationId;

    // Member functions
    // Constructor
    function __construct(int $mydestinationId) {
        $this->destinationId = $mydestinationId;
        $this->people = 0;
    }

    // Triggers an alarm event
    public function peopleAlarm() {
        echo "Alarm Event! There are too many people in the area.";
    }

    // Adds people to a rectangle
    public function addPerson($num) {
        $this->people += $num;
        if ($this->people > 1) {
            $this->alarm();
        }
    }

    // Returns the Rectangle name
    public function getNumPeople() {
        return $this->people;
    }
}

class Cleaner extends Rectangle {
    // Member variables 
    public $useCount = 0;
    public $type;
    
    // Member functions
    // Triggers an alarm event
    public function alarm() {
        if ($this->type == "Desk") {
            echo "Alarm Event! Person did not use Lysol.";
        }
        elseif ($this->type == "Entrance") {
            echo "Alarm Event! Person did not use Sanitizer.";
        }
        else {
            echo "Alarm Event! Person did not use Cleaner.";
        }
    }

    public function setType($myType) {
        $this->type = $myType;
    }

    // The person enters the rectangle and uses the cleaner
    public function enterUse() {
        $this->useCleaner();
    }

    // The person enters the rectangle and does not use the cleaner
    public function enterNoUse() {
        $this->alarm();
    }

    // The person uses cleaner
    // The counter is increased
    public function useCleaner() {
        $this->useCount += 1;
    }

    // The person leaves
    // Function checks if the user uses lysol before they go
    public function leave() {
        if ($this->useCount != 2) {
            $this->alarm();
        }
        else {
            $this->useCount = 0;
        }
    }
}

?>