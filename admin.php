<?php
    include("db.php");

    if (basename($_SERVER['PHP_SELF']) != "admin.php") {
        // This part of the code ensures that admin.php is not accessed in a different way
        echo "Access denied.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-success d-flex align-items-center justify-content-center vh-100">
    <div class="container bg-white p-4 rounded shadow">
        <h2 class="text-center mb-4">Welcome to Admin Panel</h2>

        <div class="section">
            <h3>Users</h3>
            <ul class='list-group'>
                <?php
                    // Display users
                    $userQuery = "SELECT * FROM users";
                    $userResult = mysqli_query($con, $userQuery) or die(mysqli_error($con));

                    while ($userData = mysqli_fetch_assoc($userResult)) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                {$userData['username']}
                                <button class='btn btn-danger' onclick='deleteUser(\"{$userData['username']}\")'>Delete</button>
                              </li>";
                    }
                ?>
            </ul>
        </div>

        <div class="section mt-4">
            <h3>Tasks</h3>
            <ul class='list-group'>
                <?php
                    // Display tasks
                    $taskQuery = "SELECT * FROM tasks";
                    $taskResult = mysqli_query($con, $taskQuery) or die(mysqli_error($con));

                    while ($taskData = mysqli_fetch_assoc($taskResult)) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                {$taskData['task_name']}
                                <button class='btn btn-danger' onclick='deleteTask({$taskData['task_id']})'>Delete</button>
                              </li>";
                    }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function deleteTask(taskID) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    location.reload(); // Reload the page after deleting a task
                }
            }
            xmlhttp.open("GET", "deletetask.php?taskID=" + taskID, true);
            xmlhttp.send();
        }

        function deleteUser(username) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    location.reload(); // Reload the page after deleting a user
                }
            }
            xmlhttp.open("GET", "deleteuser.php?username=" + username, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>
