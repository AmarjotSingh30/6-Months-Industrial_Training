<?php
echo "array in php";
// 3 types of array
// 1) index array
$arr=array('rahul',30,'khanna','87.03',85,62);
echo"<pre>";
print_r($arr);
echo $arr[1]."<br>";

// associative array
$assoc=array('fname'=>'rahul','lname'=>"kumar",'city'=>'khanna','marks'=> 89,'grade'=>'A');
print_r($assoc);
echo $assoc['lname']."<br>";


// multi-dimensional array
$multi=array(52,63,25,'name'=>array('rahul','ritu','ansh'),45.23,'hello');
print_r($multi);
echo $multi['name'][2];

?>