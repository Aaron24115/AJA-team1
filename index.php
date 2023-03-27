<?php
session_start();
require_once "conn.php";
$get_tweets = $conn->prepare("SELECT * from tweets");
$get_tweets->execute();
$tweets = $get_tweets->fetchAll();
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
            <li><a href="tweets.php">chirps</a></li>
            <li><a href="registration_form.php">Register on Chirpify</a></li>
        </ul>
</div>
<body>
<?php
echo "<div class='text-number-one'>" . "<style> .text-number-one {color: #f6f6f6;} </style> ". "Welcome, ". $_SESSION["gebruikersnaam"]."</div>";































