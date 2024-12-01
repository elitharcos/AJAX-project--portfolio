<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sqlDatabaseName = "jquerydb_p0126";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $sqlDatabaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo '<script>console.log("Successful connection!")</script>';
  
    //id,loadeddatas(mysqliText)

?>