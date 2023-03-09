<!DOCTYPE html>
<html>
<head>
	<title>All Products</title>

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

<tr> <th> PRODUCT ID </th> <th> EQUIPMENT ID </th> <th> COFFEE ID </th>  </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM allProducts"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $product_id = $row['product_id']; 
    $eq_id = $row['eq_id']; 
    $coffee_id = $row['coffee_id']; 
    
    
    echo "<tr>" . "<th>" . $product_id . "</th>" . "<th>" . $eq_id . "</th>" .  "<th>" . $coffee_id . "</th>" . "</tr>";
} 

?>


</table>
</div>

</body>
</html>