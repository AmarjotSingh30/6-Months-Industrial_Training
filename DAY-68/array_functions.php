<?php
echo"array function in php<br>";
$arr=array(103,104,105,106,107,108,109);
$arr1=array(113,114,115,116,117,118,119,120);
echo"<pre>";
print_r($arr);

// remove from first
array_shift($arr);
print_r($arr);

// add at first
array_unshift($arr,102);
print_r($arr);

// remove from last
array_pop($arr);
print_r($arr);

// insert at last
array_push($arr);
print_r($arr);

// size of array
echo"size of array is:".count($arr)."<br>";

// sum of array
echo"sum of value is:".array_sum($arr)."<br>";

// 
print_r(array_unique($arr));

// merge two array
print_r(array_merge($arr,$arr1));

// diff two array
print_r(array_diff($arr,$arr1));

print_r(array_unique(array_merge($arr,$arr1)));

$elt=4;
// insert 4 at position 3 (index2)
array_splice($arr,2,0,$elt);

?>