<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "task_manager";

    $con = mysqli_connect($host, $username, $password) or die("Could not connect to the server - " . mysqli_connect_error());
    mysqli_select_db($con, $database) or die("<br>Could not connect to the DB -" . mysqli_error($con));
?>
