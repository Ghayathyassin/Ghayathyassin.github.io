<!-- deletetask.php -->
<?php
    include("db.php");

    $taskID = $_GET['taskID'];

    $sql = "DELETE FROM tasks WHERE task_id=$taskID";
    mysqli_query($con, $sql) or die(mysqli_error($con));
?>
