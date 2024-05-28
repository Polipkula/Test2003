<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <style>
        body {
            background-color: #1b1b1b;
            color: #c6c6c6;
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
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?php
session_start();
include 'header.php';
?>

<div class="container">
    <h1>Welcome to Polipkula's Review Website</h1>
    <p class="mb-5">Explore and share your thoughts on the latest games!</p>
    <a href="https://steamcommunity.com/profiles/76561198185797226/" class="btn btn-primary">My Steam Profile</a>
</div>

<footer>
    © <?php echo date("Y"); ?> Polipkula's Review Page
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
