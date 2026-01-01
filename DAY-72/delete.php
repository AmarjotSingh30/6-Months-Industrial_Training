<?php
    include 'config.php';
    $emp_id=$_GET['id'];
    $qry=mysqli_query($conn,"UPDATE form SET is_deleted=1 WHERE id='$emp_id'");
    header("Location: viewall.php");
?>