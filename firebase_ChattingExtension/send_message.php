<?php
include "dbcon.php";
 
// Initialize URL to the variable
$url = $_SERVER['REQUEST_URI'];
     
// Use parse_url() function to parse the URL
// and return an associative array which
// contains its various components
$url_components = parse_url($url);
 
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);

if(isset($_POST['message']))
{
    $name = $_GET['sender'];
    $message = $_POST['message'];
    $sender = $params['sender'];

    $post_data = [
        'message'=> $message,
        'sender' => $sender,
        'time' => date('jS F Y h:i:s A'),
    ];
    $ref_table = "chat";
    $postRef_result = $database->getReference($ref_table)->push($post_data);
    if($sender == 'admin'){
        header("Location: message_admin.php");
    }
    else{
        
        header("Location: message_client.php?name=" . $name);
    }
    
}
 
exit();

?>