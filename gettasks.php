<!-- gettasks.php -->
<?php
    include("db.php");
    session_start();

    $username = $_SESSION['username'];

    // get all tasks
    $userQuery = "SELECT id FROM users WHERE username='$username'";
    $userResult = mysqli_query($con, $userQuery) or die(mysqli_error($con));

    if (mysqli_num_rows($userResult) > 0) {
        $userData = mysqli_fetch_assoc($userResult);
        $userId = $userData['id'];

        $sql = "SELECT * FROM tasks WHERE user_id='$userId'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        echo "<ul>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<li>{$row['task_name']} <button onclick='deleteTask({$row['task_id']})'>Delete</button></li>";
        }
        echo "</ul>";
    } else {
        echo "User not found";
    }
?>
