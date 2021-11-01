<?php

session_start();
$balance=$_SESSION['balance'];
$amount= $_SESSION['amount'];
echo "successfully refunded  TK ".$amount;
echo "<br>";
echo "your current balance is ".$balance;
?>