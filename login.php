	<?php

	session_start();

		//$_SESSION["WrongUsername"]=false;
		//$_SESSION["WrongPassword"]=false;

		
		//Checking to initialize "WrongUsername" Variable
		if(isset($_SESSION["WrongUsername"]))
		{
			//There is a value in it
		}
		else
		{
			//There is no value in it, So initializing the value
			$_SESSION["WrongUsername"]=false;
		}
		
		//Checking to initialize "WrongPassword" Variable
		if(isset($_SESSION["WrongPassword"]))
		{
			//There is a value in it
		}
		else
		{
			//There is no value in it, So initializing the value
			$_SESSION["WrongPassword"]=false;
		}

?>
<html>
	<head>
		<title>Login</title>
		<link rel='stylesheet' href="style/login.css"></link>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
			});
		</script>
	</head>
<body>

	<div class="mainVideoContainer">

		<?php
			if($_SESSION["WrongUsername"] OR $_SESSION["WrongPassword"])
				echo "<div class='colorOverlayRed'></div>";
			else
				echo "<div class='colorOverlayNormal'></div>";
		?>

		
		
		<div class="homeButtonColorOverlay" onclick="window.location='home.php'"></div>
		<img src='assets/images/icons/home.png' alt='Home' onclick="window.location='home.php'"></img>
		
		

		<form action="#" method='POST'>
			<table border='0'>
				
				<tr>
					<td id='heading'>
						<?php
							if($_SESSION["WrongUsername"])
							{
								echo "<div style='color:red'>Wrong Username</div>";
								$_SESSION["WrongUsername"]=false;
							}
							elseif($_SESSION["WrongPassword"])
							{
								echo "<div style='color:red'>Wrong Password</div>";
								$_SESSION["WrongPassword"]=false;
							}
							else
								echo "Login";
						?>
					</td>
				</tr>
				
				<tr>
					<td class='tdInput'>
						<div class='group' id='username'>
							<input type='text' name='username' class='input' required>
							<span class='bar'></span>
							<label>Username</label>
						</div>
					
						<div class='group' id='password'>
							<input type='password' name='password' class='input' required>
							<span class='bar'></span>
							<label>Password</label>
						</div>
					</td>
				</tr>
				
				<tr>
					<td class='registerTd'>No account? <a href='register.php'>Register Now</a></td>
				</tr>

				<tr>
					<td class='tdSubmit'>
						<input type='submit' name='submit' value="Submit" id='submit' required>
					</td>
				</tr>
			</table>
		</form>
		
		<video autoplay loop muted>
			<source src='assets/videos/amdTrailer_login.mp4'>
		</video>
	</div>
	
</body>
</html>

<?php
	if(isset($_POST["submit"]))
	{
		include("connection.php");

		$username=$_POST["username"];
		$password=$_POST["password"];

		$result=$con_obj->query_s("select * from login where username='$username'");
		
		if(mysqli_num_rows($result)>0) //To check is Username exists
		{
			$_SESSION["WrongUsername"]=false;
			$result=$con_obj->query_s("select * from login where username='$username' and password='$password'");
			
			if(mysqli_num_rows($result)>0) //If the Password is Correct then
			{
				$_SESSION["WrongPassword"]=false;
			
				$_SESSION["login"]=true;

				//Getting First name to set into the SESSION
				$temp=mysqli_fetch_array($result);
				$_SESSION["FirstName"]=$temp["first_name"];

				$_SESSION["username"]=$username;

				header("Location:index.php");
			}
			else
			{
				$_SESSION["WrongPassword"]=true;
				header("Location:login.php");
			}
		}
		else
		{
			$_SESSION["WrongUsername"]=true;
			header("Location:login.php");
		}

	}
?>