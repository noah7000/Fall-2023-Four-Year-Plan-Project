<!--**********************************************
  * @author      Noah Jackson
  * @course      Software Engineering
  * @assignment  Four Year Plan Project
  * @related     FourYearPlan, Year, Semester, Course
**********************************************-->
<?php
    require "FourYearPlan.php"; "Year.php"; "Semester.php"; "Course.php";

    //Instantiate test courses
    $programming = new Course("Programming 1", "CSC", 101, "C.Bariess", 3);
    $math = new Course("Discrete Math", "MATH", 210, "J.Smith", 3);
    $english = new Course("Written Comp 3", "LANG", 232, "J.Jill", 2);
    $biology = new Course("Biology 2", "BIO", 321, "K.Kruze", 3);

    //Instantiate test semester
    $fall = new Semester(0);
    
    //Instantiate test year
    $year = new Year(2023);

    //Instantiate test plan
    $plan = new FourYearPlan(909350);

    //add courses to semester
    $fall->addCourse($programming);
    $fall->addCourse($math);
    $fall->addCourse($english);
    $fall->addCourse($biology);

    //add semester to year
    $year->addSemester($fall);

    //add year to plan
    $plan->addYear($year);

    //display test plan
    echo $plan->toString();
?>