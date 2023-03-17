<?php
require_once "conn.php";
$username = $_POST["username"];
$password = $_POST["password"];

$insert_user = $conn->prepare("INSERT INTO account (username, password)VALUES (:username,:password)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password", $password);
$insert_user->execute();

echo strip_tags($_POST['username']);

?>

