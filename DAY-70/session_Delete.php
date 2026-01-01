<?php
    session_start();
    // session_destroy();
    // session_unset();
    unset($_SESSION['email']);
    echo "Session Destroyed";
?>