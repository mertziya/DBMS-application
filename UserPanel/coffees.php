

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

    

    <div class="product-list">
        <h2 class="product-list-title">Coffees</h2>
        <ul class="product-list-items">
        <?php
            // Query to fetch all items from the database
            $query = "SELECT * FROM Coffees";
            $result = mysqli_query($con, $query);

            // Loop through each row and display the item details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class='product-list-item'>";
                echo "<a href='#' class='product-list-image-link'><img class='product-list-image' src='" . $row['image'] . "' alt='" . $row['coffee_name'] . "' /></a>";
                echo "<div class='product-list-details'>";
                echo "<h3 class='product-list-name'>".$row['coffee_name']."</h3>";
                echo "<p class='product-list-description'>".$row['description']."</p>";
                echo "<div class='product-list-info'>";
                echo "<span class='product-list-brand'> <b style='font-size:18px;'>Brand:</b> ".$row['brand']."</span>"."<br>";
                echo "<span class='product-list-weight'> <b style='font-size:18px;'>Weight:</b> ".$row['weight']." g</span>"."<br>";
                echo "<span class='product-list-taste'> <b style='font-size:18px;'>Taste:</b> ".$row['taste']."</span>"."<br>";
                echo "<span class='product-list-origin'> <b style='font-size:18px;'>Origin:</b> ".$row['origin']."</span>"."<br>";
                echo "</div>";
                echo "<span class='product-list-price'>".$row['price']."$ "."</span>";
                echo "<a href='addToCart.php?coffee_id=".$row['coffee_id']."' class='product-list-add-to-cart'>Add to Cart</a>";
                echo "</div>";
                echo "</li>";
            }
            
        ?>
        </ul>
    </div>



	<br><br><br>
	
</body>
</html>