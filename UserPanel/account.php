

<?php 
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = $_SESSION['user_data'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body style="background-color:#FAFAFA">

	<a style="color:#A0A000; text-decoration:none;" href="../firebase_ChattingExtension/message_client.php?name=<?php echo urlencode($user_data['name']) , " " , urlencode($user_data['surname']) , " (client)"; ?>">contact</a>
	
	
	<span style="margin-left:1330px;">
		<a class="button" href="account.php"> <?php echo $user_data['name'], " " , $user_data['surname'];  ?> </a>
	</span>

	<div class="upper_section">
		
		
		
        <a style="text-align:left;" class="name" href="index.php">Caffeine Emporium</a>
		<a class="button" href="coffees.php"> Coffees </a>
		<a class="button" href="Equipments.php"> Equipments </a>

		
		

	</div>

	

<div>
	<h2 style = "text-align:center;">Your Cart</h2>
	<?php

	$query = "SELECT * FROM AccountToCart WHERE acc_id = {$user_data['acc_id']} AND status='NOT ORDERED'";
	$result = mysqli_query($con, $query);
	
	$total = 0;

	// Check if the cart is empty
	if(mysqli_num_rows($result) == 0) {
		echo "<br> <p style='text-align:center;'>Your cart is empty.</p>";
	}
	else {
		$row = mysqli_fetch_assoc($result);
		$query_cart = "SELECT * FROM Carts WHERE cart_id={$row['cart_id']}";
		$result_cart = mysqli_query($con, $query_cart);
		while ($row_cart = mysqli_fetch_assoc($result_cart)) {

			$query_products = "SELECT * FROM allProducts WHERE product_id = {$row_cart['product_id']}";
			$result_products = mysqli_query($con, $query_products);
			
			while($row_products = mysqli_fetch_assoc($result_products)){

				

				if($row_products['eq_id'] != NULL){

					$query_equipments = "SELECT * FROM Equipments WHERE eq_id={$row_products['eq_id']}";
					$result_equipments = mysqli_query($con, $query_equipments);
					while($row_equipments = mysqli_fetch_assoc($result_equipments)){

						$total += $row_equipments['price']; // Add price to total

						echo "<div class='cart-item'>"; // beginning

						echo "<div class='item-image'>"; // beginning
						echo "<img src='" . $row_equipments['image'] . "' alt='Equipment Image' >";
						echo "</div>";	//	ending

						echo "<div class='item-details'>";  // beginning
						echo "<div class='item-name'>" . $row_equipments['eq_name'] . "</div>" . "<br>";
						echo "<div class='item-price'>" . $row_equipments['Price'] . " $ </div>" . "<br>";
						echo "<div class='item-quantity'> Quantity: " . $row_cart['amount'] . "</div>" . "<br>";
						echo "</div>"; //ending

						echo "</div>"; // ending

					}
				}
				else{
					
					
					

					$query_coffees = "SELECT * FROM Coffees WHERE coffee_id={$row_products['coffee_id']}";
					$result_coffees = mysqli_query($con, $query_coffees);
					
					
					while($row_coffees = mysqli_fetch_assoc($result_coffees)){
					
						$total = $total + ($row_coffees['price'] * $row_cart['amount']); // Add price to total

						echo "<div class='cart-item'>";

						echo "<div class='item-image'>"; //
						echo "<img src='" . $row_coffees['image'] . "' alt='Coffe Image' >";
						echo "</div>";	//	

						echo "<div class='item-details'>";  //
						echo "<div class='item-name'>" . $row_coffees['coffee_name'] . "</div>" . "<br>";
						echo "<div class='item-price'>" . $row_coffees['price'] . " $ </div>" . "<br>";
						echo "<div class='item-quantity'> Quantity: " . $row_cart['amount'] . "</div>" . "<br>";
						echo "</div>"; //

						echo "</div>";

						
					}

				}

				

			}
		}
		echo "<div class='cart-total'> Total Cost: " . $total . " $</div>";
		echo "<a href='Order.php?cart_id=" . $row['cart_id'] . "&total=" . $total . "' class='order'>Purchase</a>";

		
	}
	?>
</div>

	

	
	
</body>
</html>