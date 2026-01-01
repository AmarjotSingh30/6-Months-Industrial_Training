<?php
// 1) simple functions
function demo()
{
    echo "Hello World<br>";
}
// Simple function
function add()
{
    $x = 45;
    $y = 89;
    echo "Addition: " . ($x + $y) . "<br>";
}
// argument function
function multi($x, $y)
{
    echo "Multiplication: " . ($x * $y) . "<br>";
}
// 3) return type function
function sub($x, $y)
{
    return $x - $y;
}
demo();
demo();
echo "Subtraction: " . sub(13, 5) . "<br>";
multi(34, 55);
add();
demo();
multi(22, 88);
add();
demo();

// task find prime and composite with return and aargument type functions
//----argument function----
function number($a)
{
    //for loop
    $count = 0;
    for ($i = 1; $i <= $a; $i++) {
        if ($a % $i == 0) {
            $count++;
        }
    }
    if ($count == 2) {
        echo "Prime<br>";
    } else {
        echo "composite<br>";
    }
}
number(5);

// 3)----return type function----
function number1($b)
{

    $count = 0;
    for ($i = 1; $i <= $b; $i++) {
        if ($b % $i == 0) {
            $count++;
        }
    }
    return $count;
}

$dd = number1(27);
if ($dd == 2) {
    echo "Prime<br>";
} else {
    echo "composite<br>";
}

// global variable:- variables that are outside the functions still can be used inside
$b=89;
function sum($a){
    echo "Addition: ".($a+$GLOBALS['b'])."<br>";
}
sum(34);

// super variables
echo "<pre>";
print_r($_SERVER);
echo $_SERVER['HTTP_HOST']."<br>";
echo "</pre>";