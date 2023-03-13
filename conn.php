<?php
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:localhost=location;dbname=twitter_copy", $username, $password);
} catch (PDOException $error) {
    echo $error->getMessage();
}
?>