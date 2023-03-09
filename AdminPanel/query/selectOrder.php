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

<tr> <th> ORDER ID </th> <th> ORDER DATE </th> <th> CART ID </th> </tr> 

<?php

include "../config.php";

if (!empty($_POST['order_date'])){ 
    $order_date = $_POST['order_date']; 
    
    $sql_statement = "SELECT * FROM Orders WHERE order_date < '$order_date'"; 

    $result = mysqli_query($db, $sql_statement);
    
    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $order_id = $row['order_id']; 
        $order_date = $row['order_date']; 
        $cart_id = $row['cart_id']; 
      


        echo "<tr>" . "<th>" . $order_id . "</th>" . "<th>" . $order_date . "</th>" . "<th>" . $cart_id . "</th>" . "</tr>";
    } 
} 
else 
{
    echo "You did not enter the user's name.";
}
?>

</table>
</div>

</body>
</html>