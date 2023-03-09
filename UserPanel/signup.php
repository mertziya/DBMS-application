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

		if(!empty($mail) && !empty($pass_word) && !is_numeric($mail))
		{

			//save to database
			
			$query = "insert into Accounts (mail,pass_word) values ('$mail','$pass_word')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body style="background-color:#FAFAFA;">
	
	<div id="box">
		
		<form method="post">
			<div class="login">Sign up</div>

			Mail: <input id="text" type="text" name="mail"><br><br>
			Password: <input id="text" type="password" name="pass_word"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			
		</form>
	</div>
	<a href="login.php" style="margin-left:600px">Click to Login</a><br><br>
</body>
</html>