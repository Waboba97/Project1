<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];



}


function validateEmail($email) {
    if (empty($email))
        return "Must Enter your email!";
    else if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email))
        //email format: the regular email but it also accepts firstname.lastname@aaa.bbb.com
        return "Invalid email!";
}
?>