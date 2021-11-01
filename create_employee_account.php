
<?php
include('db_connect.php');
session_start();

if($_POST)
{
  $errors=array();

  $id=$_POST['e_id'];
  $pass=$_POST['e_pass'];
  $name=$_POST['e_name'];
  if(empty($id))$errors['id_err']="Id can't be empty!!";
  if(empty($name))$errors['name_err']="name filed can't be empty!!";
  if(empty($pass))$errors['pass_err']="pass can't be empty!!";
 

  $sql="select * from employee where e_id='$id' ";
  $result=mysqli_query($con,$sql);
  $row=mysqli_num_rows($result);


  if(!($row>0))
  {
    $sql1="insert into employee (e_id,e_name,e_pass) values('$id','$name',$pass)";
    $result1=mysqli_query($con,$sql1);
  }
  else 
  {
    $errors['id_exist']="can't give this id ...choose another id!!!";
  }

  if(count($errors)==0) header("location:success_create_employee_account.php");
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
  
          <legend>create employee form</legend>
            <p>
              <label for="e_id" > ID : </label>
              <input type="text" name="e_id" placeholder="Enter  id here..." ><br>
              <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
              <p><?php if(isset($errors['id_exist'])) echo $errors['id_exist']; ?></p>
            </p>
            <p>
              <label for="e_name" > Name : </label>
              <input type="text" name="e_name" placeholder="Enter  name here..." ><br>
              <p><?php if(isset($errors['name_err'])) echo $errors['name_err']; ?></p>
            </p>
            <p>
              <label for="e_pass" > Password : </label>
              <input type="password" name="e_pass" placeholder="Enter  password here..." ><br>
              <p><?php if(isset($errors['pass_err'])) echo $errors['pass_err']; ?></p>
            </p>
            <p>
              <input type="submit"  value="create employee" >
            </p>

      </form>
    </body>
</html>