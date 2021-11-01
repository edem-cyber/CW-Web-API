
<?php
include('db_connect.php');
session_start();

if($_POST)
{
  $errors=array();
  $id=$_SESSION['e_id'];

  $password=$_POST['e_pass'];
  $cpassword=$_POST['ce_pass'];

  if(empty($password))$errors['epass_err']="password can't be empty!!";
  if(empty($cpassword))$errors['cepass_err']="confrim password can't be empty!!";
  if($password!==$cpassword)$errors['no_match']="password doesn't match!!";


  if(count($errors)==0)
  {
  	$_SESSION['pass']=$password;
  	header('location:update_pass_confirm.php');
  }
}


?>


<!DOCTYPE>
<html>
  <head>
  <link href="styles.css" rel="stylesheet">
    <title>change employee password</title>
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>
    <form action="" method="post" >
      
        <legend>Change Employee Password</legend>

          <p>
            <label for="e_pass" > New Pass : </label>
            <input type="password" name="e_pass" placeholder="enter new password..." >
            <p><?php if(isset($errors['epass_err'])) echo $errors['epass_err']; ?></p>
          </p>

          <p>
            <label  for="ce_pass" > Confirm New Pass : </label>
            <input type="password" name="ce_pass" placeholder="confirm new  Password..." ><br>
            <p><?php if(isset($errors['cepass_err'])) echo $errors['cepass_err']; ?></p>
          </p>
                
          <p>
            <input type="submit"  value="Change Pass" ><br>
            <p><?php if(isset($errors['no_match'])) echo $errors['no_match']; ?></p>
          </p>
      
    </form>
  </body>
</html>