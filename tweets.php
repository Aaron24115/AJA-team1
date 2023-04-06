<?php
session_start();
?>
<!DOCTYPE html>
<head lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register on Chirpify</title>
        <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
    </head>

<body>
<div class="Twitter-nav">
    <a href="index.php"><img src=images/Twitter-logo.png height="40" width="56"/></a>
    <ul>
        <li><a href="tweets.php">chirps</a></li>
        <li><a href="registration_form.php">Register on Chirpify</a></li>
    </ul>
</div>

<h1>Your chirps</h1>

<?php
require_once "conn.php";
$get_all_tweets = $conn->prepare( "SELECT * FROM tweets");
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

foreach ($tweets as $tweet) {
    $lnk = "<br><a style='color: indianred; text-decoration: none;' href='proclike.php?wid={$tweet['id']}'>Like this chirp</a> likes:{$tweet['likes']}";
    echo "<style> .tweet { color: #131313; margin: 30px; padding: 30px; font-size: 1.4em; max-width: 600px; border-radius: 5px; font-family: 'Cabin', sans-serif; background-color: #55aefc;} </style>" . "<div class='tweet'>" . $tweet["content"] . " - " . $_SESSION["username"] . $lnk . " <a href='delete_tweet.php?wid={$tweet['id']}' class='delete-button' style='color: red; text-decoration: none;' onclick='return confirm(\"Are you sure you want to delete this chirp?\")'>Delete</a>" . "</div>";
    echo "<br>ID: " . $tweet["id"];
    echo "<br>Delete URL: delete_tweet.php?wid=" . $tweet["id"];
}

?>

<a href="upload_tweet.php">
    <button class="block"><b>Upload a new tweet</b></button>
</a>

</body>