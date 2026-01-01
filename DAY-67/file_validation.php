<?php
// taking a variable
    $nErr="*";
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        // if empty
        if(empty($username)){
            $nErr="Required";
        }
        // if length not equal to
        else if(strlen($username) < 3){
            $nErr="invalid name";
        }
        // if all correct
        else{
            echo "Name: ".$username."<br>";
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
    <form action="" method="POST">
        <input type="text"  name="username"><span><?php echo $nErr ?></span><br><br>
        <input type="submit" name="login">
    </form>
</body>
</html>