<?php

$db = new PDO("mysql:localhost=location;dbname=twitter_copy", "root", "");

if (isset($_POST['submit-tweet'])){
    $tweets = filter_input(INPUT_POST, 'chirp', FILTER_SANITIZE_STRING);

    $query = $db->prepare("INSERT INTO tweets (content, user_id) VALUES (:content, :user_id)");
    $query->bindParam(":content", $tweets);
    $query->bindParam(":user_id", $tweets);
    $query->execute();

    header("Location: Tweet-posted.php");
}