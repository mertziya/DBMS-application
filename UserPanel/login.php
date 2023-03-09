<link rel="stylesheet" href="styles.css">

<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$mail = $_POST['mail'];
		$pass_word = $_POST['pass_word'];

		if(!empty($mail) && !empty($pass_word) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from Accounts where mail = '$mail' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass_word'] === $pass_word)
					{

						$_SESSION['acc_id'] = $user_data['acc_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body style="background-color: #FAFAFA;">

	<div id="box">
		
		<form method="post">
			<div class="login">Login</div>

			Mail: <input id="text" type="text" name="mail"><br><br>
			Password: <input id="text" type="password" name="pass_word"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			
		</form>
	</div>
	<a href="signup.php" style="margin-left:600px">Click to Signup</a><br><br>
</body>
</html>