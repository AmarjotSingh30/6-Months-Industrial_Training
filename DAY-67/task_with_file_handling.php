<?php
// task take user input through form and print table according to it  
 if(isset($_POST['generate'])){
    $num=$_POST['number'];
    echo"entered number are:".$num."<br>";
    for($i=1;$i<=10;$i++){
        echo $num."x".$i."=".($num*$i)."<br>";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Table generator</h1>
    <form action="" method="POST">
        <input type="number" name="number" placeholder="enter the value you want to print table of">
        <button value="generate" name="generate">Generate</button>
    </form>
</body>
</html>