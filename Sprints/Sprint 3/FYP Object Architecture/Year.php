<!--**********************************************
* @author      Noah Jackson
* @course      Software Engineering
* @assignment  Four Year Plan Project
* @related     FourYearPlan.php, Semester.php
**********************************************-->
<?php
    require "Semester.php";

    Class Year {
        private $semesters;
        private $year;

        function __construct($year) {
            $this->year = $year;
            $this->semesters = [];
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
            try {
                array_push($this->semesters, $newSem);
            } catch (TypeError $e) {
                $this->semesters[0] = $newSem;
            } 
        }
        
        public function setYear($year) {
            $this->year = $year;
        }

        //****************** Helpers ***********************
        
        public function toString() {
            $yearString = "";
            for($i=0; $i<count($this->semesters); $i++) {
                $yearString .= $this->semesters[$i]->toString();
            }
            return $yearString;
        } 
    }
?>
