<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = $_SESSION['user_data'];

$eq_id = $_GET['eq_id'];
$coffee_id = $_GET['coffee_id'];


$query = "SELECT * FROM AccountToCart WHERE acc_id = " . $user_data['acc_id'] . " AND status = 'NOT ORDERED'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 0) {
    if(isset($eq_id)) { // to check if eq_id exist.
        $query_products = "SELECT product_id FROM allProducts WHERE eq_id=$eq_id";
    }
    else{ // if eq_id doesn't exist coffe_id should exist.
        $query_products = "SELECT product_id FROM allProducts WHERE coffee_id=$coffee_id";
    }
    
    $result_products = mysqli_query($con, $query_products);
    $row_products = mysqli_fetch_assoc($result_products);
    $product_id = $row_products['product_id'];


    $query_carts = "INSERT INTO Carts(product_id, amount) VALUES ($product_id, 1)";
    $result_carts = mysqli_query($con, $query_carts);

    if ($result_carts) {
        $cart_id = mysqli_insert_id($con); // get the last inserted ID
        $query_accountToCart = "INSERT INTO AccountToCart(acc_id,cart_id,status) VALUES ({$user_data['acc_id']}, $cart_id, 'NOT ORDERED')";
        $result_accountToCart = mysqli_query($con, $query_accountToCart);

        if ($result_accountToCart) {
            header("Location: account.php?success=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } 
    else {
        echo "Error: " . mysqli_error($con);
    }


}

else{
    
    
    $row = mysqli_fetch_assoc($result);

    if(isset($eq_id)) { // to check if eq_id exist.
        $query_products = "SELECT product_id FROM allProducts WHERE eq_id=$eq_id";
    }
    else{ // if eq_id doesn't exist coffe_id should exist.
        $query_products = "SELECT product_id FROM allProducts WHERE coffee_id=$coffee_id";
    }
    $result_products = mysqli_query($con, $query_products);
    $row_products = mysqli_fetch_assoc($result_products);
    
    
    // Build a SQL query that checks whether a particular product is already in the user's shopping cart
    $query_check = "SELECT * FROM Carts WHERE product_id = {$row_products['product_id']} AND cart_id = {$row['cart_id']}";

    // Execute the SQL query using the MySQLi extension
    $result_check = mysqli_query($con, $query_check);
    


    if(mysqli_num_rows($result_check) == 0){

        $query_insert = "INSERT INTO Carts (cart_id, product_id, amount) VALUES ({$row['cart_id']}, {$row_products['product_id']}, 1)";
        $result_insert = mysqli_query($con, $query_insert);
        header("Location: account.php?success=1");
        exit();
        
    }

    else{
        
        $query_increaseCart = "UPDATE Carts SET amount=amount+1 WHERE cart_id={$row['cart_id']} AND product_id={$row_products['product_id']}";
        $result_increaseCart = mysqli_query($con, $query_increaseCart);
        header("Location: account.php?success=1");
        exit();

    }
    


    
    
    

}











?>