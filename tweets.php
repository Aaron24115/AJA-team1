<?php
session_start();
?>
<!DOCTYPE html>
<footer lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register on Chirpify</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">

</head>

<div class="Twitter-nav">
    <a href="index.php"><img src=images/Twitter-logo.png height="40" width="56"/></a>
    <ul>
        <li><a href="tweets.php">chirps</a></li>
        <li><a href="registration_form.php">Register on Chirpify</a></li>
    </ul>
</div>

<h1>Your chirps</h1>

<?php
//verbinding
require_once "conn.php";
$get_all_tweets = $conn->prepare( "SELECT * FROM tweets");
//uitvoering
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

foreach ($tweets as $tweet) {
    echo "<style> .tweet { color: #131313; margin: 30px; padding: 30px; font-size: 1.4em; max-width: 600px; border-radius: 5px; font-family: 'Cabin', sans-serif; background-color: #55aefc;} </style>" . "<div class ='tweet'>" . $tweet["content"] ." - ". $_SESSION["gebruikersnaam"]. "</div>";
}
?>

<a href="upload_tweet.php">
    <button class="block"><b>Upload a new tweet</b></button>
</a>

