
  **********************************************
  * @author      Noah Jackson
  * @course      CSC 321: Programming 3
  * @assignment  Four Year Plan Project
  * @related     FourYearPlan.php, Semester.php
  **********************************************
<?php
    Class Year {
        private $semesters;
        private $year;

        function __construct($year) {
            $this->year = $year;
            $semesters = array();
        }

        //****************** Accesssors ***********************

        public function getSemester($index) {
            return $this->semesters[$index];
        }

        public function getYear() {
            return $this->year;
        }

        //****************** Mutaters ***********************
    
        //Adds a given semester to the array of semseters for a year
        public function addSemester($newSem) { 
            array_push($this->semesters, $newSem); 
        }
        
        public function setYear($year) {
            $this->year = $year;
        }

        //****************** Helpers ***********************
        
        public function toString() {
            $yearString = "";
            for($i=0; $i<=count($this->semesters); $i++) {
                $yearString .= $this->semesters[$i].toString() + ", ";
            }
            return $yearString;
        } 
    }
?>