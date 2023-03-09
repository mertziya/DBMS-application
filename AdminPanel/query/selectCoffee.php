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

<tr> <th> ID </th> <th> NAME </th> <th>  BRAND </th> <th> WEIGHT </th> <th> TASTE </th> <th> ORIGIN </th> <th> DESCRIPTON </th> <th> PRICE </th> </tr> 

<?php

include "../config.php";

if (!empty($_POST['price'])){ 
    $price = $_POST['price']; 
    
    $sql_statement = "SELECT * FROM Coffees WHERE price < '$price'"; 

    $result = mysqli_query($db, $sql_statement);
    
    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $coffee_id = $row['coffee_id']; 
        $coffee_name = $row['coffee_name']; 
        $brand = $row['brand']; 
        $weight = $row['weight']; 
        $taste = $row['taste']; 
        $origin = $row['origin'];
        $description = $row['description'];
        $price = $row['price'];


        echo "<tr>" . "<th>" . $coffee_id . "</th>" . "<th>" . $coffee_name . "</th>" . "<th>" . $brand . "</th>" . "<th>" . $weight . "</th>" . "<th>" . $taste . "</th>" . "<th>" . $origin . "</th>" .  "<th>" . $description . "</th>" .  "<th>" . $price . "</th>" . "</tr>";
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