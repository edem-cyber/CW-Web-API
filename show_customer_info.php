
<?php
session_start();
include('db_connect.php');


if($_POST)
{
  $errors=array();

  $id=$_POST['c_id'];
  $_SESSION['cid']=$id;

  if(empty($id)) 
    {
      $errors['id_err']="Id can not be empty!!";
    }

  $sql="select * from customer where c_id='$id' ";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($result);

  if(!($rows>0))
  {
    $errors['not_exist']="Invalid customer ID!!!";
  }
  if(count($errors)==0) header("location:show_customer_info_table.php");
}


?>

<!DOCTYPE>
<html>
  <head>
    <title>Login_Form</title>
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>
    <form action="" method="post" >
      <p>
        <label for="c_id" > ID : </label>
        <input type="text" name="c_id" placeholder="Enter customer id..." ><br>
        <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
        <p><?php if(isset($errors['not_exist'])) echo $errors['not_exist']; ?></p>
      </p>
      <p>
        <input type="submit"  value="SEE DETAILS" >
       </p>
    </form>    
  </body>
</html>