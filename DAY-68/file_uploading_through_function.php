<?php
if (isset($_POST['submit'])){
    // what we fetching here is [name,full_path,type,tmp_name,error,size]
    $imgName=$_FILES['imgUpld']['name'];
    $imgTemp=$_FILES['imgUpld']['tmp_name'];
    // to pefix name before img name
    $newFileName="My file".$imgName;
    $path="img/".$newFileName;
    if(move_uploaded_file($imgTemp,$path)){
        echo "file has been uploaded";
    }
    else{
        echo"unable to upload";
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
        <input type="file" name="imgUpld"><br>
        <input class="inpsub"type="submit" name="submit">
    </form>
</body>
</html>