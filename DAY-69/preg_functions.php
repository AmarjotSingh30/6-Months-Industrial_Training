<?php
    $validate="*";
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        if(empty($username)){
            $validate="username must be filled";
        }
        else if(strlen($username)<3){
            $validate="name is too short";
        }
        else if(preg_match('@[0-9]@',$username)){
            $validate="only alphabets are accepted";
        }
        else{
            echo "welcome".$username."<br>";
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
        <input type="text" name="username" placeholder="enter your name"><span><?php echo $validate ?></span><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>