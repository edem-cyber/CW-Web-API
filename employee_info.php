<?php
session_start();
include('db_connect.php');


if($_POST)
{
  $errors=array();

  $id=$_POST['e_id'];
  $_SESSION['eid']=$id;

  if(empty($id)) 
    {
      $errors['id_err']="Id can not be empty!!";
    }

  $sql="select * from employee where e_id='$id' ";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($result);


  if(!($rows>0))
  {
    $errors['not_exist']="Invalid employee ID!!!";
  }
  if(count($errors)==0) header("location:show_employee_info_table.php");
}
?>

<!DOCTYPE>
<html>
    <head>
      <title>Employee Details</title>
      <link href="styles.css" rel="stylesheet">
    </head>

    <body>
      <form action="" method="post" >
        <p>
          <label for="e_id" > ID : </label>
          <input type="text" name="e_id" placeholder="Enter employee id..." ><br>
          <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
        </p>

        <p>
          <input type="submit"  value="SEE DETAILS" >
        </p>
      </form>    
    </body>
</html>