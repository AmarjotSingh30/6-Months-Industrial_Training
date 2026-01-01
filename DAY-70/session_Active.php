<?php
    session_start();
    echo "Username: ".$_SESSION["name"]."<br>";
    echo "Email: ".$_SESSION["email"]."<br>";

?>