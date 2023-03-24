<?php
//pull values from Registration.html

require_once 'dblogin.php';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_POST['Submit'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

//check if the passwords match
    if ($password != $passwordConfirm) {
        $passwordError = "Passwords do not match!";
    }

    function validateEmail($email)
    {
        if (empty($email))
            return "Must Enter your email!";
        else if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email))
            //email format: the regular email but it also accepts firstname.lastname@aaa.bbb.com
            return "Invalid email!";
    }

    //if the email is valid, check if it is already in the database
    if (validateEmail($email) == null) {
        $sql = "SELECT * FROM car_owners WHERE email = '$email'";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            $emailError = "Email already exists!";
        }
    }

    //if there are no errors, insert the data into the database
    if ($passwordError == null && $emailError == null) {
        $sql = "INSERT INTO car_owners (firstName, lastName, email, password) VALUES ('$fName', '$lName', '$email', '$password')";
        if ($pdo->exec($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: ";
        }
    }

}
?>