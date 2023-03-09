<?php
    session_start();
	include("connection.php");
	include("functions.php");
	$user_data = $_SESSION['user_data'];

    $cart_id = $_GET['cart_id'];
    $total = $_GET['total'];

    $query_accountToCart = "UPDATE AccountToCart SET status='ORDERED' WHERE acc_id={$user_data['acc_id']} AND cart_id={$cart_id}";
    $result_accountToCart = mysqli_query($con, $query_accountToCart);

    $query_cart = "UPDATE Carts SET status='ORDERED' WHERE cart_id={$cart_id}";
    $result_cart = mysqli_query($con, $query_cart);

    $query_order = "INSERT INTO Orders(cart_id, total_cost, order_date) VALUES ({$cart_id}, {$total}, NOW())";
    $result_order = mysqli_query($con, $query_order);

    header("Location: account.php?success=1");
    exit();
?>