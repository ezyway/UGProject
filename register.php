<?php 
	session_start();

	if(isset($_SESSION["UsernameTaken"]))
	{
		//Value is already there
	}
	else
	{
		//The Variable is not initialized 
		$_SESSION["UsernameTaken"] = false;
	}
?>

<html>
	<head>
		<title>Register and Join US..!</title>
		<link rel='stylesheet' href="style/register.css"></link>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				//While Blur on the confirm password
				$("#confirmPassword").blur(function(){
					var password = $("#password").val();
					var confirmPassword = $("#confirmPassword").val();
					if (password != confirmPassword) {
						alert("Passwords do not match.");
						return false;
					}
					return true;
				});

				//while clicking the submit button
				$("#submit").click(function(){
					var password = $("#password").val();
					var confirmPassword = $("#confirmPassword").val();
					if (password != confirmPassword) {
						alert("Passwords do not match.");
						return false;
					}
					return true;
				});



				//Validation for name
				$("#firstName").blur(function(){
					if(!($(this).val().match('^[a-zA-Z]{0,16}$')))
						alert("Names don't have numbers or symbols");
				});
				$("#submit").click(function(){
					if(!($("#firstName").val().match('^[a-zA-Z]{0,16}$')))
					{
						alert("Names don't have numbers or symbols");
						return false;
					}
				});
				$("#lastName").blur(function(){
					if(!($(this).val().match('^[a-zA-Z]{0,16}$')))
						alert("Names don't have numbers or symbols");
				});
				$("#submit").click(function(){
					if(!($("#lastName").val().match('^[a-zA-Z]{0,16}$')))
					{
						alert("Names don't have numbers or symbols");
						return false;
					}
				});
				$("#username").blur(function(){
					if(!($(this).val().match('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}')))
						alert("The Username must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
				});
				$("#submit").click(function(){
					if(!($("#username").val().match('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}')))
					{
						alert("The Username must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
						return false;
					}
				});
				$("#password").blur(function(){
					if(!($(this).val().match('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}')))
						alert("The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
				});
				$("#submit").click(function(){
					if(!($("#password").val().match('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}')))
					{
						alert("The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
						return false;
					}
				});
				$("#mobile").blur(function(){
					if(!($(this).val().match('[7-9]{1}[0-9]{9}')))
						alert("Please check your Phone Number");
				});
				$("#submit").click(function(){
					if(!($("#password").val().match('[7-9]{1}[0-9]{9}')))
					{
						alert("Please check your Phone Number");
						return false;
					}
				});
				$("#email").blur(function(){
					if(!($(this).val().match('[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}')))
						alert("Please check your E-mail");
				});
				$("#submit").click(function(){
					if(!($("#email").val().match('[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}')))
					{
						alert("Please check your E-mail");
						return false;
					}
				});

			
			});
		</script>
	</head>
<body>

	<div class="mainVideoContainer">
	
		<div class="homeButtonColorOverlay" onclick="window.location='home.php'"></div>
		<img src='assets/images/icons/home.png' alt='Home' onclick="window.location='home.php'"></img>

		<?php
			if($_SESSION["UsernameTaken"])
				echo "<div class='colorOverlayRed'></div>";
			else
				echo "<div class='colorOverlayNormal'></div>";
		?>

		<div class='mainFormContainer'>
			<form action="#" method='POST'>
				
				<div class="row">
					<div class="col1">
						<div class="headingText">
							<?php
								if($_SESSION["UsernameTaken"])
									echo "<div style='color:red'>The Username is already taken</div>";
								else
									echo "Register with Us";
							?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col2">
						<div class="group">
							<input type='text' name='firstName' id='firstName' class='input' required>
							<span class='bar'></span>
							<label>First Name</label>
						</div>
						<div class="marginMakerCol2"></div>
					</div>
					<div class="col2">
						<div class="marginMakerCol2"></div>
						<div class="group">
							<input type='text' name='lastName' id='lastName' class='input' required>
							<span class='bar'></span>
							<label>Last Name</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col3">
						<div class="marginMaker"></div>	
						<div class="group">
							<input type='text' name='username' id='username' class='input' required>
							<span class='bar'></span>
							<label>Username</label>
						</div>
					</div>
					<div class="col3">
						<div class="group">
							<input type='password' name='password' id='password' class='input' required>
							<span class='bar'></span>
							<label>Password</label>
						</div>
					</div>
					<div class="col3">
						<div class="group">
							<input type='password' id='confirmPassword' class='input' required>
							<span class='bar'></span>
							<label>Confirm Password</label>
						</div>
						<div class="marginMaker"></div>
					</div>
				</div>

				<div class="row">
					<div class="col3">
						<div class="marginMaker"></div>
						<div class="group">
							<input type='text' name='mobileNumber' id='mobile' class='input' required>
							<span class='bar'></span>
							<label>Mobile Number</label>
						</div>
					</div>
					<div class="col3">
						<div class="group">
							<input type='text' name='email' id='email' class='input' required>
							<span class='bar'></span>
							<label>E-mail</label>
						</div>
					</div>
					<div class="col3">
						<div class="group">
							<input type='date' name='dob' id='' class='input' required>
							<span class='bar'></span>
						</div>
						<div class="marginMaker"></div>
					</div>
				</div>

				<div class="row">
					<div class="col1">
						<div class="goBack">Have an Account? <a href='login.php'>Go Back</a></div>
						<input type='submit' name='submit' value='Submit' id='submit'>
					</div>
				</div>
			</form>
		</div>

		<video autoplay loop muted>
			<source src='assets/videos/trailer_register.mp4'>
		</video>
	</div>

	
</body>
</html>


<?php

	if(isset($_POST["submit"]))
	{
		include('connection.php');

		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$mobileNumber=$_POST['mobileNumber'];
		$email=$_POST['email'];
		$dob=$_POST['dob'];

		
		$result=$con_obj->query_s("select * from login where username='$username'");
		
		if(mysqli_num_rows($result)>0)
		{
			//Username Taken
			$_SESSION['UsernameTaken']=true;
			echo "<script>window.location='register.php'</script>";
		}
		else
		{	
			//Username Available
			$_SESSION['UsernameTaken']=false;
			$con_obj->query_s("insert into login(first_name,last_name,username,password,mobile_number,email,dob) values('$firstName','$lastName','$username','$password','$mobileNumber','$email','$dob')");
			echo "<script>window.location='login.php'</script>";
		}
	}
?>