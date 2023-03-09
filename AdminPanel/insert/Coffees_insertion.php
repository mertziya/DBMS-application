<?php 

include "../config.php"; 

if (!empty($_POST['coffee_name']) || !empty($_POST['brand']) || !empty($_POST['weight']) || !empty($_POST['taste']) || !empty($_POST['origin']) || !empty($_POST['description']) || !empty($_POST['price'])){ 
    
    $coffee_name = $_POST['coffee_name']; 
    $brand = $_POST['brand']; 
    $weight = $_POST['weight'];
    $taste = $_POST['taste'];
    $origin = $_POST['origin']; 
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    if (isset($_POST['weight']) && !empty($_POST['weight']) && isset($_POST['price']) && !empty($_POST['price'])) {
        $sql_statement = "INSERT INTO Coffees(coffee_name, brand, weight, taste, origin, description, price) VALUES ('$coffee_name','$brand',$weight,'$taste','$origin','$description',$price)"; 
    } 
    else {
        $sql_statement = "INSERT INTO Coffees(coffee_name, brand, taste, origin, description) VALUES ('$coffee_name','$brand','$taste','$origin','$description')"; 
    }
    

    

    $result = mysqli_query($db, $sql_statement);
    header('Location: http://localhost/CaffeineEmporium/AdminPanel/tables/entities/CoffeesTable.php');
    exit();
} 
else 
{
    $error_message = "You did not entered any value!";
    echo "<script>alert('$error_message');</script>";
}

?>
