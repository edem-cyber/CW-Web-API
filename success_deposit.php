<?Php
session_start();
$balance=$_SESSION['balance'];

echo "successfullu deposited!!";
echo "<br>";
echo "your current balance is ".$balance;
?>

<link href="styles.css" rel="stylesheet">