<?php
    session_start();
    include('..\dbconn.php');
    session_unset();
    session_destroy();
    header("Location: ..\index.php");
    exit();

?>