<?php
session_start();
require_once 'DBC.php';

if (!isset($_SESSION['userID'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$userID = $_SESSION['userID'];
$gameName = $_POST['gameName'];
$gamePros = $_POST['gamePros'];
$gameCons = $_POST['gameCons'];
$gameRating = $_POST['gameRating'];
$gameImage = $_POST['gameImage'];
$likeDislike = $_POST['likeDislike'];
$likeDislike = ($likeDislike === 'like') ? 1 : 0;

$connection = DBC::getConnection();

$sql = "INSERT INTO cards (userID, gameName, gamePros, gameCons, gameRating, gameImage, gameLikeDislike) VALUES (?, ?, ?, ?, ?, ?, ?)";
$statement = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($statement, 'isssssi', $userID, $gameName, $gamePros, $gameCons, $gameRating, $gameImage, $likeDislike);

if (mysqli_stmt_execute($statement)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add review']);
}

mysqli_stmt_close($statement);
?>
