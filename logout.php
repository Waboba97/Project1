<?php

    require 'footer.php';

    function destroy_session_and_data()
    {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }

    //echo "<a href='home.php'>click here</a> to log in.";

    header("Location: index.php");

?>
