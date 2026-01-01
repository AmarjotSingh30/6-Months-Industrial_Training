<?php
if (isset($_POST['submit'])){
    $count=count($_FILES['img']['name']);
    echo"count:".$count;
    for($i=0;$i<$count;$i++){
        $img=$_FILES['img']['name'][$i];
        $img1=$_FILES['img']['tmp_name'][$i];
        $path="img/".$img;
        if(move_uploaded_file($img1,$path)){
            echo "file uploaded";
        }
        else{
            echo"unable to upload file";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>
<body>
    <form method="Post" enctype="multipart/form-data">
        <label>Choose file</label>
        <input type="file" multiple name="img[]"><br>
        <input class="inpsub"type="submit" name="submit">
    </form>
</body>
</html>