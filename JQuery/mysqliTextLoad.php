<?php

    require "connectionRequire.php";

    $mysqliTextQuery = "SELECT * FROM loadeddatas";
    $result = mysqli_query($conn,$mysqliTextQuery);
    if (mysqli_num_rows($result) > 0){
        while ($loadedMysqliTextRecordData = $result->fetch_assoc()){
            echo '<p>'.$loadedMysqliTextRecordData['mysqliText'].'</p>';
        }
    }

?>