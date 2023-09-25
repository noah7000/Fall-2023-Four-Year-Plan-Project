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

    // SQL query to retrieve data
    $sql = "SELECT * FROM STUDENT";

    // Prepare and execute the SQL statement
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    // Fetch and display results
    while ($row = oci_fetch_assoc($stmt)) {
        print_r($row); // You can format and display the data as needed
    }

    // Close the database connection
    oci_free_statement($stmt);
    oci_close($conn);
?>
