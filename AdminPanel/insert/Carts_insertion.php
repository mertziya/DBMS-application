<?php 

include "../config.php"; 

if (!empty($_POST['cart_id']) && !empty($_POST['product_id']) && !empty($_POST['amount'])){ 
    
    $cart_id = $_POST['cart_id']; 
    $product_id = $_POST['product_id']; 
    $amount = $_POST['amount'];
    
    

    $sql_statement = "INSERT INTO Carts(cart_id, product_id, amount) VALUES ('$cart_id','$product_id','$amount')"; 

    $result = mysqli_query($db, $sql_statement);
    header('Location: http://localhost/CaffeineEmporium/AdminPanel/tables/entities/CartsTable.php');
    exit();
} 
else 
{
    $error_message = "You did not entered all the values!";
    echo "<script>alert('$error_message');</script>";
}

?>
