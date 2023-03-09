<?php

include "../config.php";

if(!empty($_POST['acc_id']))
{
    $acc_id = $_POST['acc_id'];
    $sql_statement = "DELETE FROM Accounts WHERE acc_id = $acc_id";
    $result = mysqli_query($db, $sql_statement);
    echo "The Account with " . $acc_id . " is deleted";
}
else{
    echo "account id not found";
}
?>