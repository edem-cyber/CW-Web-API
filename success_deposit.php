<?Php
session_start();
$balance=$_SESSION['balance'];

echo "Deposit Success!!";
echo "<br>";
echo "your current balance is ".$balance;
?>

<link href="styles.css" rel="stylesheet">