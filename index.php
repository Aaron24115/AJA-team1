<?php
session_start();
require_once "conn.php";
$get_tweets = $conn->prepare("SELECT * from tweets");
$get_tweets->execute();
$tweets = $get_tweets->fetchAll();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chirpify</title>
    <link rel="stylesheet" href="main.css">
</head>

<div class="Twitter-nav">
    <a href="index.php"><img src=images/Twitter-logo.png height="40" width="56"/></a>
    <ul>
        <li><a href="tweets.php">Chirps</a></li>
        <li><a href="registration_form.php">Register on Chirpify</a></li>
        <li><a href="settings.php">Settings</a></li>
    </ul>
</div>
<body>
<?php
echo "<div class='text-number-one'>" . "<style> .text-number-one {color: #f6f6f6;} </style> ". "Welcome, ". $_SESSION["username"]."</div>";
?>

<h1>All chirps</h1>

<?php
require_once "conn.php";
$get_all_tweets = $conn->prepare( "SELECT * FROM tweets");
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

foreach ($tweets as $tweet) {
    $lnk = '';
    $tweet_id = $tweet['id'];

    // Check if the logged-in user has already liked the tweet
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM likes WHERE tweet_id = :tweet_id AND user_id = :user_id");
    $stmt->bindParam(':tweet_id', $tweet_id);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];

    // If the user hasn't liked the tweet yet, show the like button
    if ($count == 0) {
        $lnk = "<br><a style='color: indianred; text-decoration: none;' href='proclikeindex.php?wid={$tweet['id']}'>Like this chirp</a> likes:{$tweet['likes']}";
    } else {
        $lnk = "<br>You have already liked this chirp";
    }

    echo "<div class ='tweet'>" . "<style> .tweet { color: #131313; margin: 30px; padding: 30px; font-size: 1.4em; max-width: 600px; border-radius: 5px; font-family: 'Cabin', sans-serif; background-color: #55aefc;} </style>" . $tweet["content"] . $lnk . "</div>";
}
?>




















