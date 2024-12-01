<?php

    require "connectionRequire.php";

    /* 1ST VARIANT VULNERABLE TO SQL INJECT!!! TEST ONLY!
    $getFromDatabase = $_POST['textToChange'];
    $saveToDatabase = $_POST['textToSave'];

    $mysqliTextQuery = "UPDATE loadeddatas SET mysqliText='$saveToDatabase' WHERE mysqliText='$getFromDatabase';";
    mysqli_query($conn,$mysqliTextQuery);
    */

    /* 2ND VARIANT
    $getFromDatabase = filter_input(INPUT_POST,$_POST['textToChange'],FILTER_SANITIZE_SPECIAL_CHARS);
    $saveToDatabase = filter_input(INPUT_POST,$_POST['textToSave'],FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("UPDATE loadeddatas SET mysqliText=? WHERE mysqliText=?;");
    $stmt->bind_param("ss",$saveToDatabase,$getFromDatabase);
    $stmt->execute();*/

    $data = json_decode(file_get_contents("php://input"), true);
    //echo $data['textToChange'];

    $sanitizedGetData = filter_var($data['textToChange'],FILTER_SANITIZE_SPECIAL_CHARS);
    $sanitizedSetData = filter_var($data['textToSave'],FILTER_SANITIZE_SPECIAL_CHARS);
    echo $sanitizedGetData;
    echo $sanitizedSetData;

    $stmt = $conn->prepare("UPDATE loadeddatas SET mysqliText=? WHERE mysqliText=?;");
    $stmt->bind_param("ss",$sanitizedSetData,$sanitizedGetData);
    $stmt->execute();
?>