<!DOCTYPE html>


<html>
<head>
    <meta charset = "utf-8">
    <title>Redbook User History</title>
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
        echo "There was an issue with the database.";

    }

    //if the user is logged in, display all cars they have registered

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $retrieveUIDQuery = "SELECT userID from car_owners WHERE email = '$email';";
        $result = $pdo->query($retrieveUIDQuery);
        $row = $result->fetch(PDO::FETCH_NUM);
        $userID = $row[0];
        $retrieveCarInfoQuery = "SELECT * FROM car_history WHERE UID = '$userID';";
        $result = $pdo->query($retrieveCarInfoQuery);
        //display all information from the users_cars table
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $carID = $row[0];
            switch ($row[5]) {
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
            $year = $row[3];
            $make = $row[1];
            $model = $row[2];
            $mileage = $row[4];
            echo "<div class = 'carOutput'>";
            echo "<h2>$year $make $model</h2>";
            echo "<p>Mileage: $mileage</p>";
            echo "<p>Quality: $quality</p>";
            echo "</div>";
        }


        //button to add a new car
        echo "<form action = 'carSelection.php' method = 'post'>";
        echo "<input type = 'submit' value = 'Add a New Car'>";
        echo "</form>";

        //button for current estimation
        echo "<form action = 'carOutput.php' method = 'post'>";
        echo "<input type = 'submit' value = 'View Current Estimation'>";
        echo "</form>";

    }

?>
</body>

