<!DOCTYPE html>
<html>
<head>
	<title>Equipments</title>

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

<tr> <th> ID </th> <th> NAME </th> <th> EQUIPMENT TYPE </th> <th> BRAND </th> <th> DESCRIPTION </th> <th> PRICE </th> <th> IAMGE </th> </tr> 

<?php 

include "../../config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Equipments"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result

    $eq_id = $row['eq_id']; 
    $eq_name = $row['eq_name']; 
    $eq_type = $row['eq_type']; 
    $Brand = $row['Brand']; 
    $Description = $row['Description']; 
    $Price = $row['Price']; 
    $image = $row['image']; 
    
    echo "<tr>" . "<th>" . $eq_id . "</th>" . "<th>" . $eq_name . "</th>" . "<th>" . $eq_type . "</th>" . "<th>" . $Brand . "</th>" . "<th>" . $Description . "</th>" .  "<th>" . $Price . "</th>" ."<th>" . $image . "</th>" . "</tr>";
} 

?>


</table>
</div>

</body>
</html>
