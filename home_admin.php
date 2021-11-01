<?php

include('db_connect.php');
session_start();

echo "";

?>
<head 
>

<a href="https://www.gcbbank.com.gh/">
   <img alt="GCB" src="https://www.gcbbank.com.gh/images/about/GCB_brandmark.png"
   width=250" height="140">
</a>

<link href="styles.css" rel="stylesheet">

<h3 >Welcome to your GCB Portal!</h3>
<p style='font-size:smaller;' >Edem Kojo Agbakpe - 050918026</p>
<ul>
	<li><a href="update_pass_admin.php">Update your password</li>
	<li><a href="create_employee_account.php">Create Employee Account</li>
    <li><a href="create_customer_account.php">Create customer Account</li>
    <li><a href="deposit.php">Deposit</li>
    <li><a href="refund.php">Refund</li>
    <li><a href="transfer.php">Transfer</li>
    <li><a href="transaction_statement.php">Transaction Statement</li>
    <li><a href="show_customer_info.php">Customer Information</li>
    <li><a href="employee_info.php">employee Information</li>
    <li><a href="close_customer_account.php">close Customer Account</li>
    <li><a href="close_employee_account.php">close Employee Account</li>
    <li><a href="logout.php">Logout</li>
</ul>