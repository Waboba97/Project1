<?php

require_once "mysql_connect.php";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    echo "There was an issue with the database.";
}
session_start();
$email = $_SESSION['email'];
$retrieveUIDQuery = "SELECT userID from car_owners WHERE email = '$email';";
$result = $pdo->query($retrieveUIDQuery);
$row = $result->fetch(PDO::FETCH_NUM);
$userID = $row[0];
$clearQuery = "DELETE FROM users_cars WHERE UID = '$userID';";
$result = $pdo->query($clearQuery);
header("Location: carSelection.php");



?>