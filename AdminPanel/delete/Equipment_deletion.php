<?php

include "../config.php";

if(!empty($_POST['eq_id']))
{
    $eq_id = $_POST['eq_id'];
    $sql_statement = "DELETE FROM Equipments WHERE eq_id = $eq_id";
    $result = mysqli_query($db, $sql_statement);
    echo "The Equipment with " . $eq_id . " is deleted";
}
else{
    echo "equipment id not found";
}
?>