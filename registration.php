<?php
session_start();
require_once "conn.php";
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

$insert_user = $conn->prepare("INSERT INTO account (username, password, email)VALUES (:username,:password,:email)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password", $password);
$insert_user->bindParam(":email", $email);
$insert_user->execute();

$_SESSION["gebruikersnaam"] = $username;
header("Location: index.php");
?>
