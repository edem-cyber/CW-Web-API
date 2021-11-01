<?php
include('db_connect.php');
session_start();

$id=$_SESSION['cid'];

$sql="select * from customer where c_id='$id' ";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);
echo $row['c_id']."  ".$row['c_name']." ".$row['c_balance'];

?>