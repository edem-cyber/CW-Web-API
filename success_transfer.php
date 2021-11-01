<?php
session_start();
$to=$_SESSION['to'];
$amount=$_SESSION['amount'];
$current=$_SESSION['current'];
echo "successfully transferred  ".$amount." to  ".$to;
echo "<br>";
echo "your current balance is ".$current;
?>
<link href="styles.css" rel="stylesheet">