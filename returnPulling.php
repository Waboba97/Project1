<?php // returnPulling.php

//authenticate.php: authenticates users who are stored in the database
require_once 'mysql_connect.php';
include "header.php";
//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    die("Fatal Error - Could not connect to the database" . "</body></html>" );
}
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];




    $_SESSION['email'] = $_POST['email'];

    $query = "SELECT from car_owners WHERE email ='$username' AND password = '$password';";

    $result = $pdo -> query($query);
    echo "2";
    $row = $result -> fetch(PDO::FETCH_NUM);

    if (password_verify($password, $row[1])) {
        $_SESSION['email'] = $row[0];
        $_SESSION['password'] = $row[1];
        echo htmlspecialchars("Hi {$row[0]}, you are successfully logged in.");
        session_start();
    }else echo "There was a problem logging you into the database.";

    if(!isset($_SESSION)) {
        session_start();
        echo "1";
    }
}
function sanitise($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
}
    include "footer.php";
?>
