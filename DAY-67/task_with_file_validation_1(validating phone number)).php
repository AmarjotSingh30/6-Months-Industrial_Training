<?php
    $validate="*";
    if(isset($_POST['submit'])){
        $phone=$_POST['phone'];
        if(empty($phone)){
            $validate="Required";
        }
        else if(strlen($phone)<10){
            $validate="invalid number";
        }
        else{
            echo "phone:".$phone."<br>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
    <h1>CHECK PHONE NUMBER</h1>
    <form action="" method="POST">
        <input type="number" placeholder="enter the phone no" name="phone"><span><?php echo $validate ?></span><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>