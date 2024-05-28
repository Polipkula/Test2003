<?php

require_once 'DBC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $connection = DBC::getConnection();
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statement, 'ss', $username, $hashed_password);
    mysqli_stmt_execute($statement);

    if (mysqli_stmt_affected_rows($statement) > 0) {
        echo "Registration successful. You can now <a href='index.php'>login</a>.";
    } else {
        echo "Registration failed. Please try again.";
    }

    mysqli_stmt_close($statement);
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <style>
        body {
            background-color: #1b1b1b;
            color: #c6c6c6;
        }
        .formik {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #2a2a2a;
            border: 1px solid #444;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #2a2a2a;
            border-top: 1px solid #444;
            color: #c6c6c6;
        }
    </style>
</head>
<body>
<?php
include 'header.php';
?>


<form action="register.php" method="POST" class="formik">
    <h3>Register</h3>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<footer>
    © <?php echo date("Y"); ?> Polipkula's Review Page
</footer>
</body>
</html>
