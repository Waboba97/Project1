<!-- End of Content -->
</div>

<div id="Menu">
<a href="index.php" title="Home Page">Home</a><br />
<?php 

// If the user is logged-in, show logout in the menu and change password links
if (isset($_SESSION['user_id'])) {

	echo '<a href="logout.php" title="Logout">Logout</a><br />
          <a href="change_password.php" title="Change Your Password">Change Password</a><br />';
} else { //  Not logged in.

	echo '<a href="Registration.html" title="Register for the Site">Register</a><br />
         <a href="ReturningUser.html" title="Login">Login</a><br />
         <a href="forgot_password.php" title="Password Retrieval">Retrieve Password</a><br />';
}
?>

</div>
</body>
</html>

