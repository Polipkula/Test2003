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

        if (password_verify($password, password_hash($row['password'], PASSWORD_DEFAULT))) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else {
            echo "Nesprávné heslo.";
        }
    } else {
        echo "Uživatel neexistuje.";
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
        footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 1px solid #ccc;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
<form action="login.php" method="POST" class="formik">
    <h3>Login Here</h3>
    <label for="username">Username</label>
    <input type="text" placeholder="Email or Phone" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">
    <button type="submit">Log In</button>
</form>
<footer>
    © <?php echo date("Y"); ?> Polipkula's review page
</footer>

</body>
</html>
