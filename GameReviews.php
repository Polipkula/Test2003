<?php
session_start();
include_once 'DBC.php';
include 'header.php';
include_once 'session.php';

$userID = $_SESSION['userID'];
?>

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

<div class="container">
    <h1>List of reviewed games</h1>
    <button id="add-review-btn" class="btn btn-primary" data-toggle="modal" data-target="#addReviewModal">Add Review</button>
    <br>
    <div id="reviews">
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        loadReviews();

        $('#addReviewForm').submit(function(event) {
            event.preventDefault();

            const gameName = $('#gameName').val();
            const gamePros = $('#gamePros').val();
            const gameCons = $('#gameCons').val();
            const gameOverall = $('#gameOverall').val();
            const gameImage = $('#gameImage').val();
            const likeDislike = $('input[name="likeDislike"]:checked').val();
            const likeDislikeImage = likeDislike === 'like' ? 'images/like.png' : 'images/dislike.png';

            $.ajax({
                url: 'add_review.php',
                type: 'POST',
                data: {
                    gameName: gameName,
                    gamePros: gamePros,
                    gameCons: gameCons,
                    gameRating: gameOverall,
                    gameImage: gameImage,
                    likeDislike: likeDislike
                },
                success: function(response) {
                    if (response.status === 'success') {
                        const newReview = `
                            <div class="review-card">
                                <img src="${gameImage}" alt="Game" height="260" width="260">
                                <h2>${gameName}</h2>
                                <p>Pros: ${gamePros}</p>
                                <p>Cons: ${gameCons}</p>
                                <p>Overall: ${gameOverall}/10</p>
                                <img src="${likeDislikeImage}" alt="Like/Dislike" height="50" width="50">
                            </div>
                        `;
                        $('#reviews').append(newReview);
                        $('#addReviewForm')[0].reset();
                        $('#addReviewModal').modal('hide');
                    } else {
                        alert('Failed to add review: ' + response.message);
                    }
                },
                error: function() {
                    alert('Failed to add review.');
                }
            });
        });
    });

    function loadReviews() {
        $.ajax({
            url: 'load_reviews.php',
            type: 'GET',
            success: function(response) {
                $('#reviews').html(response);
            },
            error: function() {
                alert('Failed to load reviews.');
            }
        });
    }
</script>
</body>
</html>
