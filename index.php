<?php
$dsn = "mysql:host=localhost;dbname=aanmelden";
$user = "root";
$pass = "";
$conn =  new PDO($dsn, $user, $pass);

$sql = "SELECT*FROM aanmelding";

$stmt = $conn->query($sql);

while ( $row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo "<br>" . $row->Achternaam;
    echo "<pre>".print_r($row, true)."</pre>";
}