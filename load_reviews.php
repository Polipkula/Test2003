<?php
session_start();
require_once 'DBC.php';

if (!isset($_SESSION['userID'])) {
    echo 'User not logged in';
    exit;
}

$userID = $_SESSION['userID'];
$connection = DBC::getConnection();

$sql = "SELECT * FROM cards WHERE userID = ?";
$statement = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($statement, 'i', $userID);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

$reviews = '';

while ($row = mysqli_fetch_assoc($result)) {
    $likeDislikeImage = $row['gameLikeDislike'] == 1 ? 'images/like.png' : 'images/dislike.png';
    $reviews .= '
        <div class="review-card">
            <img src="' . $row['gameImage'] . '" alt="Game" height="260" width="260">
            <h2>' . $row['gameName'] . '</h2>
            <p>Pros: ' . $row['gamePros'] . '</p>
            <p>Cons: ' . $row['gameCons'] . '</p>
            <p>Overall: ' . $row['gameRating'] . '/10</p>
            <img src="' . $likeDislikeImage . '" alt="Like/Dislike" height="50" width="50">
        </div>
    ';
}

echo $reviews;

mysqli_stmt_close($statement);
mysqli_close($connection);
?>
