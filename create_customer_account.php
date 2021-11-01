
<?php
include('db_connect.php');
session_start();

if($_POST)
{
  $errors=array();

  $id=$_POST['c_id'];
  $name=$_POST['c_name'];
  if(empty($id))$errors['id_err']="Id can't be empty!!";
  if(empty($name))$errors['name_err']="name can't be empty!!";
 

  $sql="select * from customer where c_id='$id' ";
  $result=mysqli_query($con,$sql);
  $row=mysqli_num_rows($result);


  if(!($row>0))
  {
    $sql1="insert into customer (c_id,c_name,c_balance) values('$id','$name',500.00)";
    $result1=mysqli_query($con,$sql1);
    
    
  }
  else 
  {
    $errors['id_exist']="can't give this id ...choose another id!!!";
    
  }


  if(count($errors)==0) header("location:success_create_account.php");
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

          <legend>create account form</legend>
            <p>
              <label for="c_id" > ID : </label>
              <input type="text" name="c_id" placeholder="Enter  id..." ><br>
              <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
              <p><?php if(isset($errors['id_exist'])) echo $errors['id_exist']; ?></p>
            </p>
            <p>
              <label for="c_name" > Name : </label>
              <input type="text" name="c_name" placeholder="Enter  name..." ><br>
              <p><?php if(isset($errors['name_err'])) echo $errors['name_err']; ?></p>
            </p>
            <p>
              <input type="submit"  value="create account" >
            </p>

      </form>
    </body>
</html>