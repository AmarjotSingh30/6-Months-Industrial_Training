<?php
// 
    $validate="*";
    $a=array(141401,141402,141403,141404);
    if(isset($_POST['submit'])){
        $pin=$_POST['pin'];

        echo $pin;
        if($pin==''){
            $validate="pincode must be filled";
        }
        else if(strlen($pin)<6){
            $validate="pincode must be 6 chracter long";
        }
        else if(!in_array($pin,$a)){
            $validate="does not match";
        }
        else{
            echo "you entered".$pin."<br>";
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
    <h1>CHECK PIN NUMBER</h1>
    <form action="" method="POST">
        <input type="number" placeholder="enter the pin no" name="pin"><span><?php echo $validate ?></span><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>