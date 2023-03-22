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
    $usersCarsArray = array(array('cid' =>0,'year'=>'', 'make'=>'', 'model'=>'', 'price'=>0));//Does this work? can't have the same car I think though
    $CIDQuery = "SELECT CID, year FROM users_cars WHERE UID = '$userID';";
    try {
        $result = $pdo -> query($CIDQuery);
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            //not sure where to go from here
            foreach ($row as $value) {
                $usersCarsArray[$row][0] = $value;//Adding the cid??
                $usersCarsArray[$row][1] = $value;//Adding the year??
            }
        }
        //need make, model, price pulled from cars table where the CID matches
        //put each column into an array??
    }catch (PDOException $e) {
        echo "<h2>There was an error retrieving data from the database.</h2>";
        die();
    }
    //adjust the price in the array based on the year
    //output each car with the different values for each quality
?>
</body>
