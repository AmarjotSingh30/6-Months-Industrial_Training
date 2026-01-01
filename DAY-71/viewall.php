<?php
    include 'config.php';
    $qry=mysqli_query($conn,"SELECT * FROM form");
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
    </style>
</head>
<body>
   
    <table border="1" cellspacing="10" cellpadding="10" bgcolor="skyblue" width="100%" height="50%">
		<tr>
			<th bgcolor="red">Name</th>
			<th>City</th>
			<th>Class</th>
            <th>Action</th>
		</tr>
        <?php
            while($data=mysqli_fetch_assoc($qry)){
        ?> 
		<tr>
			<td bgcolor="yellow"><?php echo $data['name'] ?></td>
			<td><?php echo $data['city'] ?></td>
			<td><?php echo $data['hobbies'] ?></td>
            <td><a href="update.php?id=<?php echo $data['id'] ?>">Edit</a> <a href="delete.php?id=<?php echo $data['id'] ?>">Delete</a></td>
		</tr>
        <?php
            }
        ?>
	</table>
</body>
</html>