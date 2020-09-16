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

    // Returns the Classroom classroomId
    public function getclassroomId() {
        return $this->classroomId;
    }

    // Adds a Rectangle to the Classroom
    public function addRectangle($rectangle) {
        array_push($this->rectangles, $rectangle);
    }

    // Adds a Person to the Classroom
    public function addPerson($person) {
        array_push($this->occupants, $person);
    }

    // Returns the Classroom's rectangles
    public function getRectangles() {
        return $this->rectangles;
    }

    // Returns the Classroom's occupants
    public function getOccupants() {
        return $this->occupants;
    }
}

?>