<?php
session_start();
require_once "conn.php";
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insert_user = $conn->prepare("INSERT INTO account (username, password, password_hash, email)VALUES (:username, :password, :password_hash,:email)");
$insert_user->bindParam(":username", $username);
$insert_user->bindParam(":password_hash", $hashed_password);
$insert_user->bindParam(":password", $password);
$insert_user->bindParam(":email", $email);
$insert_user->execute();

$_SESSION['username'] = $username;

header("Location: index.php");
?>