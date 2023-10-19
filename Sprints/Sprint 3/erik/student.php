<!-- 
  Project Title: Student Athlete Calendar
  Course: CSC340
  School: Bethel University
  Author: Erik Malek Merkoomyans
  Date: 10/9/2023
  
  Description: Students Page for submitting Exam details
-->

<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
</head>
<body>
    


    <h1>Student Input</h1>
    <!-- Form to collect and send student data to "save_student_data.php" using POST method -->
    <form action="save_student_data.php" method="post">
        
        <!-- Label for the Student ID input field -->
        <label for="student_id">Student ID:</label>
        <!-- Input field for entering Student ID -->
        <input type="text" id="student_id" name="student_id" onblur="fetchStudentName()">
       
        <br>
        <label for="student_name">Student Name:</label>
        <!-- Input field for displaying Student Name, set as readonly -->
        <input type="text" id="student_name" name="student_name" readonly>
        <br>
    
        
        <?php
        // Define an array of class names (to be fetched from a database in a real scenario)
        $classNames = ["CSC120", "CSC220", "CSC340", "ENGL101", "COMM232"];
        ?>

        <h2>Add Exams:</h2>
        <!-- Container for dynamically adding exam inputs -->
        <div id="exams">
            <div class="exam">
                <label for="class_name[]">Class Name:</label>
                <!-- Dropdown for selecting class names, required field -->
                <select name="class_name[]" required>
                    <?php
                        // Loop through the class names and generate dropdown options
                        foreach ($classNames as $className) {
                            echo "<option value=\"$className\">$className</option>";
                        }
                    ?>
                </select>

                <label for="exam_date[]">Exam Date:</label>
                <input type="date" name="exam_date[]" required>
            </div>
        </div>
        <!-- Button to dynamically add new exam input fields -->
        <button type="button" id="add_exam">Add Exam</button><br><br>
        <!-- Submit button to submit the form data -->
        <input type="submit" value="Submit">
    </form>

    <!-- JavaScript function to fetch and autofill student name based on ID -->
    <script>
    function fetchStudentName() {
        var studentID = document.getElementById("student_id").value;
        if (studentID) {
            // Dummy student name, to be replaced with real data from a database 
            var dummyStudentName = "John Smith";
            document.getElementById("student_name").value = dummyStudentName;
        } else {
            document.getElementById("student_name").value = ""; // Clears the field if student_id is empty
        }
    }
    </script>

    <!-- JavaScript code to dynamically add new exam input fields -->
    <script>
        document.getElementById("add_exam").addEventListener("click", function () {
            const examsContainer = document.getElementById("exams");
            const newExam = document.createElement("div");
            newExam.innerHTML = `
                
                <label for="class_name[]">Class Name:</label>
                <select name="class_name[]" required>
                    <?php
                        // Loop through the class names and generate dropdown options
                        foreach ($classNames as $className) {
                            echo "<option value=\"$className\">$className</option>";
                        }
                    ?>
                </select>

                <label for="exam_date[]">Exam Date:</label>
                <input type="date" name="exam_date[]" required>
            `;
            examsContainer.appendChild(newExam); // Add new exam input fields to the exams container
        });
    </script>


</body>
</html>
