<?php
    $i=1;
    // do loop
    do{
        echo $i."<br>";
        $i++;
    }while($i<=10);
    echo "<br>----------------------------<br>";

    $i=1;
    // while loop
    while($i<=10){
        echo $i."<br>";
        $i++;
    }
    echo "<br>----------------------------<br>";

    // for loop
    for($i=1;$i<=10;$i++){
        echo $i."<br>";
    }

    // Task: Table
    $table=10;
    $i=1;
    // ----with do loop----
    // do{
    //     echo $table."x".$i."=".$table*$i."<br>";
    //     $i++;
    // }while($i<=10);

    //----while loop----
    // while($i<=10){
    //     echo $table."x".$i."=".$table*$i."<br>";
    //     $i++;
    // }

     // with for loop
    for($i=1;$i<=10;$i++){
        echo $table."x".$i."=".$table*$i."<br>";
    }

    // Task: Factorial
    $new_var1=3;
    $fact=1;
      // ----with do loop----
    do{
        $fact*=$new_var1;
        $new_var1--;
    }while($new_var1>=1);
    echo "factorial is ".$fact;
    // Task: Prime
    // ----with do loop----
    do{
        $fact*=$new_var1;
        $new_var1--;
    }while($new_var1>=1);
    echo "factorial is ".$fact;
    // Task: Sum of first ten natural numbers
    // Task: print even only between 551 to 678
    // ----with do loop----
    $val=551;
    do{
        $val%2==0;
    }while($val<=678);
    echo $val;
?>
