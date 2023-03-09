<?php

include "../config.php";

if(!empty($_POST['cart_id']))
{
    $cart_id = $_POST['cart_id'];
    $sql_statement = "DELETE FROM Carts WHERE cart_id = $cart_id";
    $result = mysqli_query($db, $sql_statement);
    echo "The cart with " . $cart_id . " is deleted";
}
else{
    echo "cart id not found";
}
?>