<?php
    setcookie('name','rahul',time()+180);
    if(!isset($_COOKIE['name'])){
        echo"cookie is not";
    }
    else{
        echo $_COOKIE['name'];
    }
    echo "<pre>";
    print_r($_COOKIE);
?>