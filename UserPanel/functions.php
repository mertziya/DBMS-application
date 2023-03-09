<?php

function check_login($con)
{

	if(isset($_SESSION['acc_id']))
	{

		$acc_id = $_SESSION['acc_id'];
		$query = "select * from Accounts where acc_id = '$acc_id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}


?>