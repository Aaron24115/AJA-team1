<?php
require_once "conn.php";

$get_tweets = $conn->prepare("SELECT * from tweets");
$get_tweets->execute();
$tweets = $get_tweets->fetchAll();
Var_dump($tweets);

?>