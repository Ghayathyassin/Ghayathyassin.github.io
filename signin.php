<?php
    include("db.php");
    session_start();

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("Location: task_management.php"); // Redirect to the main task management page
            exit();
        } else {
            echo "Invalid username or password!";
        }
    }
?>
