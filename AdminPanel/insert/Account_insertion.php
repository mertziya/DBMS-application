<?php 

include "../config.php"; 

if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['mail']) && !empty($_POST['pass_word'])){ 
    
    $name = $_POST['name']; 
    $surname = $_POST['surname']; 
    $mail = $_POST['mail'];
    $pass_word = $_POST['pass_word'];
    

    $sql_statement = "INSERT INTO Accounts(name, surname, mail, pass_word) VALUES ('$name','$surname','$mail','$pass_word')"; 

    $result = mysqli_query($db, $sql_statement);
    header('Location: http://localhost/CaffeineEmporium/AdminPanel/tables/entities/AccountsTable.php');
    exit();
} 
else 
{
    $error_message = "You did not entered all the values!";
    echo "<script>alert('$error_message');</script>";
}

?>
