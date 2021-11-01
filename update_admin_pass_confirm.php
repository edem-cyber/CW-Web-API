
<?php
include('db_connect.php');
session_start();
$id=$_SESSION['a_id'];
$pass=$_SESSION['pass'];

$sql="update admin set a_pass=$pass where a_id='$id';";
$result=mysqli_query($con,$sql);
if($result)
  {
	echo "password successfully updated";
  }

?>
<link href="styles.css" rel="stylesheet">