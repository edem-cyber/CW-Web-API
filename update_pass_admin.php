
<?php
include('db_connect.php');
session_start();

if($_POST)
{
  $errors=array();
  $id=$_SESSION['a_id'];

  $password=$_POST['a_pass'];
  $cpassword=$_POST['ca_pass'];

  if(empty($password))$errors['apass_err']="password can't be empty!!";
  if(empty($cpassword))$errors['capass_err']="confrim password can't be empty!!";
  if($password!==$cpassword)$errors['no_match']="password doesn't match!!";


  if(count($errors)==0)
  {
  	$_SESSION['pass']=$password;
  	header('location:update_admin_pass_confirm.php');
  }

}


?>

<!DOCTYPE>
<html>
  <head>
  <link href="styles.css" rel="stylesheet">
    <title>change admin password</title>
  </head>

  <body>
    <form action="" method="post" target="_blank">
      
        <legend>Change Admin Password</legend>

          <p>
            <label for="a_pass" > New Pass : </label>
            <input type="password" name="a_pass" placeholder="enter new password..." >
            <p><?php if(isset($errors['apass_err'])) echo $errors['apass_err']; ?></p>
          </p>
          
          <p>
            <label  for="ca_pass" > Confirm New Pass : </label>
            <input type="password" name="ca_pass" placeholder="confirm new  Password..." ><br>
            <p><?php if(isset($errors['capass_err'])) echo $errors['capass_err']; ?></p>
          </p>

          <p>
            <input type="submit"  value="Change Pass" ><br>
            <p><?php if(isset($errors['no_match'])) echo $errors['no_match']; ?></p>
          </p>
      
    </form>
  </body>
</html>