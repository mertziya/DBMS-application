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

<tr> <th> ID </th> <th> NAME </th> <th> TYPE </th> <th> BRAND </th> <th> DESCRIPTION </th> <th> PRICE </th> </tr> 

<?php

include "../config.php";

if (!empty($_POST['Brand'])){ 
    $Brand = $_POST['Brand']; 
    
    $sql_statement = "SELECT * FROM Equipments WHERE Brand = '$Brand'"; 

    $result = mysqli_query($db, $sql_statement);
    
    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $eq_id = $row['eq_id']; 
        $eq_name = $row['eq_name']; 
        $eq_type = $row['eq_type']; 
        $Brand = $row['Brand']; 
        $Description = $row['Description']; 
        $Price = $row['Price'];


        echo "<tr>" . "<th>" . $eq_id . "</th>" . "<th>" . $eq_name . "</th>" . "<th>" . $eq_type . "</th>" . "<th>" . $Brand . "</th>" . "<th>" . $Description . "</th>" . "<th>" . $Price . "</th>" . "</tr>";
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