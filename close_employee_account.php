<?php
session_start();
include('db_connect.php');


if($_POST)
{
  $errors=array();

  $id=$_POST['e_id'];
  if(empty($id))
  {
    $errors['id_err']="Id can't be empty!!";
  }
  
  $sql="select * from employee where e_id='$id' ";
  $result=mysqli_query($con,$sql);
  $row=mysqli_num_rows($result);


  if($row>0)
  {
    $sql1="delete  from employee where e_id='$id'";
    $result1=mysqli_query($con,$sql1);
    if($result1)
    {
      header("location:success_employee_close.php");
    }
    
  }
  else 
  {
    $errors['not_exist']="Invalid employee id!!";
  }
}
?>

<!DOCTYPE>
<html>
  <head>
    <title>CLOSE ACCOUNT</title>
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>
   <form action="" method="post" >

        <legend>Closing Employee Account form</legend>
          <p>
            <label for="e_id" > ID : </label>
            <input type="text" name="e_id" placeholder="Enter employee  id..." ><br>
            <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
            <p><?php if(isset($errors['not_exist'])) echo $errors['not_exist']; ?></p>
          </p>
          <p>
           <input type="submit"  value="Close Account" >
          </p>
  
    </form>    
  </body>
</html>