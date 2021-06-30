<?php	
session_start();
if($_SESSION["login"])
{
	include("nav.php");
	include("connection.php");
?>
<html>
	<head>
		<title>Account Details</title>
		<link rel='stylesheet' href="style/accountDisplay.css"></link>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<div class="spacer"></div>
	
		<table border='0' align='center' cellspacing='20px'>

			<?php
				$username=$_SESSION["username"];
				$result=$con_obj->query_s("SELECT * FROM login WHERE username='$username'");
				while($temp=mysqli_fetch_array($result))
				{
			?>

			<tr>
				<td colspan='3' class='headingTd'><?php echo ucfirst($temp[1])." ".ucfirst($temp[2]); ?></td>
			</tr>

			<tr>
				<td class='dataTd'>User ID: <?php echo $temp[0]; ?></td>
				<td class='dataTd'>Username: <?php echo $temp[3]; ?></td>
				<td class='dataTd'>Admin: <?php 
								if($temp[5])
									echo "YES";
								else
									echo "NO";
							 ?></td>
			</tr>
			
			<tr>
				<td class='dataTd'>Mobile Number:<?php echo $temp[6]; ?></td>
				<td class='dataTd'>Email: <?php echo $temp[7]; ?></td>
				<td class='dataTd'>Date of Birth: <?php echo $temp[8]; ?></td>
			</tr>

			<tr>
				<td colspan='3' class='buttonTd'><button onclick="window.location='logout.php'">Log Out</button></td>
			</tr>
			<?php
				}
			?>
		</table>
</body>
</html>
<?php
	include("footer.php");
}
else
{
	header("Location:login.php");
}
?>