<?php
    include("db.php");
    session_start();

    $username = $_SESSION['username'];
    $taskName = $_GET['taskName'];

    // Get tasks
    $userQuery = "SELECT id FROM users WHERE username='$username'";
    $userResult = mysqli_query($con, $userQuery) or die(mysqli_error($con));
    
    if(mysqli_num_rows($userResult) > 0) {
        $userData = mysqli_fetch_assoc($userResult);
        $userId = $userData['id'];

        // Insert the task 
        $sql = "INSERT INTO tasks (user_id, task_name) VALUES ('$userId', '$taskName')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    } else {
        echo "User not found";
    }
?>
