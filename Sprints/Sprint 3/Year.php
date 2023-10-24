
  **********************************************
  * @author      Noah Jackson
  * @course      CSC 321: Programming 3
  * @assignment  Four Year Plan Project
  * @related     FourYearPlan.php, Sem.php
  **********************************************
<?php
    Class Year {
        public $semesters;
        public $year;

        function __construct($year, $initSem)
        {
            $this->year = $year;
            $fall = new Sem(0); //0 = fall
            $spring = new Sem(1); // 1 = spring
            $semesters = array($fall,$spring);
        }

        public function getSemesters() {
            return $this->semesters;
        }
    
        public function getYear() {
            return $this->year;
        }
    
        /*Adds a given "semester" to the array of semseters for a year
          that more than two semesters (i.e. summer or winter terms)*/
        public function addSemester($newSem) {
            array_push($this->semesters, $newSem); 
        }
    }
?>