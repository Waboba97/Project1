<?php
// This is the main page for the site.

// Include the configuration file:
require_once ('config.php');
require_once "mysql_connect.php";

// Set the page title and include the HTML header:
$page_title = 'Welcome to RedBook';
include ('header.php');

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    echo "There was an issue with the database.";
}

// Welcome the user (by name if they are logged in):
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    //pull name from database
    $query = "SELECT firstName FROM car_owners WHERE email = '$email';";
    $result = $pdo->query($query);
    $row = $result->fetch(PDO::FETCH_NUM);

	echo "<h1>Welcome, $row[0]! </h1>";
    ?>
    <a href="carSelection.php">
        <button class="carSelection">Vehicle Appraisal</button>
    </a>
<?php
}else {
    echo "<h1>Login or Register to Appraise your car";
}

// Include the HTML footer file:
include ('footer.php');
?>
