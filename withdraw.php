
<?php

session_start();
include('db_connect.php');

if($_POST)
{
  $errors=array();
        if(isset($_SESSION['e_id']))
         $employee_id=$_SESSION['e_id'];
       else if(isset($_SESSION['a_id']))
         $employee_id=$_SESSION['a_id'];

  $customer=$_POST['c_id'];
  $balance=$_POST['c_balance'];
  $_SESSION['amount']=$balance;

  if(empty($customer))$errors['id_err']="Id can't be empty!!";
  
  if(empty($balance))$errors['balance_err']="balance field  can't be empty!!";

  $sql="select * from customer where c_id='$customer' ";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($result);

  if($rows>0)
    {
      $assoc=mysqli_fetch_assoc($result);
      $current=$assoc['c_balance'];
      $new_balance=$current-$balance;
      if($new_balance<500.00) 
        {
          $errors['unavailable_balance']="ineligible amount..can't refund!!!";
        }
      else
        {
          $sql1="update customer set c_balance=$new_balance where c_id='$customer'";
          $result1=mysqli_query($con,$sql1);
          if($result1) 
            {
              $sql2="insert into transaction(c_id,type,amount,e_id) values('$customer','refund', $balance,'$employee_id')";
              mysqli_query($con,$sql2);
            }
          $sql4="select *from customer where c_id='$customer'";
          $m=mysqli_query($con,$sql4);
          $r=mysqli_fetch_assoc($m);
          $_SESSION['balance']=$r['c_balance'];
        }
    }
  else $errors['not_exist']="Invalid customer id!!!";

  if(count($errors)==0) header("location:success_refund.php");

}

?>

<!DOCTYPE>
<html>
  <head>
    <title>refund_form</title>
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>
    <form action=" " method="post" >
      
        <legend>Refund Form</legend>
          <p>
            <label for="c_id" > ID : </label>
            <input type="text" name="c_id" placeholder="Enter customer id" ><br>
            <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
             <p><?php if(isset($errors['not_exist'])) echo $errors['not_exist']; ?></p>
          </p>
          <p>
            <label  for="c_balance" > Amount : </label>
            <input type="text" name="c_balance" placeholder="Enter your Amount" ><br>
            <p><?php if(isset($errors['balance_err'])) echo $errors['balance_err']; ?></p>
            <p><?php if(isset($errors['unavailable_balance'])) echo $errors['unavailable_balance']; ?></p>
          </p>
          <p>
            <input type="submit"  value="REFUND"  >
          </p>
      
    </form>
  </body>
</html>