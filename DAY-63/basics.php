<?php
    //PRINT STATEMENTS
    //echo "Hello World<br>";
    echo "Amarjot Singh<br>";
    /*echo "PHP is Fun Language<br>";
    echo "Localhost<br>";*/

    // VARIABLE DECLARATION
    $num=89;
    // CONCATINATION
    echo "Value= ".$num."<br>";
    echo (78+89)."<br>";

    $x=10;
    $y=3;
    // Operators
    // 1)Arithmetic Operators(+,-,*,/,%)
    echo "Addition: ",($x+$y)."<br>";
    echo "Sub: ",($x-$y)."<br>";
    echo "Product: ",($x*$y)."<br>";
    echo "Div: ",($x/$y)."<br>";
    echo "Modulus: ",($x%$y)."<br>";

    // 2)Comparison Operators(<,>,<=,>=,==,!=)
    echo ($x < $y)."<br>";
    echo ($x > $y)."<br>";
    echo ($x <= $y)."<br>";
    echo ($x >= $y)."<br>";
    echo ($x == $y)."<br>";
    echo ($x != $y)."<br>";

    // 3)Comparison Operators(&&,||,!)
    echo ($x>10) && ($x>=$y);
    echo "x is greater"."<br>";

    echo ($x>10) || ($x>=$y);
    echo "x is greater"."<br>";

    echo !($x=$y);
    echo "x is greater"."<br>";

    // 4)Increment(++) and Decrement(--) Operators
        $x++;
        echo $x."<br>";

        $x--;
        echo $x."<br>";
    // 5)Assignment Operators(=,+=,-=,*=,/=,%=)
        $x+=$y;
        echo $x."<br>";

        $x-=$y;
        echo $x."<br>";

        $x*=$y;
        echo $x."<br>";

        $x/=$y;
        echo $x."<br>";

        $x%=$y;
        echo $x."<br>";

?>