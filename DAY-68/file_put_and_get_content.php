<?php
echo"put data into file and get data from a file<br>";
$data="hi";
file_put_contents('jerry.txt',$data);

if(file_exists("jerry.txt")){
    echo file_get_contents("jerry.txt");
}
else{
    echo"file does not exist";
}
?>