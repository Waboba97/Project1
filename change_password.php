<?php

$page_title = 'Change Your Password';
include ('header.php');
require_once "mysql_connect.php";

$displayForm = TRUE;


try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_POST['submit']) {
    $email = $_SESSION['email'];
    $pw = $_POST['password'];
    //make sure password is more than 6 characters
    if (strlen($pw) < 6) {
        echo "Password must be at least 6 characters";

    } else {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $query = "UPDATE car_owners SET password = '$pw' WHERE email = '$email';";
        $result = $pdo->query($query);
        if ($result) {
            echo "Password successfully changed, redirecting to home page.";
            $displayForm = FALSE;
            header("refresh: 2; url=index.php");
        } else {
            echo "There was an issue with the database.";
        }
    }
}
if ($displayForm){
    ?>
    <h1>Change Your Password</h1>
    <p>Enter your password below and it will be changed.</p>
    <form action="change_password.php" method="post">
        <fieldset>
            <div class = "myRow">
                <label class = "labelCol" for ="password">Password</label>
                <input type = "password" name ="password">
            </div>

            <div class="mySubmit"><input type="submit" name="submit" value="Change My Password" /></div>
            <button type = "submit" formaction="ReturningUser.html">Login</button>
        </fieldset>
    </form>

    <?php
}
include ('footer.php');
?>
