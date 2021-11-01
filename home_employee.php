<?php

include('db_connect.php');
session_start();


echo "<h3 >Employee Homepage</h3>";

?>
<link href="styles.css" rel="stylesheet">
<ul>

<li><a href="update_password_employee.php">Update Your Password</li>

<li><a href="create_customer_account.php">Create customer Account</li>

<li><a href="deposit.php">Deposit</li>

<li><a href="refund.php">Refund</li>

<li><a href="transfer.php">Transfer</li>

<li><a href="transaction_statement.php">Transaction Statement</li>

<li><a href="show_customer_info.php">Customer Information</li>

<li><a href="close_customer_account.php">close Account</li>

<li><a href="logout.php">logout</li>

</ul>