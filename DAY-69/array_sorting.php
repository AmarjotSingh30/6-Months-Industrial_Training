<?php
echo"array sorting in php<br>Two types of sorting:-<br>1)ascending order 2) descending order";
$arr=array('hello','jerry','BCA',30,'khanna');
echo"<pre>";
print_r($arr);

// index array sorting
// ascending order
sort($arr);
print_r($arr);

// descending order
rsort($arr);
print_r($arr);


// associative array sorting
$assoc=array('fname'=>'jerry','class'=>'BCA','city'=>'khanna','marks'=>90.10);
print_r($assoc);

// asc order according to values
asort($assoc);
print_r($assoc);

// dsc order according to values
arsort($assoc);
print_r($assoc);

// asc order according to keys
ksort($assoc);
print_r($assoc);

// dsc order according to keys
krsort($assoc);
print_r($assoc);
?>