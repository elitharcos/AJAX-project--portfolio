<?php
    require "connectionRequire.php";

?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Szatmári Szabolcs">

        <script src="jquery-3.7.1.min.js?v=1.1"></script>
        
        <title>Ajax Project</title>
    </head>
    <body>

    <div id="loadData">
        <p>Change message here!</p>
    </div><br>
    <button id="btnReset" type="submit" style="background:green;color:white;cursor:pointer;">Reset message</button><br><br>
    <button id="btnLoad" type="submit" style="background:green;color:white;cursor:pointer;">Load Data</button><br><br>

    <textarea name="saveDataName" id="saveDataSimple">JQ Data SQL</textarea><br><br>
    <button id="btnSaveDataToSimpleSQL" type="submit" style="background:blue;color:white;cursor:pointer;">Save new text to sql (simple post add line)</button><br><br>

    <textarea name="saveDataName" id="saveDataAJAX">Save AJAX</textarea><br><br>
    <button id="btnSaveDataToAjaxSQL" type="submit" style="background:blue;color:white;cursor:pointer;">Save new text to sql (AJAX add line)</button><br><br>

    <!--Frist textarea gets the mysqliText data of record, the 2nd one sets it to something else-->
    <textarea name="updateDataName" id="updateDataGet">JQ Data SQL</textarea><br><br>
    <textarea name="updateDataName" id="updateDataSet">JQ Data SQL NEW</textarea><br><br>
    <button id="btnUpdateDataToAjaxSQL" type="submit" style="background:blue;color:white;cursor:pointer;">Save new text to sql (AJAX add line)</button><br><br>

    <button id="btnLoadDataFromSQL" type="submit" style="background:green;color:white;cursor:pointer;">Load Data From SQL</button><br><br>

    <button id="btnDeleteDataFromSQL" type="submit" style="background:red;color:white;cursor:pointer;">DELETE ALL</button>


    </body>
</html>
<script>
    $(document).ready(function() {
        $("#btnReset").click(function() {
            $("#loadData").html(" <p>Change message here!</p>")
        });

        $("#btnLoad").click(function() {
            $("#loadData").load("data.txt");
        });

        //GET
        $("#btnLoadDataFromSQL").click(function() {
            $("#loadData").load("mysqliTextLoad.php");
        });

        //SIMPLE form
        $("#btnSaveDataToSimpleSQL").click(function() {
            let sentData = document.getElementById("saveDataSimple").value;
            $.post("mysqliTextSave.php",{
                textToSave: sentData
            });
        });

        //ADVANCED forms

        //POST
        $("#btnSaveDataToAjaxSQL").click(function() {
            let sentData = document.getElementById("saveDataAJAX").value;
            $.ajax({
                url: "mysqliTextSave.php",
                method: "POST",
                data: {
                    textToSave: sentData
                },
                success: function(response) {
                    console.log("Success:", response); // success
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error); // error
                }
            });
        });

        //DELETE
        $("#btnDeleteDataFromSQL").click(function() {
            $.ajax({
                url: "mysqliTextDelete.php",
                method: "DELETE",
                success: function(response) {
                    console.log("Success:", response); // success
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error); // error
                }
            });
        });


        //UPDATE
        $("#btnUpdateDataToAjaxSQL").click(function() {
            let getData = document.getElementById("updateDataGet").value;
            let sentData = document.getElementById("updateDataSet").value;
            $.ajax({
                url: "mysqliTextUpdate.php",
                method: "PUT",
                data: JSON.stringify({textToChange: getData, textToSave: sentData}),
                success: function(response) {
                    console.log("Success:", response); // success
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error); // error
                }
            });
        });



    });
</script>