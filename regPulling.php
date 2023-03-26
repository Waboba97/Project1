

<?php
//pull values from Registration.html
require_once 'mysql_connect.php';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_POST['query'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

//check if the passwords match
    //if password is less than 6 characters
    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters";
        $passwordError = true;
    } else {
        if ($password == $passwordConfirm) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO car_owners (first_name, last_name, email, password) VALUES ('$fName', '$lName', '$email', '$password');";
            $result = $pdo->query($query);
        } else {
            echo "Passwords do not match.";
            $passwordError = true;
        }
    }

    if (empty($email))
        echo "Must Enter your email!";
    else if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email))
        //email format: the regular email but it also accepts firstname.lastname@aaa.bbb.com
        echo "Invalid email!";
    else
        $sql = "SELECT * FROM car_owners WHERE email = '$email'";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            $emailError = "Email already exists!";
            echo $emailError;
        }


    //if there are no errors, insert the data into the database
    if ($passwordError == null && $emailError == null) {
        //hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO car_owners (firstName, lastName, email, password) VALUES ('{$fName}', '{$lName}', '{$email}', '{$hash}')";
        if ($pdo->exec($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: ";
        }
    }
}

?>

