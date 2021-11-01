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

  $fcustomer=$_POST['fc_id'];
  $tcustomer=$_POST['tc_id'];
  $fbalance=$_POST['c_balance'];
  $_SESSION['amount']=$fbalance;
  $_SESSION['to']=$tcustomer;

  if(empty($fcustomer))$errors['id1_err']="Id can't be empty!!";
  if(empty($tcustomer))$errors['id2_err']="Id can't be empty!!";
  
  if(empty($fbalance))$errors['balance_err']="balance field  can't be empty!!";

  $fsql="select * from customer where c_id='$fcustomer' ";
  $fresult=mysqli_query($con,$fsql);
  $frows=mysqli_num_rows($fresult);


  $tsql="select * from customer where c_id='$tcustomer' ";
  $tresult=mysqli_query($con,$tsql);
  $trows=mysqli_num_rows($tresult);


  if(!($frows>0)) $errors['fnot_exist']="invalid sender ID!!!";
  if(!($trows>0)) $errors['tnot_exist']="invalid receipient ID!!";
  
  if($frows>0 && $trows>0 )
    {
      $fassoc=mysqli_fetch_assoc($fresult);
      $fcurrent=$fassoc['c_balance'];
      $tassoc=mysqli_fetch_assoc($tresult);

      $tcurrent=$tassoc['c_balance'];
      $fnew_balance=$fcurrent-$fbalance;
      if($fnew_balance<500.00) $errors['unavailable_balance']="ineligible balance !!..can't transfer!!!";
      else
        {
          $tnew_balance=$tcurrent+$fbalance;
          $sql1="update customer set c_balance=$fnew_balance where c_id='$fcustomer'";
          $result1=mysqli_query($con,$sql1);
  
          $sql2="update customer set c_balance=$tnew_balance where c_id='$tcustomer'";
          $result2=mysqli_query($con,$sql2);

          if($result1 && $result2) 
            {
              $sql2="insert into transaction(c_id,type,amount,to_id,e_id) values('$fcustomer','transfer', $fbalance,'$tcustomer','$employee_id')";
              mysqli_query($con,$sql2);
            }
  
          $sql4="select *from customer where c_id='$fcustomer'";
          $m=mysqli_query($con,$sql4);
          $r=mysqli_fetch_assoc($m);
          $_SESSION['current']= $r['c_balance'];
        }
    }
 
  if(count($errors)==0)
    {
      header("location:success_transfer.php");
    } 
}


?>


<!DOCTYPE>
<html>
  <head>
    <title>transfer_form</title>
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>
    <form action=" " method="post" >
        <!--  -->
          <legend>Transfer Money </legend>
            <p>
              <label for="fc_id" > ID(from) : </label>
              <input type="text" name="fc_id" placeholder="Enter customer id" ><br>
              <p><?php if(isset($errors['id1_err'])) echo $errors['id1_err']; ?></p>
              <p><?php if(isset($errors['fnot_exist'])) echo $errors['fnot_exist']; ?></p>
            </p>
                
            <p>
              <label for="tc_id" > ID(to) : </label>
              <input type="text" name="tc_id" placeholder="Enter customer id" ><br>
              <p><?php if(isset($errors['id2_err'])) echo $errors['id2_err']; ?></p>
              <p><?php if(isset($errors['tnot_exist'])) echo $errors['tnot_exist']; ?></p>
            </p>
               
            <p>
               
              <label  for="c_balance" > Amount : </label>
              <input type="text" name="c_balance" placeholder="Enter your Amount" ><br>
              <p><?php if(isset($errors['balance_err'])) echo $errors['balance_err']; ?></p>
              <p><?php if(isset($errors['unavailable_balance'])) echo $errors['unavailable_balance']; ?></p>
            </p>
               
            <p>
              <input type="submit"  value="TRANSFER"  >
            </p>
      
      </form>   

    </body>
</html>