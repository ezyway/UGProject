<?php
	session_start();


	//$_SESSION["WrongUsername"]=false;
	//$_SESSION["WrongPassword"]=false;
	//$_SESSION["admin"]=false;

	
	//Checking to initialize "admin" Variable
	if(isset($_SESSION["NotAdmin"]))
	{
		//There is a value in it
	}
	else
	{
		//There is no value in it, So initializing the value
		$_SESSION["NotAdmin"]="RandomValue";
	}

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
		<link rel='stylesheet' href="../style/adminLogin.css"></link>
		<title>Log In for Admins</title>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>

	<div class="homeButtonColorOverlay" onclick="window.location='home.php'"></div>
	<img src='../assets/images/icons/home.png' alt='Home' onclick="window.location='../home.php'"></img>

    <form action="#" method='POST'>
		<table border='0'>
			   
            <!--Color Overlay Start-->
            <?php
                if($_SESSION["WrongUsername"] OR $_SESSION["WrongPassword"] OR !$_SESSION["NotAdmin"])
                    echo "<div class='colorOverlayRed'></div>";
                else
                    echo "<div class='colorOverlayNormal'></div>";
            ?>
            <!--Color Overlay Over-->

	    	<tr>
				<td id='heading'>
                    <div class="group headingGroup">
                        <?php
                            if($_SESSION["WrongUsername"])
                            {
                                echo "<div style='color:red'>Wrong Username</div>";
                                $_SESSION["WrongUsername"]=null;
                            }
                            elseif($_SESSION["WrongPassword"])
                            {
                                echo "<div style='color:red'>Wrong Password</div>";
                                $_SESSION["WrongPassword"]=null;
                            }
                            elseif(!$_SESSION["NotAdmin"])
                            {
                                echo "<div style='color:red'>You are not an Admin</div>";
                                $_SESSION["NotAdmin"]=null;
                            }
                            else
                                echo "Admin Login";
                        ?>
                    </div>
				</td>
			</tr>
			
			<tr>
				<td class='tdInput'>
					<div class='group'>
						<input type='text' name='username' class='input' required>
						<span class='bar'></span>
						<label>Username</label>
					</div>
					
					<div class='group'>
						<input type='password' name='password' class='input' required>
						<span class='bar'></span>
						<label>Password</label>
					</div>
				</td>
			</tr>
			
			<tr>
				<td class='tdSubmit'>
                    <div class='group submitGroup'>
                        <input type='submit' name='submit' value="Submit" id='submit' required>
                    </div>
				</td>
			</tr>
		</table>
	</form>
		
</body>
</html>

<?php
	if(isset($_POST["submit"]))
	{
		include("../connection.php");

		$username=$_POST["username"];
		$password=$_POST["password"];

		$result=$con_obj->query_s("select * from login where username='$username'");
		
		if(mysqli_num_rows($result)>0) //To check if Username exists
		{
			$_SESSION["WrongUsername"]=false;
			$result=$con_obj->query_s("select * from login where username='$username' and password='$password'");
			
			if(mysqli_num_rows($result)>0) //If the Password is Correct then
			{
                $_SESSION["WrongPassword"]=false;
                $result=$con_obj->query_s("select * from login where username='$username' and password='$password' and admin=1");
                if(mysqli_num_rows($result)>0) //if the admin=1 then
                {
                    $_SESSION["admin"]=true;
					$_SESSION["login"]=true;
					//Getting First name to set into the SESSION
					$temp=mysqli_fetch_array($result);
					$_SESSION["FirstName"]=$temp["first_name"];
					
                    $_SESSION["username"]=$username;
                    header("Location:index.php");
                }
                else
                {
                    $_SESSION["NotAdmin"]=false;
                    header("Location:login.php");
                }
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