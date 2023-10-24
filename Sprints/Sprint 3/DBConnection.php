<!--******************************************
* @author      Noah Jackson
* @course      Software Engineering
* @assignment  Four Year Plan Project
* @related     index.php
**********************************************
Description: Code for connecting to oracle database -->

<?php
    // Oracle database connection parameters
    $dbUser = 'jnzfyp';
    $dbPass = 'password';
    $dbService = 'orclpdb'; // This is the Oracle SID or Service Name
    $dbHost = 'bucsoracle.betheluniversity.edu'; // Change this to your Oracle database host if it's not on the same server

    // Establish a connection to the Oracle database
    $conn = oci_connect($dbUser, $dbPass, "$dbHost/$dbService");

    // Prints an error message when an Oracle connection is unsucessful
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['Connection Failed'], ENT_QUOTES), E_USER_ERROR);
    }
?>