<?php
    session_start();
    include("db.php");

    if (!isset($_SESSION['username'])) {
        header("Location: index.html"); // Redirect to the sign-in page if there is any problem
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional custom styles can be added here */
        body {
            padding: 40px;
        }

        .task-container {
            margin-top: 20px;
        }
    </style>
</head>

<body onload="loadTasks()">
    <div class="container mt-5">
        <h2>Welcome to Task Management, <?php echo $_SESSION['username']; ?></h2>
        <div class="row task-container">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="taskName" placeholder="Enter task name">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="addTask()">Add Task</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="taskList"></div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function loadTasks() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("taskList").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "gettasks.php", true);
            xmlhttp.send();
        }

        function addTask() {
            var taskName = document.getElementById("taskName").value;
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadTasks(); // Reload the task list after adding a task
                }
            }
            xmlhttp.open("GET", "addtask.php?taskName=" + taskName, true);
            xmlhttp.send();
        }

        function deleteTask(taskID) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadTasks(); // Reload the task list after deleting a task
                }
            }
            xmlhttp.open("GET", "deletetask.php?taskID=" + taskID, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>
