<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game reviews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <style>
        .review-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }
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
include_once 'session.php';
include 'header.php';
?>

<div class="container" >
    <h1>List of reviewed games</h1>
    <div class="review-card">
        <img src="https://image.api.playstation.com/cdn/UP1004/CUSA03041_00/Hpl5MtwQgOVF9vJqlfui6SDB5Jl4oBSq.png" alt="Game"  height="260" width="260">
        <h2>Red Dead Redemption 2</h2>
        <p>Pros:</p>
        <p>Cons:</p>
        <p>Overall: 10/10</p>
        <img src="images/like.png" alt="Like/Dislike" height="50" width="50">
    </div>
    <div class="review-card">
        <img src="https://image.api.playstation.com/cdn/EP0700/CUSA03365_00/OFMeAw2KhrdaEZAjW1f3tCIXbogkLpTC.png" alt="Game" height="260" width="260">
        <h2>Dark Souls III</h2>
        <p>Pros:</p>
        <p>Cons:</p>
        <p>Overall: 9/10</p>
        <img src="images/like.png" alt="Like/Dislike" height="50" width="50">
    </div>
    <div class="review-card">
        <img src="https://www.gamespot.com/a/uploads/scale_medium/1197/11970954/2916533-wehappyfew_logo_color%20flat.jpg" alt="Game" height="260" width="260">
        <h2>We Happpy Few</h2>
        <p>Pros:</p>
        <p>Cons:</p>
        <p>Overall: 1/10</p>
        <img src="images/dislike.png" alt="Like/Dislike" height="50" width="50">
    </div>
    <div class="review-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSe-6N1fitdinldCZVCq51rob4WyrA0RoOME9-OfJAcoA&s" alt="Game" height="260" width="260">
        <h2>Ghost Of Tsushima</h2>
        <p>Pros:</p>
        <p>Cons:</p>
        <p>Overall: 9.5/10</p>
        <img src="images/like.png" alt="Like/Dislike" height="50" width="50">
    </div>
</div>

<footer>
    © <?php echo date("Y"); ?> Polipkula's review page
</footer>

</body>
</html>
