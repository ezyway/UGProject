<?php
	session_start();

	//$_SESSION["login"]=false;

	if(isset($_SESSION["login"]))
	{
		//Login Variable has some value
	}
	else
	{
		$_SESSION["login"]="RandomValue";
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="style/nav.css"></link>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="http://localhost/project/home.php">Home</a></li>
				<li><a href="http://localhost/project/assets/processor_select.php">Processors</a></li>
				<li><a href="http://localhost/project/assets/gpu_select.php">Graphic Cards</a></li>
				<li><a href="http://localhost/project/games.php">Games</a></li>
				<li><a href="http://localhost/project/assets/newsDisplay.php">News</a></li>
				<li><a href="http://localhost/project/aboutUS.php">About Us</a></li>
				<li id='login'>
					<?php
						if($_SESSION["login"] === true)
						{
							echo "<a href='http://localhost/project/accountDisplay.php'>Welcome ".$_SESSION["FirstName"]."</a>";
						}
						else
						{
							echo "<a href='http://localhost/project/login.php'>Login</a>";
						}
					?>
				</li>
			</ul>
		</nav>
	</body>
</html>