<?php
echo"string function in php<br>";
$str="Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum similique iusto ab mollitia fugiat facilis, delectus beatae quasi enim, odit pariatur molestias minima sunt libero autem, fuga nemo laboriosam. Ducimus!";
// string lenth
echo strlen($str)."<br>";

// word count
echo str_word_count($str)."<br>";

// string reverse
echo strrev($str)."<br>";

// string in upper case
echo strtoupper($str)."<br>";

// string to lower case
echo strtolower($str)."<br>";

// setting only first word of string to capital
echo ucfirst($str)."<br>";

// setting only last word of string to capital
echo lcfirst($str)."<br>";

//upper case
echo ucwords($str)."<br>";

// position start with 0 index
echo substr($str,0,11)."<br>";

// repeat the string 
echo str_repeat($str,5)."<br>";

// setting only first word of string to capital
echo str_replace("b","B",$str)."<br>";

// shuffle a string
echo str_shuffle($str)."<br>";

// string position
echo strpos($str,"e")."<br>";

$s=(strlen($str)>20)?"string is greater":"string is smaller";
echo $s;
?>