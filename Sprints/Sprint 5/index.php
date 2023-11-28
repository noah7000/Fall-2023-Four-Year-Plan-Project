
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
    <!-- Page Title -->
<h1>
    <center>Advising page</center>
</h1>
<!-- Section for displaying courses taken -->

<?php
require "DataFunctions.php";
$depts = deptCodes();
$codes = courseCodes("");
?>
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
    <!-- Sample course data row for left column -->
    <tr>
        <td id="DeptCell">
            <form id="deptForm" action="index.php" method="get">
                <label for="department"></label>
                <select id="deptDD" name="deptDD" onchange="updateCodes()">
                    <?php
                    // Loop through the class names and generate dropdown options
                    foreach ($depts as $dept) {
                        echo "<option value=\"$dept\">$dept</option>";
                    }
                    ?>
                </select>
            </form>
        </td>
                        
        <script type="text/javascript">
            function newRow() {
                var table = document.getElementById("semester");
                var deptCell = document.getElementById("DeptCell");
                var codeCell = document.getElementById("CodeCell");
                var nameCell = document.getElementById("NameCell");
                var credCell = document.getElementById("CredCell");
                var row = table.insertRow(-1);
                var Cell1 = row.insertCell(0);
                var Cell2 = row.insertCell(1);
                var Cell3 = row.insertCell(2);
                var Cell4 = row.insertCell(3);
                Cell1.innerHTML = deptCell.innerHTML;
                Cell2.innerHTML = codeCell.innerHTML;
                Cell3.innerHTML = nameCell.innerHTML;
                Cell4.innerHTML = credCell.innerHTML;
            }
        </script>

        <td id="CodeCell">
            <form action="index.php" method="get">
                <label for="dropdown"></label>
                <select id="codeDD" name="codeDD" onclick="outputCourseName()">
                </select>
            </form>
        </td>
        <script>
            function updateCodes() {
                //Get selected option from department dropdown
                var selectedDept = document.getElementById('deptDD').value;
                    
                //Get course code dropdown
                var codeDropdown = document.getElementById('codeDD');

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

            function outputCourseName() {
                //Get selected option from department dropdown
                var selectedDept = document.getElementById('deptDD').value;
                    
                //Get selected option from course code dropdown
                var selectedCode = document.getElementById('codeDD').value;

                //Get Course Name table row
                var nameLabel = document.getElementById('nameLabel')

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

        <td id="NameCell">
            <label id="nameLabel">None</label>
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

</html>

<!DOCTYPE html>
<html>

<head>
    <!-- The script is written in JavaScript -->
    <script>
        var counter = 2023; // Initialize the counter variable
        function duplicateTable() {
            // Increment the counter
            counter++;
            var resultElement = document.querySelector('.result');
            resultElement.textContent = counter; // Update the result display
            // Get the table container
            var originalTable = document.getElementById("mainTable");
            // Get the table to duplicate
            var clonedTable = originalTable.cloneNode(true);
            // Clone the table
            var container = document.getElementById("tableContainer");
            // Append the cloned table to the container
            container.appendChild(clonedTable);
        }
        // var counter = 0; // Initialize the counter variable
        //function incrementCounter() {
        //  counter++; // Increment the counter
        //var resultElement = document.querySelector('.result');
        // resultElement.textContent = counter; // Update the result display
        // }
    </script>
    <style>
        table,
        th,
        td {
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

        .table {
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

        .table td,
        .table th {
            border: .1px solid #000;
            padding: 8px;
            font-family: sans-serif;
        }

        button {
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
            <span class='result' style="font-family: sans-serif" ;>2023</span>
        </h2>
        <table>
            <table class="table" style="float: left;">

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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
                            <label for="department"></label>
                            <select id="department" name="department">
                                <option value=""></option>

                            </select>
                    </td>
                    <td>
                        <label for="code"></label>
                        <select id="code" name="code">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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

            </table>


            <table class="table" style="margin: 10 auto;">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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

            </table>


            <table class="table" style="float: right;">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
                    <td>
                        <form oninput="outputResult.value = course1.value">
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
            </table>
        </table>
    </div>

    <div id="tableContainer">
        <!-- Duplicated tables will be added here -->
    </div>

    <!-- Add year button to add a new year row -->
    <button onclick="duplicateTable()">Add Year</button>

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