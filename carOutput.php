<!DOCTYPE html>


<html>
<head>
    <meta charset = "utf-8">
    <title>Redbook Car Output</title>
    <link rel = "stylesheet" href = "layout.css">
</head>
<body>
<?php
    include "header.php";
    require_once "mysql_connect.php";
    include "footer.php";

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    }
    catch (PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    $userID = $_SESSION['user_id'];
    $usersCarsArray = array();
    $CIDQuery = "SELECT CID, year FROM users_cars WHERE UID = '$userID';";
    try {
        $result = $pdo -> query($CIDQuery);
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            //not sure where to go from here
            //need make, model, price pulled where the CID matches
        }
    }catch (PDOException $e) {
        echo "<h2>There was an error retrieving data from the database.</h2>";
        die();
    }
  //need to adjust price based on year and condition(optional) and then output each of the cars
?>
</body>
