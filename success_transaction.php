<?php

session_start();
include('db_connect.php');
$customer=$_SESSION['cus'];
$limit=$_SESSION['lim'];


$sql="select * from transaction where c_id='$customer' order by id desc limit $limit ";
$result=mysqli_query($con,$sql);
$rows=mysqli_num_rows($result);

while( $userrow = mysqli_fetch_array($result) )
    {
       echo $userrow['c_id']." "; 
       echo $userrow['type']."  "; 
       echo $userrow['amount']."  ";
       echo $userrow['to_id']." "; 
       echo $userrow['e_id']; 
       echo "<br>";
    } 
?>
<link href="styles.css" rel="stylesheet">