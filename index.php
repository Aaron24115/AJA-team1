<?php
require_once "conn.php";

$get_tweets = $conn->prepare("SELECT * from tweets");
$get_tweets->execute();
$tweets = $get_tweets->fetchAll();
Var_dump($tweets);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register on Chirpify</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="sidenav">
    <a href="#">tweets</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>





























