<?php
include("db.php");

$username = $_GET['username'];

$deleteUserQuery = "DELETE FROM users WHERE username='$username'";
mysqli_query($con, $deleteUserQuery) or die(mysqli_error($con));
?>
