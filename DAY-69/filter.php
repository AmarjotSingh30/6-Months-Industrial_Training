<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $birth=$_POST['birth'];
    $url=$_POST['url'];
    $ipadd=$_POST['ipadd'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo"<script>alert('pattern mismatch for email')</script>";
    }
    elseif(!filter_var($birth,FILTER_VALIDATE_INT)){
        echo"<script>alert('pattern mismatch for birthday')</script>";
    }
     elseif(!filter_var($url,FILTER_VALIDATE_URL)){
        echo"<script>alert('pattern mismatch for url')</script>";
    }
     elseif(!filter_var($ipadd,FILTER_VALIDATE_IP)){
        echo"<script>alert('pattern mismatch for IP ADDRESS')</script>";
    }
    else{
        echo"validate credentials";
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
        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            outline: none;
            font-family: arial;
            background-color: #e3ecec
        }
        input{
            border: 1px solid orange;
            border-radius:3px;
            height: 4vh;
        }
        th{
            text-align: left;
            color: orange;
        }
        .btn{
            width: 100%;
            height: 4vh;
            border: none;
            background-color: orange;
            color: white;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <center>
        <table cellpadding="10" cellspacing="10">
        <tr><th>Email</th></td><input type="text" name="email"></td></tr>
        <tr><th>Birthday</th></td><input type="text" name="birth"></td></tr>
        <tr><th>URL</th></td><input type="text" name="url"></td></tr>
        <tr><th>IP ADDRESS</th></td><input type="text" name="ipadd"></td></tr>
        <tr><th colspan="2"><input type="submit" name="submit" value="VALIDATE" class="btn"></td></tr>
        </table>
        </center>
    </form>
</body>
</html>