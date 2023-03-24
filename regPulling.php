<?php
//pull values from Registration.html

require_once 'dblogin.php';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//create a universal callable back button


if(isset($_POST['query'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

//check if the passwords match
    if ($password != $passwordConfirm) {
        $passwordError = "Passwords do not match!";
        echo $passwordError;
        //back button
        echo "<form action='Registration.html' method='post'>";
        echo "<input type='submit' value='Back'>";
    }

    if (empty($email)) {
        echo "Must Enter your email!";
        echo "<form action='Registration.html' method='post'>";
        echo "<input type='submit' value='Back'>";
    }

    else if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email)) {
        //email format: the regular email but it also accepts firstname.lastname@aaa.bbb.com
        echo "Invalid email!";
        echo "<form action='Registration.html' method='post'>";
        echo "<input type='submit' value='Back'>";
    }
    else
        $sql = "SELECT * FROM car_owners WHERE email = '$email'";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            $emailError = "Email already exists!";
            echo $emailError;
            echo "<form action='Registration.html' method='post'>";
            echo "<input type='submit' value='Back'>";
            echo "<form action='ReturningUser.html' method='post'>";
            echo "<input type='submit' value='Login'>";

        }


    //if there are no errors, insert the data into the database
    if ($passwordError == null && $emailError == null) {
        //hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO car_owners (firstName, lastName, email, password) VALUES ('{$fName}', '{$lName}', '{$email}', '{$hash}')";
        if ($pdo->exec($sql)) {
            echo "New record created successfully";
            echo "<form action='ReturningUser.html' method='post'>";
            echo "<input type='submit' value='Login'>";
        } else {
            echo "Error: ";
            echo "<form action='Registration.html' method='post'>";
            echo "<input type='submit' value='Back'>";
        }

    }

}

?>