
<?php
include('db_connect.php');
session_start();

if($_POST)
{
  $errors=array();

  $id=$_POST['a_id'];
  $password=$_POST['a_pass'];
  if(empty($id))$errors['id_err']="Id can't be empty!!";
  if(empty($password))$errors['pass_err']="password can't be empty!!";

  $sql="select * from admin where a_id='$id' and a_pass=$password";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($result);

  if($rows>0)
  {
    $_SESSION['a_id']=$id;
    header('location:home_admin.php');
  }
  else $errors['not_exist']="invalid id or password!!!";
}


?>

<!DOCTYPE>
<html>
    <head>
      <title>Login Employee</title>
      <link href="styles.css" rel="stylesheet">
    </head>

    <body>
      <form action="" method="post" >
        
          <legend>Admin Login</legend>
            <p>
              <label for="a_id" > ID : </label>
                <input type="text" name="a_id" placeholder="Enter your id..." >
                <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
            </p>
            <p>
              <label  for="a_pass" > password : </label>
              <input type="password" name="a_pass" placeholder="Enter your Password..." ><br>
              <p><?php if(isset($errors['pass_err'])) echo $errors['pass_err']; ?></p>
            </p>
            <p>
              <input type="submit"  value="Login" ><br>
              <p><?php if(isset($errors['not_exist'])) echo $errors['not_exist']; ?></p>
            </p>
        
      </form>
    </body>
</html>