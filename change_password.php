<?php

    $page_title = 'Change Your Password';
    include ('header.html');
    require_once "mysql_connect.php";

    $displayForm = TRUE;


try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

    if ($_POST['submit']) {
        $email = $_POST['email'];
        $pw = $_POST['password'];
        //make sure password is more than 6 characters
        if (strlen($pw) < 6) {
            echo "Password must be at least 6 characters";

        } else {
            $pw = password_hash($pw, PASSWORD_DEFAULT);
            $query = "UPDATE car_owners SET password = '$pw' WHERE email = '$email';";
            $result = $pdo->query($query);
            if ($result) {
                echo "Password successfully changed.";
                $displayForm = FALSE;
            } else {
                echo "There was an issue with the database.";
            }
        }
        $getEmail = "SELECT email FROM car_owners WHERE email = '$email';";
        //$getPassword = 'SELECT password FROM car_owners';


        try {
            //check if email exists
            $result = $pdo->query($getEmail);


        } catch (PDOException $e) {
            print("<p>That email is not in the system!</p>");
            die();
        }
    }
    if ($displayForm){
?>
<h1>Change Your Password</h1>
<p>Enter your email address below and your password will be changed.</p>
<form action="change_password.php" method="post">
    <fieldset>
        <div class="myRow">
            <label class="labelCol" for="email">Email Address</label>
            <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
        </div>
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
    include ('footer.html');
?>
