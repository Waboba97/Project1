<?php // returnPulling.php

//authenticate.php: authenticates users who are stored in the database
require_once 'mysql_connect.php';
include "header.php";
include "footer.php";
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
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT password from car_owners WHERE email ='$username';";

   try {
       $result = $pdo->query($query);
   }
   catch (PDOException $e) {
       echo "There was an issue with the database.";
   }

    $row = $result -> fetch(PDO::FETCH_NUM);

   $pw = $row[0];
    if (password_verify($password, $pw)) {
        session_start();
        $_SESSION['email'] = $username;
        $_SESSION['password'] = $pw;
        //fetch name from database
        $query = "SELECT firstName from car_owners WHERE email ='$username';";
        $result = $pdo->query($query);
        $row = $result -> fetch(PDO::FETCH_NUM);
        $name = $row[0];
        echo ("Hi $name, you are successfully logged in.<br>");
        echo "<a href = 'carSelection.php'>Register cars</a>";
        echo "<br>";
        echo "<a href = 'carOutput.php'>View cars</a>";
    }else
        echo "There was a problem logging you into the database.";

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
