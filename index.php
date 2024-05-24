<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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



<?php
session_start();
include 'header.php';

?>

<div class="container">
    <h1>Welcome to the Polipkula's review website</h1>
    <li><a href="https://steamcommunity.com/profiles/76561198185797226/">My steam profile</a></li>
</div>
<footer>
    © <?php echo date("Y"); ?> Polipkula's review page
</footer>

</body>
</html>
