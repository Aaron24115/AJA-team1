<?php
session_start();
require_once "conn.php";

if (isset($_GET["wid"])) {
    $tweet_id = $_GET["wid"];

    // Delete the tweet from the database
    $delete_tweet = $conn->prepare("DELETE FROM tweets WHERE id = :tweet_id");
    $delete_tweet->bindParam(":tweet_id", $tweet_id);
    $delete_tweet->execute();

    // Redirect back to the tweets page
    header("Location: tweets.php");
    exit();
}

$tweet_id = $_GET["wid"];
$get_tweet = $conn->prepare("SELECT * FROM tweets WHERE id = :id");
$get_tweet->bindParam(":id", $tweet_id);
$get_tweet->execute();
$tweet = $get_tweet->fetch();

if (!$tweet) {
    header("Location: tweets.php");
    exit;
}

if ($tweet["username"] !== $_SESSION["username"]) {
    header("Location: tweets.php");
    exit;
}

$delete_tweet = $conn->prepare("DELETE FROM tweets WHERE id = :id");
$delete_tweet->bindParam(":id", $tweet_id);
$delete_tweet->execute();

header("Location: tweets.php");
exit;
