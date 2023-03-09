<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>

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

<tr> <th> ORDER ID </th> <th> ORDER DATE </th> <th> CART ID </th> <th> COST </th> </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Orders"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $order_id = $row['order_id']; 
    $order_date = $row['order_date']; 
    $cart_id = $row['cart_id']; 
    $cost = $row['total_cost'];
    echo "<tr>" . "<th>" . $order_id . "</th>" . "<th>" . $order_date . "</th>" . "<th>" . $cart_id . "</th>" . "<th>" . $cost . "</th>" . "</tr>";
} 

?>


</table>
</div>

</body>
</html>