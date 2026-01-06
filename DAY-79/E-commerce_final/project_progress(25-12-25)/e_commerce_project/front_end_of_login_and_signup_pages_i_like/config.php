<?php
    //---connected to mysql---- 
    $serverName="localhost";
    $username="root";
    $password="";
    $database="viona";
    $conn=mysqli_connect($serverName,$username,$password,$database,);
    if(!$conn){
        echo "not connected";
    }
    //---connected to mysql---- 
?>