
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register on Chirpify</title>

</head>
<body>

<div class="sidenav">
    <a href="#">tweets</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<?php
//verbinding
require_once "conn.php";
$get_all_tweets = $conn->prepare( "SELECT * FROM tweets");
//uitvoering
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

foreach ($tweets as $tweet){
    echo $tweet["content"];
}
?>