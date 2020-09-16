<?php

class Rectangle {
    // Member variables
    public $people;
    public $destinationId;
    public $tooManyPeopleAlarm;

    // Member functions
    // Constructor
    function __construct(int $mydestinationId) {
        $this->destinationId = $mydestinationId;
        $this->people = 0;
    }

    // Triggers an alarm event
    public function alarm() {
        $tooManyPeopleAlarm = true;
    }

    // Adds people to a rectangle
    public function addPerson() {
        $this->people += 1;
        if ($this->people > 1) {
            $this->alarm();
        }
    }
}

class Cleaner extends Rectangle {
    // Member variables 
    public $type;
    public $noSanitizerUsed = false;
    public $noLysolUsed = false;
    
    // Member functions
    function __construct(int $mydestinationId, $mytype) {
        $this->destinationId = $mydestinationId;
        $this->type = $mytype;
    }

    // Triggers an alarm event
    public function alarm() {
        if ($this->type == "desk") {
            $noLysolUsed = true;
        }
        elseif ($this->type == "entrance") {
            $noSanitizerUsed = true;
        }
    }

    // The person enters the rectangle and does not use the cleaner
    public function enterNoUse() {
        $this->alarm();
    }

    // The person leaves
    // Function checks if the user uses lysol before they go
    public function leaveNoUse() {
        $this->alarm();
    }
}

?>