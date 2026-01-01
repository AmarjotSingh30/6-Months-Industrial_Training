<?php
include 'config.php';
$emp_id = $_GET['id'];
$qry = mysqli_query($conn, "SELECT * FROM form WHERE id='$emp_id'");
// $qry=mysqli_query($conn,"UPDATE form SET is_deleted=1 WHERE id='$emp_id'");

// adding updated value into table
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
// adding updated value into table
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1 style="text-align: center;margin-top:100px;">UPDATE REGISTRATION FORM</h1>
        <?php
            while ($data = mysqli_fetch_assoc($qry)) {
        ?>
            <form action="" method="POST">
                <label>Name </label>
                <input type="text" name="name" placeholder="Enter name" value="<?php echo $data['name'] ?>"><br><br>

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" value="<?php echo $data['email'] ?>"><br><br>

                <label>Password </label>
                <input type="password" name="password" placeholder="Enter password" value="<?php echo $data['password'] ?>"><br><br>

                <label>Contact </label>
                <input type="number" name="number" placeholder="Enter contact" value="<?php echo $data['phone_no'] ?>"><br><br>

                <label>City</label>
                <select name="city">
                    <!-- php code for fetching select option -->
                    <option value="Khanna" Required 
                    <?php
                        if($data['city'] == "Khanna"){
                            echo "selected=true";
                        }
                    ?>
                    
                    >Khanna</option>
                    <option value="Ludhiana" Required 
                    <?php
                        if($data['city'] == "Ludhiana"){
                            echo "selected=true";
                        }
                    ?> >Ludhiana</option>
                    <option value="New Delhi" Required 
                    <?php
                        if($data['city'] == "New Delhi"){
                            echo "selected=true";
                        }
                    ?>>New Delhi</option>
                    <!-- php code for fetching select option -->
                </select><br><br>

                <label>Gender</label>
                <input type="radio" name="gender" value="male" Required
                <?php
                 if($data['gender'] == "male"){
                            echo "checked=true";
                        } 
                ?>>Male
                <input type="radio" name="gender" value="female" Required
                <?php
                 if($data['gender'] == "female"){
                            echo "checked=true";
                        } 
                ?>>Female<br><br>

                <label>Hobbies</label>
                <input type="checkbox" name="hobbies" value="cricket" Required 
                <?php
                 if($data['hobbies'] == "cricket"){
                            echo "checked=true";
                        }
                ?>>Cricket
                <input type="checkbox" name="hobbies" value="writing" required
                <?php
                 if($data['hobbies'] == "writing"){
                            echo "checked=true";
                        }
                ?>>Writing
                <input type="checkbox" name="hobbies" value="reading"Required
                <?php
                 if($data['hobbies'] == "reading"){
                            echo "checked=true";
                        }
                ?>>Reading
                <input type="checkbox" name="hobbies" value="coding" required
                <?php
                 if($data['hobbies'] == "coding"){
                            echo "checked=true";
                        }
                ?>>Coding<br><br>
                <label>Comment</label><textarea rows="10" cols="20" placeholder="Message" name="comment"><?php echo $data['comment'] ?></textarea><br><br>
                <input type="submit" name="submit" required
            </form>
        <?php
        }
        ?>
    </center>
</body>

</html>