 <?php
    if(isset($_POST['login'])){ 
        $name=$_POST['username'];
        $pass=$_POST['password'];
        echo "Name: ".$name."<br>";
        echo "Password: ".$pass."<br>";
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
    <h1>Login Form</h1>
    <!-- form action -->
    <form action="" method="POST">
    <!-- form action -->
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" value="login" name="login">
    </form>
    <a href="fetch.php?item=laptop">Click Me</a>
</body>
</html>