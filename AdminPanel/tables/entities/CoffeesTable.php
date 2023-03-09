<!DOCTYPE html>
<html>
<head>
	<title>Coffees</title>

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

<tr> <th> COFFE ID </th> <th> COFFE NAME </th> <th> BRAND </th> <th> WEIGHT (gr.)</th> <th> TASTE </th>  <th> ORIGIN </th> <th> DESCRIPTION </th> <th> PRICE </th>  <th> IMAGE </th> </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Coffees"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $coffee_id = $row['coffee_id']; 
    $coffee_name = $row['coffee_name']; 
    $brand = $row['brand']; 
    $weight = $row['weight']; 
    $taste = $row['taste']; 
    $origin = $row['origin']; 
    $description = $row['description']; 
    $price = $row['price']; 
    $image = $row['image']; 
    
    echo "<tr>" . "<th>" . $coffee_id . "</th>" . "<th>" . $coffee_name . "</th>" . "<th>" . $brand . "</th>" . "<th>" . $weight . "</th>" . "<th>" . $taste . "</th>" . "<th>" . $origin . "</th>" . "<th>" . $description . "</th>" . "<th>" . $price . "</th>" .  "<th>" . $image . "</th>" . "</tr>";
} 

?>


</table>
</div>

</body>
</html>