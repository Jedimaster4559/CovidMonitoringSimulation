<?php

class Classroom {
    // Member variables
    private $rectangles = array();
    
    // Member functions
    // Adds a Rectangle to the Classroom
    public function addRectangle($rectangle) {
        array_push($rectangles, $rectangle);
    }

    // Returns the Classroom's rectangles
    public function getRectangles() {
        return $this->rectangles;
    }
}