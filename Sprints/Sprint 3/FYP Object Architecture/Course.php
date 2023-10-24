<!--
    Project Title: Four Year Plan
    Course: CSC340
    School: Bethel University
    Author: Zachary Caldwell
    Date: 10/23/23
    Description: Defines a course object
-->

<?php
    class Course {
        private $name;
        private $department;
        private $code;
        private $instructor;
        private $credits;
        public function __construct($name,$department,$code,$instructor,$credits){
            $this->name = $name;
            $this->department = $department;
            $this->code = $code;
            $this->instructor = $instructor;
            $this->credits=$credits;
        }
        //Accessors
        public function getName(){
            return $this->name;
        }
        public function getDepartment(){
            return $this->department;
        }
        public function getCode(){
            return $this->code;
        }
        public function getInstructor(){
            return $this->instructor;
        }
        public function getCredits(){
            return $this->credits;
        }
        //Mutators
        public function setCredits($credits){
            $this->credits = $credits;
        }
        public function changeInstructor($instructor){
            $this->instructor = $instructor;
        }
        //Additional Methods
        public function toString(){
            $courseString = "";
            $courseString .= $this->department . " " . $this->code;
            //each field besides department and code are separated by ": "
            $courseString .= ": " . $this->name;
            $courseString .= ": " . $this->credits . "<br>";
            return $courseString;
        }
    }
?>
