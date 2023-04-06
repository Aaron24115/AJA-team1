<?php


$dsn = "mysql:host=localhost;dbname=twitter_copy";

$conn = new PDO($dsn, "root", "");

$wid = $_GET['wid'];

$sql = "UPDATE tweets SET likes = likes + 1 WHERE id = :wid";

$stmt = $conn->prepare($sql);
$stmt->execute([":wid" => $_GET['wid']]);

header("location: index.php");

