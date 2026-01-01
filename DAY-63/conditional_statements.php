<?php
    /*
    Conditional Statements
    1)if Statement
    2)if-else Statement
    3)if-else if-else Statement
    4)Nested if-else Statement
    5)Switch case Statement
    // task :- create calculator
    */

    // 1)if Statement

use PgSql\Lob;

    $num=56;
    if($num < 70){
        echo "Smaller<br>";
    }else{
        echo "Greater<br>";
    }

    // 2)if-else Statement
    // task :- even number
    $var=12;
    if($var%2==0){
        echo "given number is even<br>";
    }
    else{
        echo "given number is odd";
    }

    // 3)if-else if-else Statement
    // task :- student grading system
    $eng=90;
    $math=80;
    $sci=70;
    $hin=90;
    $pun=90;
    $total=$eng+$math+$sci+$hin+$pun;
    echo "total:".$total."<br>";
    $avg=$total/5;
    echo "avg:".$avg."<br>";
    if($avg>=90){
        echo "grade A<br>";
    }
    else if($avg>=80){
        echo "grade B<br>";
    }
    else if($avg>=70){
        echo "grade c<br>";
    }
    else if($avg>=60){
        echo "grade d<br>";
    }
    else if($avg>=50){
        echo "pass<br>";
    }
    else{
        echo "failing marks<br>";
    }

    //   4)Nested if-else Statement
    // task :- find smallest number out of 4 variables 
    $var1=1;
    $var2=2;
    $var3=4;
    if($var1<$var2){
        if($var1<$var3){
            echo "var1 is smallest<br>";
        }else{
            echo "var 3 is smallest<br>";
        }
    }else{
        if($var2<$var3){
            echo "var 2 is smallest<br>";
        }else{
            echo "var 3 is smallest<br>";
        }
    }

    // 5)Switch case Statement
    // task :- create calculator
    $new_var1=10;
    $new_var2=20;
    $choice=3;
    switch($choice){
        case 1:
            echo $new_var1+$new_var2;
            break;
        case 2:
            echo $new_var1-$new_var2;
            break;

        case 3:
            echo $new_var1*$new_var2;
            break;

        case 4:
            echo $new_var1/$new_var2;
            break;

        case 5:
            echo $new_var1%$new_var2;
            break;
    }   
?>