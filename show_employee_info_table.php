<?php
include('db_connect.php');
session_start();

$id=$_SESSION['eid'];

	$sql="select * from employee where e_id='$id' ";
  	$result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    echo $row['e_id']."  ".$row['e_name'];

?>