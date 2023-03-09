<!DOCTYPE html>
<html>
<head>
	<title>Account - Cart</title>

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

<tr> <th> ACCOUNT ID </th> <th> CART ID </th> <th> STATUS </th> </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM AccountToCart"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $acc_id = $row['acc_id']; 
    $cart_id = $row['cart_id']; 
    $status = $row['status']; 
    
    
    echo "<tr>" . "<th>" . $acc_id . "</th>" . "<th>" . $cart_id . "</th>" . "<th>" . $status . "</tr>";
} 

?>


</table>
</div>

</body>
</html>