<!-- 
  Project Title: Student Athlete Calendar
  Course: CSC340
  School: Bethel University
  Author: Erik Malek Merkoomyans
  Date: 10/9/2023
  
  Description: Logic for saving/submitting Students data from student.php
-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $studentID = $_POST["student_id"];
    $studentName = $_POST["student_name"];
    $classNames = $_POST["class_name"];
    $examDates = $_POST["exam_date"];
    
    // Delete the existing CSV file (if any)
    unlink("coaches.csv");
    
    // Open or create a CSV file in append mode
    $file = fopen("students.csv", "a");

    // Loop through game descriptions and dates to write data to the CSV file
    for ($i = 0; $i < count($classNames); $i++) {
        $className = $classNames[$i];
        $examDate = $examDates[$i];
        fputcsv($file, [$studentID, $studentName, $className, $examDate]);
    }

    // Close the CSV file
    fclose($file);

    echo "Student data saved successfully.";
    echo '<a href="index.php">Back to Landing Page</a>';

}
?>