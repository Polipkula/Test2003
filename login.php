<?php
require_once 'DBC.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = DBC::getConnection();
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statement, 's', $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['userID'] = $row['id'];
            $_SESSION['username'] = $username;
            header('Location: GameReviews.php');
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
<?php
include 'header.php';
?>


<form action="login.php" method="POST" class="formik">
    <h3>Login Here</h3>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Log In</button>
</form>

<footer>
    © <?php echo date("Y"); ?> Polipkula's Review Page
</footer>
</body>
</html>
