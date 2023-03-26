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
    include "footer.php";
    require_once "mysql_connect.php";



    try {
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    }
    catch (PDOException $e){
        echo "There was an issue with the database.";

    }
    //if the user is logged in, display the cars they have registered
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $addOns = $_SESSION['addOns'];
        $retrieveUIDQuery = "SELECT userID from car_owners WHERE email = '$email';";
        $result = $pdo->query($retrieveUIDQuery);
        $row = $result->fetch(PDO::FETCH_NUM);
        $userID = $row[0];
        $retrieveCarInfoQuery = "SELECT * FROM users_cars WHERE UID = '$userID';";
        $result = $pdo->query($retrieveCarInfoQuery);
        $row = $result->fetch(PDO::FETCH_NUM);
        $carID = $row[0];
        $year = $row[2];
        $mileage = $row[3];
        switch ($row[4]) {
            case 1:
                $quality = "Excellent";
                break;
            case 2:
                $quality = "Very Good";
                break;
            case 3:
                $quality = "Good";
                break;
            case 4:
                $quality = "Fair";
                break;
        }
        $retrieveCarsQuery = "SELECT * FROM cars WHERE carID = '$carID';";
        $result = $pdo->query($retrieveCarsQuery);
        $row = $result->fetch(PDO::FETCH_NUM);
        $make = $row[1];
        $model = $row[2];
        $price = $row[4];

        //no car information
        if ($carID == null) {
            echo "<p>You have not registered any cars.</p>";
        }
        else {
            //display table
            echo "<table>";
            echo "<tr><th>Make</th><th>Model</th><th>Year</th><th>Quality</th><th>Mileage</th></tr>";
            echo "<tr><td>$make</td><td>$model</td><td>$year</td><td>$quality</td><td>$mileage</td></tr>";
            echo "</table>";
            echo "<br>";
            //adjust price based on quality and mileage
            switch ($quality) {
                case "Excellent":
                    $price = $price * 1.08;
                    break;
                case "Very Good":
                    $price = $price * 1.03;
                    break;
                case "Good":
                    $price = $price * 0.98;
                    break;
                case "Fair":
                    $price = $price * 0.93;
                    break;
            }
            if ($mileage <= 10000) {
                $price = $price * 0.99;
            } else if ($mileage <= 40000 && $mileage > 10000) {
                $price = $price * 0.95;
            } else if ($mileage <= 70000 && mileage > 40000) {
                $price = price * 0.9;
            } else
                $price = $price * 0.85;

            $dealerPrice = round($price * 1.15 + ($addOns * 75), 0);
            $privatePrice = round($price * 1.1 + ($addOns * 75), 0);
            $tradeIn = round($price * 0.8 + ($addOns * 75), 0);




            echo "<p>Estimated Private Owner Price: $$price</p>";
            echo "<p>Estimated Dealer Price: $$dealerPrice</p>";
            echo "<p>Certified Pre-Owned Price: $$privatePrice</p>";
            echo "<p>Estimated Trade-In Value: $$tradeIn</p>";
            echo "<p>Additional Add-Ons: $addOns</p>";
        }


        //button that takes user to car selection page
        echo "<a href='delete.php'><button class='carSelection' id = 'clear'>Appraise New Car</button></a>";
        echo "<a href='carHistory.php'><button class='carHistory'>View History</button></a>";


    }
    else {
        echo "You must be logged in to view your cars.";
    }
?>
</body>
