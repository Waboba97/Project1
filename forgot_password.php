<?php


$page_title = 'Forgot Your Password';
include ('header.php');
require_once 'mysql_connect.php';

$displayForm = True;


if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $getEmail = "SELECT email FROM car_owners WHERE email = '$email'";


    if ( !( $result = $pdo->query($getEmail) ) ) {
        echo "That email is not in the system!";
        $displayForm = True;
    } else {
        $hash = password_hash("Pass", PASSWORD_DEFAULT);
        $update = "UPDATE car_owners SET password='$hash' WHERE email='$email'";
        $stmt = $pdo->prepare($update);

        // execute the query
        $stmt->execute();
        echo "Your password for $email has been successfully updated to 'Pass'.";
        $displayForm = False;
        ?>
         <a href="returningUser.html" title="Login">Login</a><br />
         <?php
    }
}
if ($displayForm){ 
?>

<h1>Reset Your Password</h1>
<p>Enter your email address below and your password will be reset.</p> 
<form action="forgot_password.php" method="post">
	<fieldset>
		<div class="myRow">
			<label class="labelCol" for="email">Email Address</label>  
			<input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
		</div>

		<div class="mySubmit"><input type="submit" name="submit" value="Reset My Password" /></div>
	</fieldset>
</form>

<?php
}
include ('footer.php');
?>
