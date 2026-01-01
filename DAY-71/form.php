<?php
    include 'config.php';
    // storing input as variables
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phno=$_POST['number'];
        $city=$_POST['city'];
        $gender=$_POST['gender'];
        $hobbies=$_POST['hobbies'];
        $comment=$_POST['comment'];
        // storing input as variables

        // adding into mysql table
        mysqli_query($conn,"INSERT INTO form(name,email,password,phone_no,city,gender,hobbies,comment) VALUES('$name','$email','$password','$phno','$city','$gender','$hobbies','$comment')");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar{
            width: 100%;
            height: 10%;
            border: 2px solid black;
            background-color: orange;
            text-align: center;
            align-content: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <button>INSERT</button>
        <button>DELETE</button>
        <button>EDIT</button>
        <button>VIEW ALL</button>
    </div>
        <h1 style="text-align: center;margin-top:100px;">REGISTRATION FORM</h1>
        <center>
	<form action="" method="POST">
		<label>Name </label>
        <input type="text" name="name" placeholder="Enter name"><br><br>

		<label>Email</label>
        <input type="email" name="email" placeholder="Enter email"><br><br>

		<label>Password </label>
        <input type="password" name="password" placeholder="Enter password"><br><br>

		<label>Contact </label>
        <input type="number" name="number" placeholder="Enter contact"><br><br>

		<label>City</label>
		<select name="city">
			<option>Khanna</option>
			<option>Ludhiana</option>
			<option>New Delhi</option>
		</select><br><br>

		<label>Gender</label>
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female<br><br>

		<label>Hobbies</label>
		<input type="checkbox" name="hobbies" value="cricket">Cricket
		<input type="checkbox" name="hobbies"value="writing">Writing
		<input type="checkbox" name="hobbies"value="reading">Reading
		<input type="checkbox" name="hobbies" value="coding">Coding<br><br>

        <label>Comment</label><textarea rows="10" cols="20" placeholder="Message" name="comment"></textarea><br><br>

		<input type="submit" name="submit">
		
    </form>
        </center>
</body>
</html>