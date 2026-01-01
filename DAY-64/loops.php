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

    //------ Task: Factorial-------
    $new_var1=3;
    $fact=1;
      // ----with do loop----
    do{
        $fact*=$new_var1;
        $new_var1--;
    }while($new_var1>=1);
    echo "factorial is ".$fact."<br>";
    // ----Task: Prime----
    $count=0;
    $num=2;
    // for loop
    for($i=1;$i<=$num;$i++){
        if($num%$i==0){
            $count++;
        }
    }
    if($count==2){
        echo"Prime<br>";
    }else{
        echo"composite<br>";
    }
    // ------Task: Sum of first ten natural numbers-------
        $sum=0;
        $new_var1=1;
        // with do while loop
        do{
            $sum+=$new_var1;
            $new_var1++;
        }while($new_var1<=10);
        echo "sum of first natural numbers are:".$sum."<br>";

    // ------Task: print even only between 551 to 678------
    // ----with do loop----
    $val=551;
    do{
            if($val%2==0){
                echo $val."<br>";
            }
            $val++;
    }while($val<=678);
?>
