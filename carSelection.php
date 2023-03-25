<!DOCTYPE html>


<html>
<head>
    <meta charset = "utf-8">
    <title>Redbook Car Selection</title>
    <script type="text/javascript">
        let carObject = {
            "Subaru": ["Forester","Outback","Crosstrek","Impreza"],
            "Honda": ["Odyssey","Accord","Civic","Ridgeline"],
            "Chevrolet": ["Impala", "Silverado", "Malibu", "Equinox"],
            "Ford": ["F150","Focus","Explorer","Mustang"],
            "Toyota": ["Camry","Corolla","RAV4","Tacoma"]
        };
        window.onload = function() {
            let makeSelect = document.getElementById("mk");
            let modelSelect = document.getElementById("model");
            for (let x in carObject) {
                makeSelect.options[makeSelect.options.length] = new Option (x,x);
            }
            makeSelect.onchange = function() {
                modelSelect.length = 1;
                let y = carObject[makeSelect.value];
                for (let i = 0; i < Object.keys(y).length; i++) {
                    modelSelect.options[modelSelect.options.length] = new Option (y[i],y[i]);
                }
            };
        };
    </script>
    <style>
        body{text-align: center;}
    </style>
    <link rel = "stylesheet" href = "layout.css">

</head>
<body>
<h1>Please select your vehicle</h1>
<form method="post" action="carSelection.php">
    Year: <select name = "yr" id = "yr">
        <option value = "" selected = "selected">Select Year</option>
        <option value = "2022">2022</option>
        <option value = "2021">2021</option>
        <option value = "2020">2020</option>
        <option value = "2019">2019</option>
        <option value = "2018">2018</option>
        <option value = "2017">2017</option>
        <option value = "2016">2016</option>
        <option value = "2015">2015</option>
        <option value = "2014">2014</option>
        <option value = "2013">2013</option>
        <option value = "2012">2012</option>
        <option value = "2011">2011</option>
        <option value = "2010">2010</option>
        <option value = "2009">2009</option>
        <option value = "2008">2008</option>
        <option value = "2007">2007</option>
        <option value = "2006">2006</option>
        <option value = "2005">2005</option>
        <option value = "2004">2004</option>
        <option value = "2003">2003</option>
        <option value = "2002">2002</option>
        <option value = "2001">2001</option>
        <option value = "2000">2000</option>
    </select>
    Make: <select name = "mk" id = "mk">
        <option value = "" selected = "selected">Please select car make </option></select>
    Model: <select name = "model" id = "model">
        <option value = "" selected = "selected">Please select make first </option>
    </select>
    Mileage: <input type = "number" name = "mileage" size = "10" required>
    Quality: <select name = "quality">
        <option value = ""></option>
        <option value = "1">Excellent</option>
        <option value = "2">Very Good</option>
        <option value = "3">Good</option>
        <option value = "4">Fair</option>
    </select>
    <br><br>
    <input type="submit" name ="addCar" value="Submit Car">
    <button type = "submit" formaction="carOutput.php">Show Cars</button>
</form>
</body>
</html>
<?php
include ("header.php");
require_once 'mysql_connect.php';
include ("footer.php");
$inputError = false;
$year = "";
$make = "";
$model = "";
$quality = "";
$mileage = 0;

if (isset($_POST["addCar"])) {
    $year = $_POST["yr"];
    $make = $_POST["mk"];
    $model = $_POST["model"];
    $quality = $_POST["quality"];
    $mileage = $_POST["mileage"];
    //checking if a valid choice was made
    if (empty($quality)) {
        $inputError = true;
        echo "You must select a quality";
    }
    if (empty($mileage)) {
        $inputError = true;
    }
    if (empty($year)) {
        $inputError = true;
        echo "You must select a year";
    }
    if (empty($make)) {
        $inputError = true;
        echo "You must select a make";
    }
    if (empty($model)) {
        $inputError = true;
        echo "You must select a model";
    }

    if (isset($_SESSION['email'])) {
        require_once 'mysql_connect.php';
        try {
            $pdo = new PDO($dsn, $dbUser, $dbPassword);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        $email = $_SESSION['email'];

        if (!$inputError) {
            try {
                //retrieve carID
                $retrieveCIDQuery = "SELECT carID FROM cars WHERE make = '$make' AND model = '$model';";
                $result = $pdo->query($retrieveCIDQuery);
                $row = $result->fetch(PDO::FETCH_NUM);
                $carID = $row[0];
                //retrieve user ID
                $retrieveUIDQuery = "SELECT userID from car_owners WHERE email = '$email';";
                $result = $pdo->query($retrieveUIDQuery);
                $row = $result->fetch(PDO::FETCH_NUM);
                $userID = $row[0];
                //Add to the linking table
                $insertQuery = "INSERT INTO users_cars (CID, UID, year, mileage, quality) VALUES('$carID', '$userID', '$year', '$mileage', '$quality');";
                $result = $pdo->query($insertQuery);
            } catch (PDOException $e) {
                die("An error has occurred");
            }
            echo "The car was successfully added to the database.";
        }
        $result->close();
        $pdo->close();
    }
}
?>
