<?php
    // array
    $arr=[33,"Hello",45.55,"Khanna",22];
    for($i=0;$i<5;$i++){
        echo $arr[$i]."<br>";
    }


    // task1:-sum of array elements
    $arr1=[1,2,3,4];
    $sum=0;
    for($i=0;$i<4;$i++){
        $sum+=$arr1[$i];
    }
    echo "sum of elements are:" .$sum."<br>";
    // task print table of array elements
    $arr2=[1,2,3,4];
    for($i=0;$i<4;$i++){
        for($j=1;$j<=10;$j++){
            echo $arr2[$i]."x".$j."=".$arr2[$i]*$j."<br>";
        }
    }
    // task print odd numbers that are bigger than 40
    $arr3=[41,50,61,70];
    for($i=0;$i<4;$i++){   
           if($arr3[$i]%2!==0 && $arr3[$i]>40){
            echo$arr3[$i]."<br>";
        }
        }
?>