<!--
    Project Title: Four Year Plan
    Course: CSC340
    School: Bethel University
    Author: Zachary Caldwell
    Date: 10/23/23
    Description: Defines a semester object
-->

<?php
    require "Course.php";
    //isComplete is probably not needed.
    //Need to remove it and related methods later
    Class Semester {
        //Will re-evaluate the privacy of each field variable later
        private $isValid;
        private $isComplete;
        public $semType;
        public $courses;
        public function __construct($season){
            $this->semType = $season;
            $this->courses = [];
            $this->isComplete = false;
            $this->isValid = false;

        }
        //Accessors
        public function getValidity(){
            return $this->isValid;
        }
        public function getIsComplete(){
            return $this->isComplete;
        }
        public function getSemType(){
            return $this->semType;
        }
        public function getCourse($index){
            return $this->courses[$index];
        }
        //Mutators
        public function addCourse($newCourse){
            array_push($this->courses, $newCourse);
        }
        public function setValidity($validity){
            $this->isValid = $validity;
        }
        public function setComplete($complete){
            $this->isComplete = $complete;
        }
        //Additional Methods
        public function toString(){
            $semString = "";
            $i=0;
            //Need to implement a toString() method in course
            while($i<count($this->courses)){
                $semString.=$this->courses[$i]->toString();
                $i++;
            }
            return $semString;

        }
        //Need to check validity by verifying each course in this semester is offered in this semester
    }
?>