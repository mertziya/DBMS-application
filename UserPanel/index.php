

<?php 
	session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
	$_SESSION['user_data'] = $user_data;

	
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
		
		
		
		<a class="name" href="index.php">Caffeine Emporium</a>
		<a class="button" href="coffees.php"> Coffees </a>
		<a class="button" href="Equipments.php"> Equipments </a>

		
		

	</div>

		<div class="product-list">
		<ul class="product-list-items">
		<?php
			// Query to fetch all items from the database
			$query = "SELECT * FROM allProducts";
			$result_all = mysqli_query($con, $query);
			while ($row_all = mysqli_fetch_assoc($result_all)) {
				if ($row_all['coffee_id'] != NULL) {
					$query_coffee = "SELECT * FROM Coffees WHERE coffee_id = " . $row_all['coffee_id'];
					$result_coffee = mysqli_query($con, $query_coffee);

					while ($row_coffee = mysqli_fetch_assoc($result_coffee)) {
						echo "<li class='product-list-item'>";
						echo "<a href='#' class='product-list-image-link'><img class='product-list-image' src='" . $row_coffee['image'] . "' alt='" . $row_coffee['coffee_name'] . "' /></a>";
						echo "<div class='product-list-details'>";
						echo "<h3 class='product-list-name'>".$row_coffee['coffee_name']."</h3>";
						echo "<p class='product-list-description'>".$row_coffee['description']."</p>";
						echo "<div class='product-list-info'>";
						echo "<span class='product-list-brand'> <b style='font-size:18px;'>Brand:</b> ".$row_coffee['brand']."</span>"."<br>";
						echo "<span class='product-list-weight'> <b style='font-size:18px;'>Weight:</b> ".$row_coffee['weight']." g</span>"."<br>";
						echo "<span class='product-list-taste'> <b style='font-size:18px;'>Taste:</b> ".$row_coffee['taste']."</span>"."<br>";
						echo "<span class='product-list-origin'> <b style='font-size:18px;'>Origin:</b> ".$row_coffee['origin']."</span>"."<br>";
						echo "</div>";
						echo "<span class='product-list-price'>".$row_coffee['price']."$ "."</span>";
						echo "<a href='addToCart.php?coffee_id=".$row_coffee['coffee_id']."' class='product-list-add-to-cart'>Add to Cart</a>";
						echo "</div>";
						echo "</li>";
					}
				}
				else{
					$query_eq = "SELECT * FROM Equipments WHERE eq_id = " . $row_all['eq_id'];
               		$result_eq = mysqli_query($con, $query_eq);

                	// Loop through each row and display the item details
                	while ($row_eq = mysqli_fetch_assoc($result_eq)) {
						echo "<li class='product-list-item'>";
						echo "<a href='#' class='product-list-image-link'><img class='product-list-image' src='" . $row_eq['image'] . "' alt='" . $row_eq['eq_name'] . "' /></a>";
						echo "<div class='product-list-details'>";
						echo "<h3 class='product-list-name'>".$row_eq['eq_name']."</h3>";
						echo "<p class='product-list-description'>".$row_eq['Description']."</p>";
						echo "<div class='product-list-info'>";
						echo "<span class='product-list-brand'> <b style='font-size:18px;'>Brand:</b> ".$row_eq['Brand']."</span>"."<br>";
						echo "</div>";
						echo "<span class='product-list-price'>".$row_eq['Price']."$ "."</span>";
						echo "<a href='addToCart.php?eq_id=".$row_eq['eq_id']."' class='product-list-add-to-cart'>Add to Cart</a>";
						echo "</div>";
						echo "</li>";
					}
				}
			}
            
            
		

            
        ?>
        </ul>
    </div>
	
</body>
</html>