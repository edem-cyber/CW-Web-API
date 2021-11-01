
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
    $_SESSION['cus']=$customer;

    $l=$_POST['limit'];
    $_SESSION['lim']=$l;

    if(empty($customer))$errors['id_err']="Id can't be empty!!";
    if(empty($l))$errors['limit_err']="limit field can't be empty!!";

    $sql="select * from transaction where c_id='$customer' order by id desc limit $l ";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($result);

    $_SESSION['row']=$rows;
    $_SESSION['res']=$result;

    if($rows>0)
      {
        while( $userrow = mysqli_fetch_array($result) )
          {
            echo $userrow['c_id']." "; 
            echo $userrow['type']."  "; 
            echo $userrow['amount']."  ";
            echo $userrow['to_id']." "; 
            echo $userrow['e_id']; 
          } 
      } 

  if(!($rows>0))
    $errors['not_exist']="invalid customer id!!!";

  if(count($errors)==0) header("location:success_transaction.php");
}


?>

<!DOCTYPE html>
<html>
    <head>
      <title>Transaction_statement</title>
    </head>

    <body>
      <form action=" " method="post" >
        
          <legend>Transaction Statement Form</legend>
            <p>
              <label for="c_id" > ID : </label>
              <input type="text" name="c_id" placeholder="Enter customer id..." ><br>
              <p><?php if(isset($errors['id_err'])) echo $errors['id_err']; ?></p>
              <p><?php if(isset($errors['not_exist'])) echo $errors['not_exist']; ?></p>
            </p>
            <p>
              <label  for="limit" > No : </label>
              <input type="text" name="limit" placeholder="Enter no of statement..." ><br>
              <p><?php if(isset($errors['limit_err'])) echo $errors['limit_err']; ?></p>
            </p>
            <p>
              <input type="submit"  value="See Statements"  >
            </p>
        
      </form>   
    </body>
</html>