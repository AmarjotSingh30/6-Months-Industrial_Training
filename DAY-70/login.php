<?php
    session_start();
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if($username == "amar@gmail.com" && $password == 1234){
            $_SESSION['name']="Amarjot Singh";
            header("Location: fetch.php");
        }else{
            echo "Invalid User";
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
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter email"><br><br>
        <input type="text" name="password" placeholder="Enter password"><br><br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>