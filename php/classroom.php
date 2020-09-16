<?php

class Classroom {
    // Member variables
    public $rectangles = array();
    public $occupants = array();
    public $classroomId;
    
    // Member functions
    // Constructor
    function __construct(int $myclassroomId) {
        $this->classroomId = $myclassroomId;
    }

    // Adds a Rectangle to the Classroom
    public function addRectangle($rectangle) {
        array_push($this->rectangles, $rectangle);
    }

    // Adds a Person to the Classroom
    public function addPerson($person) {
        array_push($this->occupants, $person);
    }
}

?>