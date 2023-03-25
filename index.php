<?php
// This is the main page for the site.

// Include the configuration file:
require_once ('config.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to RedBook';
include ('header.php');

// Welcome the user (by name if they are logged in):
if (isset($_SESSION['email'])) {
	$name = htmlspecialchars($_SESSION['email']);
	echo "<h1>Welcome, $name! </h1>";
    ?>
    <a href="carSelection.php">
        <button class="carSelection">Vehicle Appraisal</button>
    </a>
<?php
}else {
    echo "<h1>Login or Register to Appraise your car";
    ?>
    <a href="Registration.html">
        <button class="carSelection">Vehicle Appraisal</button>
    </a>
    <?php
}

// Include the HTML footer file:
include ('footer.php');
?>
