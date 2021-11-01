
<?php
include('db_connect.php');
session_start();
$id=$_SESSION['e_id'];
$pass=$_SESSION['pass'];

$sql="update employee set e_pass=$pass where e_id='$id';";
$result=mysqli_query($con,$sql);
if($result)
 {
   echo "password successfully updated";
  }

?>
<link href="styles.css" rel="stylesheet">