
<?php
/*
    require "DBConnection.php";

    // SQL query to retrieve data
    $sql = "SELECT * FROM STUD";
    // Prepare and execute the SQL statement
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);
    // Fetch and display results
    while ($row = oci_fetch_assoc($stmt)) {
        print_r($row["ID"]); //You can format and display the data as needed
        echo("    ");
        print_r($row["EMAIL"]);
        echo("    ");
        print_r($row["GRADUATE_DATE"]);
        echo("    ");
        print_r($row["NAME"]);
        echo("<br><br>");
    }
    // Close the database connection
    oci_free_statement($stmt);
    oci_close($conn);
    */
?>

<!--<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
        .main {
            margin-left: auto;
            margin-right: auto;
        }
        .table-container {
            display: flex;
            justify-content: space-between;
        }
        .table {
            border: 1px solid #000;
            border-collapse: collapse;
            margin:  10px auto;
        }
        .table td, .table th {
            border: 2px solid #000;
            padding: 8px;
        }
        /* Define the size of the dropdown */
        
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zach">
    <title>Document</title>
</head>
<body>
    Page Title 
<h1>
    <center>Advising page</center>
</h1>

<table id="semester" class="table" style="margin: 10 auto;">
    <tr>
        <th colspan="4">Fall 2024</th>
    </tr>
    <tr>
        <th>Depart</th>
        <th>Code</th>
        <th>Name</th>
        <th>Credits</th>
    </tr>
    
    <tr>
        <td id="DeptCell">
            <form id="deptForm" action="index.php" method="get">
                <label for="department"></label>
                <select id="deptDD" name="deptDD" onchange="updateCodes('deptDD','codeDD')">
                    <?php
                    // Loop through the class names and generate dropdown options
                    /*foreach ($depts as $dept) {
                        echo "<option value=\"$dept\">$dept</option>";
                    }*/
                    ?>
                </select>
            </form>
        </td>
                
        <td id="CodeCell">
            <form action="index.php" method="get">
                <label for="dropdown"></label>
                <select id="codeDD" name="codeDD" onclick="outputCourseName('deptDD','codeDD','nameLabel1')">
                </select>
            </form>
        </td>
        <td id="NameCell">
            <label id="nameLabel1">None</label>
        </td>

        <td id="CredCell">
            <select id="firstDropdown" onchange="updateTableRow()">
                <option value="option0">0</option>
                <option value="option1">1</option>
                <option value="option2">2</option>
                <option value="option3">3</option>
                <option value="option4">4</option>
            </select>
        </td>
    </tr>

    <tr>
        <td id="DeptCell">
            <form id="deptForm" action="index.php" method="get">
                <label for="department2"></label>
                <select id="deptDD2" name="deptDD2" onchange="updateCodes('deptDD2','codeDD2')">
                    <?php
                    // Loop through the class names and generate dropdown options
                    /*foreach ($depts as $dept) {
                        echo "<option value=\"$dept\">$dept</option>";
                    }*/
                    ?>
                </select>
            </form>
        </td>
                
        <td id="CodeCell">
            <form action="index.php" method="get">
                <label for="dropdown"></label>
                <select id="codeDD2" name="codeDD2" onclick="outputCourseName('deptDD2','codeDD2','nameLabel2')">
                </select>
            </form>
        </td>
        <td id="NameCell">
            <label id="nameLabel2">None</label>
        </td>

        <td id="CredCell">
            <select id="firstDropdown" onchange="updateTableRow()">
                <option value="option0">0</option>
                <option value="option1">1</option>
                <option value="option2">2</option>
                <option value="option3">3</option>
                <option value="option4">4</option>
            </select>
        </td>
    </tr>
</table>
<button id="nextButton" type="button" onclick='newRow();'>Next</button>

</div>
</body>

</html>-->







<!DOCTYPE html>
<html>
<?php
    require "DataFunctions.php";
    $depts = deptCodes();
    $codes = courseCodes("");
?>
<script type="text/javascript"> // Javascript functions
            function newRow(tableId, deptId, codeId, nameId, credId) {
                var table = document.getElementById(tableId);
                var deptCell = document.getElementById(deptId);
                var codeCell = document.getElementById(codeId);
                var nameCell = document.getElementById(nameId);
                var credCell = document.getElementById(credId);
                var row = table.insertRow(table.rows.length - 1);
                var Cell1 = row.insertCell(0);
                var Cell2 = row.insertCell(1);
                var Cell3 = row.insertCell(2);
                var Cell4 = row.insertCell(3);
                Cell1.innerHTML = deptCell.innerHTML;
                Cell2.innerHTML = codeCell.innerHTML;
                Cell3.innerHTML = nameCell.innerHTML;
                Cell4.innerHTML = credCell.innerHTML;
            }

            function updateCodes(deptId, codeId) {
                //Get selected option from department dropdown
                var selectedDept = document.getElementById(deptId).value;
                    
                //Get course code dropdown
                var codeDropdown = document.getElementById(codeId);

                // Clear existing options
                codeDropdown.innerHTML = '';

                if (selectedDept === "CSC") {
                    addOption(codeDropdown, "");
                    addOption(codeDropdown, "121");
                    addOption(codeDropdown, "210");
                    addOption(codeDropdown, "221");
                }
                if (selectedDept === "MATH") {
                    addOption(codeDropdown, "");
                    addOption(codeDropdown, "111");
                    addOption(codeDropdown, "132");
                    addOption(codeDropdown, "361");
                }
                if (selectedDept === "PHIL") {
                    addOption(codeDropdown, "");
                    addOption(codeDropdown, "250");
                    addOption(codeDropdown, "341");
                    addOption(codeDropdown, "452");
                }
            }

            function addOption(selectElement, optionText) {
                var option = document.createElement("option");
                option.text = optionText;
                selectElement.add(option);
            }

            function outputCourseName(deptId, codeId, nameId) {
                //Get selected option from department dropdown
                var selectedDept = document.getElementById(deptId).value;
                    
                //Get selected option from course code dropdown
                var selectedCode = document.getElementById(codeId).value;

                //Get Course Name table row
                var nameLabel = document.getElementById(nameId)

                nameLabel.textContent = "";

                if (selectedDept === "CSC") {
                    if (selectedCode === "121") addLabel(nameLabel, "Programming 1: Control Structure");
                    if (selectedCode === "210") addLabel(nameLabel, "DataBase");
                    if (selectedCode === "221") addLabel(nameLabel, "Programming 2");
                }
                if (selectedDept === "MATH") {
                    if (selectedCode === "111") addLabel(nameLabel, "Probability and Statistics");
                    if (selectedCode === "132") addLabel(nameLabel, "Calculus II");
                    if (selectedCode === "361") addLabel(nameLabel, "Real Analysis");
                }
                if (selectedDept === "PHIL") {
                    if (selectedCode === "250") addLabel(nameLabel, "Intro to Philosophy");
                    if (selectedCode === "341") addLabel(nameLabel, "Metaphysics");
                    if (selectedCode === "452") addLabel(nameLabel, "Senior Experience");
                }
            }

            function addLabel(labelElement, labelText) {
                labelElement.textContent = labelText;
            }
        </script>
<head>
    <!-- The script is written in JavaScript -->
    <script>
        var counter = 2023; // Initialize the counter variable
        
        function duplicateTable() {
            // Get the table container
            var originalTable = document.getElementById("mainTable");
            // Get the table to duplicate
            var clonedTable = originalTable.cloneNode(true);
            // Clone the table
            var container = document.getElementById("tableContainer");

            // Increment the counter
            counter++;
            var resultElement = clonedTable.querySelector('.result');
            // Update the result display
            resultElement.textContent = counter; 
            // Append the cloned table to the container
            container.appendChild(clonedTable);
        }
        
        /*function addNewRow() {
            var table = document.querySelector('.table1');
            var newRow = table.insertRow(table.rows.length - 1);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = '<select name="department"><option value=""></option></select>';
            cell2.innerHTML = '<select name="code"><option value=""></option></select>';
            cell3.innerHTML = '';
            cell4.innerHTML = '';
        }*/
        
        

    </script>
    
    <style>
        table, th, td {
            border: .1px solid black;
            border-collapse: collapse;
        }

        .main {
            margin-top: 20px;
            margin-left: 110px;
            background-color: rgb(251, 251, 251);
            font-family: sans-serif;
            border-radius: 8px;
            /* Add rounded corners to the table */
            overflow: hidden;
        }

        .table-container {
            display: flex;
            justify-content: space-between;
        }

        .table1, .table2, .table3 {
            border: .1px solid #000;
            border-collapse: collapse;
            margin: 10px auto;
            background-color: rgb(251, 251, 251);
            border-radius: 8px;
            /* Add rounded corners to the table */
            overflow: hidden;
            width: 25%;
            /* Increase the table's width */
            height: 300px;
        }

        .table1 td,
        .table1 th,
        .table2 td,
        .table2 th,
        .table3 td,
        .table3 th {
            border: .1px solid #000;
            padding: 8px;
            font-family: sans-serif;
        }

        .addyear {
            margin-top: 10px;
            margin-left: 110px;
            background: #0b62af;
            color: white;
            border-radius: 5px;
            /* Add rounded corners to the table */
            overflow: hidden;
            width: 80px;
            height: 25px;
        }
        .title-box {
            background-color: #004a8a;
            /* Set the background color */
            color: white;
            /* Set the text color */
            padding: 5px;
            /* Add some padding for better aesthetics */
            font-size: 18px;
            /* Set the font size */
            font-family: sans-serif;
        }
        th {
            color: #004a8a;
        }

    </style>

    <title>Document</title>
</head>

<body>
    <div class="title-box">
        <!-- Page Title -->
        <h1>
            <center>Advising Page</center>
        </h1>
        <!-- Section for displaying courses taken -->
    </div>

    <div class="table-container" id="mainTable">
        <h2>
            <span class='result' style="font-family: sans-serif;" >2023</span>
        </h2>
        <table class="table4">
            <table class="table1" id="fall1" style="float: left;">

                <tr>
                    <th colspan="4" Style="color: black">Fall</th>
                </tr>
                <tr>
                    <th>Depart</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Credits</th>
                </tr>
                <!-- Sample course data row for left column -->

                <tr>
                    <td id="DeptCell1">
                        <form id="deptForm" action="index.php" method="get">
                            <label for="department"></label>
                            <select id="deptDD1" onchange="updateCodes('deptDD1','codeDD1')">
                                <?php
                                // Loop through the class names and generate dropdown options
                                foreach ($depts as $dept) {
                                    echo "<option value=\"$dept\">$dept</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </td>
                            
                    <td id="CodeCell1">
                        <form action="index.php" method="get">
                            <label for="dropdown"></label>
                            <select id="codeDD1" onclick="outputCourseName('deptDD1','codeDD1','nameLabel1')">
                            </select>
                        </form>
                    </td>
                    <td id="NameCell1">
                        <label id="nameLabel1">None</label>
                    </td>

                    <td id="CredCell1">
                        <select id="CreditDropdown">
                            <option value="option0">0</option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="DeptCell1">
                        <form id="deptForm" action="index.php" method="get">
                            <label for="department"></label>
                            <select id="deptDD2" onchange="updateCodes('deptDD2','codeDD2')">
                                <?php
                                // Loop through the class names and generate dropdown options
                                foreach ($depts as $dept) {
                                    echo "<option value=\"$dept\">$dept</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </td>
                            
                    <td id="CodeCell1">
                        <form action="index.php" method="get">
                            <label for="dropdown"></label>
                            <select id="codeDD2" onclick="outputCourseName('deptDD2','codeDD2','nameLabel2')">
                            </select>
                        </form>
                    </td>
                    <td id="NameCell">
                        <label id="nameLabel2">None</label>
                    </td>

                    <td id="CredCell1">
                        <select id="CreditDropdown">
                            <option value="option0">0</option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td id="DeptCell1">
                        <form id="deptForm" action="index.php" method="get">
                            <label for="department"></label>
                            <select id="deptDD3" onchange="updateCodes('deptDD3','codeDD3')">
                                <?php
                                // Loop through the class names and generate dropdown options
                                foreach ($depts as $dept) {
                                    echo "<option value=\"$dept\">$dept</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </td>
                            
                    <td id="CodeCell1">
                        <form action="index.php" method="get">
                            <label for="dropdown"></label>
                            <select id="codeDD3" onclick="outputCourseName('deptDD3','codeDD3','nameLabel3')">
                            </select>
                        </form>
                    </td>
                    <td id="NameCell">
                        <label id="nameLabel3">None</label>
                    </td>

                    <td id="CredCell1">
                        <select id="CreditDropdown">
                            <option value="option0">0</option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="DeptCell1">
                        <form id="deptForm" action="index.php" method="get">
                            <label for="department"></label>
                            <select id="deptDD4" onchange="updateCodes('deptDD4','codeDD4')">
                                <?php
                                // Loop through the class names and generate dropdown options
                                foreach ($depts as $dept) {
                                    echo "<option value=\"$dept\">$dept</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </td>
                            
                    <td id="CodeCell1">
                        <form action="index.php" method="get">
                            <label for="dropdown"></label>
                            <select id="codeDD4" onclick="outputCourseName('deptDD4','codeDD4','nameLabel4')">
                            </select>
                        </form>
                    </td>
                    <td id="NameCell">
                        <label id="nameLabel4">None</label>
                    </td>

                    <td id="CredCell1">
                        <select id="CreditDropdown">
                            <option value="option0">0</option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td id="DeptCell1">
                        <form id="deptForm" action="index.php" method="get">
                            <label for="department"></label>
                            <select id="deptDD5" onchange="updateCodes('deptDD5','codeDD5')">
                                <?php
                                // Loop through the class names and generate dropdown options
                                foreach ($depts as $dept) {
                                    echo "<option value=\"$dept\">$dept</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </td>
                            
                    <td id="CodeCell1">
                        <form action="index.php" method="get">
                            <label for="dropdown"></label>
                            <select id="codeDD5" onclick="outputCourseName('deptDD5','codeDD5','nameLabel5')">
                            </select>
                        </form>
                    </td>
                    <td id="NameCell">
                        <label id="nameLabel5">None</label>
                    </td>

                    <td id="CredCell1">
                        <select id="CreditDropdown">
                            <option value="option0">0</option>
                            <option value="option1">1</option>
                            <option value="option2">2</option>
                            <option value="option3">3</option>
                            <option value="option4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="4" Style="color: black">
                        <button id="nextButton" type="button" onclick="newRow('fall1','DeptCell1','CodeCell1','NameCell1','CredCell1')">New Row</button>
                    </th>
                </tr>

            </table>


            <table class="table2" id="spring1" style="margin: 10 auto;">
                <tr>
                    <th colspan="4" Style="color: black">Spring</th>
                </tr>
                <tr>
                    <th>Depart</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Credits</th>
                </tr>
                <!-- Sample course data row for left column -->

                <tr>

                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>

                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>

                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>

                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>

                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>

                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>

                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>

                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>

                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <th colspan="4" Style="color: black">
                        <button id="nextButton" type="button" onclick="newRow('spring1','DeptCell2','CodeCell2','NameCell2','CredCell2')">New Row</button>
                    </th>
                </tr>
                


            </table>


            <table class="table3" style="float: right;">
                <tr>
                    <th colspan="4" Style="color: black">Winter/Summer</th>
                </tr>
                <tr>
                    <th>Depart</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Credits</th>
                </tr>
                <!-- Sample course data row for left column -->

                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <form oninput="outputResult.value = course1.value">
                        <td>
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <label for="code"></label>
                            <select id="code" name="code">
                                <option value=""></option>
                            </select>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </form>
                </tr>
                <tr>
                    <th colspan="4" Style="color: black">
                        <button id="nextButton" type="button" onclick="addNewRow()">New Row</button>
                    </th>
                </tr>

            </table>
        </table>
    </div>

    <div id="tableContainer">
        <!-- Duplicated tables will be added here -->
    </div>

    <!-- Add year button to add a new year row -->
    <button class="addyear" onclick="duplicateTable()">Add Year</button>

    <!-- Table for displaying course information -->
    <table class="main" width=30%>
        <!-- Table header row -->
        <tr>
            <th colspan="4" Style="color: black">Courses taken</th>
        </tr>
        <tr>
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Credits</th>
        </tr>
        <!-- Sample course data row -->
        <tr>
            <td>CSC150</td>
            <td>Seminar</td>
            <td>0.5</td>
        </tr>
        <tr>
            <td>CSC150</td>
            <td>Seminar</td>
            <td>0.5</td>
        </tr>
    </table>

</body>

</html>