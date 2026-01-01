<?php
echo"date and time function in php";
date_default_timezone_set('ASIA/KOLKATA');
echo date('Y-m-d h:i:sa')."<br>";
// Y-year(2025), y-year(23)
// M-month(sep),m-month(09),F-month(decemeber)
// d-date(01)
// D-dayname(fri),l-f=dayname(friday)
// H-24 hour format,h-12 hour format,i-minutes,s-second,A-AM/PM,a-am/pm


$mt=mktime(2023,9,3,10,12,2026);
echo date('Y-m-d H:i:s',$mt)."<br>";

$d=mktime(23,23,56,3,23,56);
echo date('H-i-s a M/d/y l',$d)."<br>";
?>