**********************************************
  * @author      Noah Jackson
  * @course      CSC 321: Programming 3
  * @assignment  Four Year Plan Project
  * @related     FourYearPlan.php, Sem.php
  **********************************************
<?php
    
    //Class that creates a 4 year plan object that will store a student plan
    Class FourYearPlan { 
        public $years;
        public $studentId;
        public $curYear;
        public $isComplete;
        public $isValid;
        
        /*Creates a new 4 year plan given the Student ID, and intial year and Sem
          There is a startYear and startSem since a student could be starting
          during any year or semester */
        public function __construct($studentId, $startYear, $startSem) 
        {
            $this->studentId = $studentId;
            $this->curYear = $startYear;
            $yearOne = new Year($startYear, $startSem);
            $years = array($yearOne);
        }
        
        // Getter method for 'years'
        public function getYears() {
            return $this->years;
        }

        // Setter method for 'years'
        public function setYears($years) {
            $this->years = $years;
        }

        // Getter method for 'studentId'
        public function getStudentId() {
            return $this->studentId;
        }

        // Getter method for 'isComplete'
        public function getIsComplete() {
            return $this->isComplete;
        }

        // Getter method for 'isValid'
        public function getIsValid() {
            return $this->isValid;
        }

        public function addYear() {
            $newYear = new Year();

        }
    }
?>