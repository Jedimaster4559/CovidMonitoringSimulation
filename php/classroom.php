<?php

class Classroom {
    // Member variables
    private $rectangles = array();
    private $classroomId;
    
    // Member functions
    // Constructor
    function __construct($myclassroomId) {
        $this->classroomId = $myclassroomId;
    }

    // Returns the Classroom classroomId
    public function getclassroomId() {
        return $this->classroomId;
    }

    // Adds a Rectangle to the Classroom
    public function addRectangle($rectangle) {
        array_push($rectangles, $rectangle);
    }

    // Returns the Classroom's rectangles
    public function getRectangles() {
        return $this->rectangles;
    }
}