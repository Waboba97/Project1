<?php

    require_once ('config.php');
    $page_title = 'Change Your Password';
    include ('header.html');
    require_once "mysql_connect.php";


    $email = $_POST['email'];
    $pw = $_POST['password'];
    $getEmail = "SELECT email FROM car_owners";
    //$getPassword = 'SELECT password FROM car_owners';

    if ( !( $result = $pdo->query($getEmail) ) )
    {
        print( "<p>That email is not in the system!</p>" );
        die();
    } else {
        $getPassword = "UPDATE car_owners SET password=$pw WHERE email='$email'";
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
        echo "Your password for $email has been successfully updated to 'Pass'.";
    }

?>
<h1>Change Your Password</h1>
<p>Enter your email address below and your password will be changed.</p>
<form action="change_password.php" method="post">
    <fieldset>
        <div class="myRow">
            <label class="labelCol" for="email">Email Address</label>
            <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
        </div>

        <div class="mySubmit"><input type="submit" name="submit" value="Change My Password" /></div>
    </fieldset>
</form>

<?php
    include ('footer.html');
?>
