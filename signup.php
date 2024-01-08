<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management - Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional custom styles can be added here */
        body {
            padding: 40px;
        }
    </style>
</head>

<body>
    <?php
    include("db.php");

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the username is already taken
        $checkUserQuery = "SELECT * FROM users WHERE username='$username'";
        $checkUserResult = mysqli_query($con, $checkUserQuery) or die(mysqli_error($con));

        if (mysqli_num_rows($checkUserResult) > 0) {
            echo "Username already taken. Please choose another.";
        } else {
            // Insert new user into the database
            $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($con, $insertUserQuery) or die(mysqli_error($con));

            echo "User registered successfully! <a href='index.html'>Sign In</a>";
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Sign Up</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                </form>
                <p class="mt-3">Already have an account? <a href="index.html">Sign In</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
