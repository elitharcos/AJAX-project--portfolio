<?php

    require "connectionRequire.php";

    $saveToDatabase = $_POST['textToSave'];
    $saveToDatabase = filter_var($saveToDatabase,FILTER_SANITIZE_SPECIAL_CHARS);


    //$mysqliTextQuery = "INSERT INTO loadeddatas (mysqliText) VALUES ('$saveToDatabase');";
    //$result = mysqli_query($conn,$mysqliTextQuery);

    echo $saveToDatabase;

    $stmt = $conn->prepare("INSERT INTO loadeddatas (mysqliText) VALUES (?)");
    $stmt->bind_param("s",$saveToDatabase);
    $stmt->execute();
?>