<?php

include "../config.php";

if(!empty($_POST['coffee_id']))
{
    $coffee_id = $_POST['coffee_id'];
    $sql_statement = "DELETE FROM Coffees WHERE coffee_id = $coffee_id";
    $result = mysqli_query($db, $sql_statement);
    echo "The Coffe with " . $coffee_id . " is deleted";
}
else{
    echo "coffe id not found";
}
?>