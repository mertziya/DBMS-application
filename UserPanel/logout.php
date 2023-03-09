<?php

session_start();

if(isset($_SESSION['acc_id']))
{
	unset($_SESSION['acc_id']);

}

header("Location: login.php");
die;