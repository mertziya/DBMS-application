<!DOCTYPE html>
<html>
<head>
	<title>Carts</title>

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

<tr> <th> CART ID </th> <th> PRODUCT ID </th> <th> AMOUNT </th> <th> STATUS </th> </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Carts"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $cart_id = $row['cart_id']; 
    $product_id = $row['product_id']; 
    $amount = $row['amount']; 
    $status = $row['status']; 
    
    
    echo "<tr>" . "<th>" . $cart_id . "</th>" . "<th>" . $product_id . "</th>" . "<th>" . $amount . "</th>" . "<th>" . $status . "</th>" . "</tr>";
} 

?>


</table>
</div>

</body>
</html>