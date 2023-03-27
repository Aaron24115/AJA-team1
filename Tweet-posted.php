<?php
$db = new PDO ("mysql:localhost=location;dbname=twitter_copy", "root", "");

$get_all_tweets = $db->prepare("SELECT * FROM tweets");

$get_all_tweets->execute();

$tweets = $get_all_tweets->fetchAll();

foreach ($tweets as $tweet){
    echo "<div class='tweet'>" . $tweet['content'] . "</div>";
}

header("Location: Tweets.php");