<!--**********************************************
  * @author      Noah Jackson
  * @course      Software Engineering
  * @assignment  Four Year Plan Project
  * @related     index.php, Year.php
**********************************************-->
<?php
    require "Year.php";

    //Class that creates a 4 year plan object that will store a student plan
    Class FourYearPlan { 
        private $years;
        private $studentId;
        private $isComplete;
        private $isValid;
        
        /*Creates a new 4 year plan given the Student ID, and intial year and Sem
          There is a startYear and startSem since a student could be starting
          during any year or semester */
        public function __construct($studentId) 
        {
            $this->years = [];
            $this->studentId = $studentId;
            $this->isComplete = false;
            $this->isValid = false;
        }
        
        //****************** Accessors ***********************

        public function getYear($index) {
            return $this->years[$index];
        }
    
        public function getStudentId() {
            return $this->studentId;
        }

        public function getIsComplete() {
            return $this->isComplete;
        }

        public function getIsValid() {
            return $this->isValid;
        }

        //****************** Mutaters ***********************

        /* adds a new year to the $years array given the starting semester*/
        public function addYear($newYear) {
            try {
                array_push($this->years, $newYear);
            } catch (TypeError $e) {
                $this->years[0] = $newYear;
            }
        }
    
        public function setStudentId($studentId) {
            $this->studentId = $studentId;
        }
    
        public function setIsComplete($isComplete) {
            $this->isComplete = $isComplete;
        }
    
        public function setIsValid($isValid) {
            $this->isValid = $isValid;
        }
    
        //****************** Helpers ***********************

        public function toString() {
            $planString = "";
            for($i=0; $i<count($this->years); $i++) {
                $planString .= $this->years[$i]->toString();
            }
            return $planString;
        }
    }
?>
