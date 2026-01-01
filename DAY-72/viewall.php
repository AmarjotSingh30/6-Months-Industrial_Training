<?php
    include 'config.php';
    $qry=mysqli_query($conn,"SELECT * FROM form WHERE is_deleted=0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
     }
     img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
     }
    </style>
</head>
<body>
   <h1 style="text-align: center;margin-bottom:10px;">Details</h1>
    <table border="1" cellspacing="10" cellpadding="10"  width="100%" height="50%">
		<tr>
			<th>Name</th>
            <th>email</th>
            <th>phone_no</th>
			<th>City</th>
            <th>image</th>
            <th>gender</th>
			<th>hobbies</th>
            <th>Action</th>
		</tr>
        <?php
            while($data=mysqli_fetch_assoc($qry)){
        ?> 
		<tr>
			<td><?php echo $data['name'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['phone_no'] ?></td>
			<td><?php echo $data['city'] ?></td>
            <td><img src="img/<?php echo $data['image'] ?>"></td>
            <td><?php echo $data['gender'] ?></td>
			<td><?php echo $data['hobbies'] ?></td>
            <td><a href="update.php?id=<?php echo $data['id'] ?>">Edit</a> <a href="delete.php?id=<?php echo $data['id'] ?>">Delete</a></td>
		</tr>
        <?php
            }
        ?>
	</table>
</body>
</html>