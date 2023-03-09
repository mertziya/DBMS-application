<?php 

include "../config.php"; 

if (!empty($_POST['eq_name']) || !empty($_POST['eq_type']) || !empty($_POST['Brand']) || !empty($_POST['Description']) || !empty($_POST['Price'])){ 
    
    $eq_name = $_POST['eq_name']; 
    $eq_type = $_POST['eq_type']; 
    $Brand = $_POST['Brand'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    
    if (isset($_POST['Price']) && !empty($_POST['Price'])) {
        $sql_statement = "INSERT INTO Equipments(eq_name, eq_type, Brand, Description, Price) VALUES ('$eq_name','$eq_type','$Brand','$Description',$Price)";
    } 
    else {
        $sql_statement = "INSERT INTO Equipments(eq_name, eq_type, Brand, Description) VALUES ('$eq_name','$eq_type','$Brand','$Description')";
    }

    

    $result = mysqli_query($db, $sql_statement);
    header('Location: http://localhost/CaffeineEmporium/AdminPanel/tables/entities/EquipmentsTable.php');
    exit();
} 
else 
{
    $error_message = "You did not entered any value!";
    echo "<script>alert('$error_message');</script>";
}

?>
