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
        #add-review-btn {
            margin: 20px;
        }
    </style>
</head>
<body>

<?php
session_start();
include_once 'session.php';
include 'header.php';
?>

<div class="container">
    <h1>List of reviewed games</h1>
    <button id="add-review-btn" class="btn btn-primary" data-toggle="modal" data-target="#addReviewModal">Add Review</button>
    <br>
    <div id="reviews">
        <div class="review-card">
            <img src="https://image.api.playstation.com/cdn/UP1004/CUSA03041_00/Hpl5MtwQgOVF9vJqlfui6SDB5Jl4oBSq.png" alt="Game" height="260" width="260">
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
        <div class="review-card">
            <img src="https://store-images.s-microsoft.com/image/apps.4132.14254372351363255.ac3906d1-13b6-4af0-a00a-e10c8a92007b.834fe893-324e-4c41-9740-bafed4026578" alt="Game" height="260" width="260">
            <h2>Mass Effect</h2>
            <p>Pros:</p>
            <p>Cons:</p>
            <p>Overall: 7/10</p>
            <img src="images/like.png" alt="Like/Dislike" height="50" width="50">
        </div>
    </div>
</div>

<div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReviewModalLabel">Add New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addReviewForm">
                    <div class="form-group">
                        <label for="gameName">Game Name</label>
                        <input type="text" class="form-control" id="gameName" required>
                    </div>
                    <div class="form-group">
                        <label for="gamePros">Pros</label>
                        <textarea class="form-control" id="gamePros" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gameCons">Cons</label>
                        <textarea class="form-control" id="gameCons" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gameOverall">Overall Rating</label>
                        <input type="number" class="form-control" id="gameOverall" min="0" max="10" required>
                    </div>
                    <div class="form-group">
                        <label for="gameImage">Game Image</label>
                        <input type="url" class="form-control" id="gameImage" placeholder="Enter image URL" required>
                    </div>
                    <div class="form-group">
                        <label>Like or Dislike</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="likeDislike" id="like" value="like" checked>
                            <label class="form-check-label" for="like">Like</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="likeDislike" id="dislike" value="dislike">
                            <label class="form-check-label" for="dislike">Dislike</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer>
    © <?php echo date("Y"); ?> Polipkula's review page
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('addReviewForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const gameName = document.getElementById('gameName').value;
            const gamePros = document.getElementById('gamePros').value;
            const gameCons = document.getElementById('gameCons').value;
            const gameOverall = document.getElementById('gameOverall').value;
            const gameImage = document.getElementById('gameImage').value;
            const likeDislike = document.querySelector('input[name="likeDislike"]:checked').value;
            const likeDislikeImage = likeDislike === 'like' ? 'images/like.png' : 'images/dislike.png';

            const newReview = document.createElement('div');
            newReview.className = 'review-card';
            newReview.innerHTML = `
                <img src="${gameImage}" alt="Game" height="260" width="260">
                <h2>${gameName}</h2>
                <p>Pros: ${gamePros}</p>
                <p>Cons: ${gameCons}</p>
                <p>Overall: ${gameOverall}/10</p>
                <img src="${likeDislikeImage}" alt="Like/Dislike" height="50" width="50">
            `;
            document.getElementById('reviews').appendChild(newReview);

            document.getElementById('addReviewForm').reset();
            $('#addReviewModal').modal('hide');
        });
    });
</script>