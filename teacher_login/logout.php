<?php
    session_start();
    include('../dbconn.php');
    // session_abort();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
?>
