<?php

    require "connectionRequire.php";

    $mysqliTextQuery = "DELETE FROM loadeddatas;";
    $result = mysqli_query($conn,$mysqliTextQuery);

?>