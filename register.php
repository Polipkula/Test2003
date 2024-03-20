<?php

require_once 'DBC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $connection = DBC::getConnection();
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statement, 'ss', $username, $password);
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
</head>
<body>

<form action="register.php" method="POST">
    <h3>Register</h3>
    <label for="username">Username</label>
    <input type="text" placeholder="Username" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">
    <button type="submit">Register</button>
</form>
</body>
</html>
