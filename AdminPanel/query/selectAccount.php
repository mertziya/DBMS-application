<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body >

<div align="center">

	<table>

<tr> <th> ID </th> <th> NAME </th> <th> SURNAME </th> <th> MAIL </th> <th> PASSWORD </th> </tr> 

<?php

include "../config.php";

if (!empty($_POST['order_id'])){ 
    $order_id = $_POST['order_id']; 
    
    $sql_statement = "SELECT * FROM Accounts WHERE acc_id = (
      SELECT acc_id FROM AccountToCart WHERE cart_id = (
      SELECT cart_id FROM Orders WHERE order_id = '$order_id' LIMIT 1));"; 

    $result = mysqli_query($db, $sql_statement);
    
    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $acc_id = $row['acc_id']; 
        $name = $row['name']; 
        $surname = $row['surname']; 
        $mail = $row['mail']; 
        $pass_word = $row['pass_word']; 



        echo "<tr>" . "<th>" . $acc_id . "</th>" . "<th>" . $name . "</th>" . "<th>" . $surname . "</th>" . "<th>" . $mail . "</th>" . "<th>" . $pass_word . "</th>" . "</tr>";
    } 
} 
else 
{
    echo "You did not enter the Order ID.";
}
?>

</table>
</div>

</body>
</html>