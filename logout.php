<?php
    include "header.php";
    include "footer.php";

    //log out the user
    session_start();
    session_destroy();
    header("Location: index.php");


?>
