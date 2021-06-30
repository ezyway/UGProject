<?php
	session_start();

	//$_SESSION["login"]=false;

	if(isset($_SESSION["FirstName"]))
	{
		//Login Variable has some value
	}
	else
	{
		$_SESSION["FirstName"]="RandomValue";
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="../style/adminNav.css"></link>
	</head>
	<body>
		<div class="navbar">
			<a href="http://localhost/project/admin/index.php">Home</a>
			<div class="dropdown">
				<button class="dropbtn">CPU <font>&#x25BC;</font></button>
				<div class="dropdown-content">
					<a href="http://localhost/project/admin/cpu_insert.php">Insert a CPU</a>
					<a href="http://localhost/project/admin/cpu_ud.php">Update/Delete a CPU</a>
				</div>
			</div> 

			<div class="dropdown">
				<button class="dropbtn">GPU <font>&#x25BC;</font></button>
				<div class="dropdown-content">
					<a href="http://localhost/project/admin/gpu_insert.php">Insert a GPU</a>
					<a href="http://localhost/project/admin/gpu_ud.php">Update/Delete a GPU</a>
				</div>
			</div> 

			<div class="dropdown">
				<button class="dropbtn">News <font>&#x25BC;</font></button>
				<div class="dropdown-content">
					<a href="http://localhost/project/admin/news_insert.php">Insert a News</a>
					<a href="http://localhost/project/admin/news_ud.php">Update/Delete a News</a>
				</div>
			</div>
			<a href="http://localhost/project/admin/feedback.php">Feedbacks</a>
			<a href="http://localhost/project/admin/users.php">Users</a>
			<a href="http://localhost/project/accountDisplay.php" style='float:right'>Welcome, <?php echo $_SESSION["username"]; ?></a>
			<a href="http://localhost/project" style='float:right'>Client Home</a>
		</div> 
	</body>
</html>