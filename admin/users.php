<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	include('../connection.php');
?>
<html>
	<head>
		<link rel='stylesheet' href='../style/adminUsers.css'></link>
		<title>Users...!</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<form action='#' method="POST">
		<table>
			<caption>Users</caption>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Password</th>
				<th>Mobile Number</th>
				<th>E-mail</th>
				<th>Date of Birth</th>
				<th>Admin</th>
				<th>Delete</th>
			</tr>
			
			<?php
				$query="select * from login";
				$result=$con_obj->query_s($query);
				while($temp=mysqli_fetch_array($result))
				{
					?>
						<tr>
							<td><?php echo $temp[0]; ?></td>
							<td><?php echo $temp[1]; ?></td>
							<td><?php echo $temp[2]; ?></td>
							<td><?php echo $temp[3]; ?></td>
							<td><?php echo $temp[4]; ?></td>
							<td><?php echo $temp[6]; ?></td>
							<td><?php echo $temp[7]; ?></td>
							<td><?php echo $temp[8]; ?></td>
							<!--<td><?php if($temp[5]) echo "Yes"; else echo "No"; ?></td>-->
							<td><img src="../assets/images/icons/<?php if($temp[5]) echo "yes.png"; else echo "no.png"; ?>" onclick="window.location='users.php?makeAdmin=<?php echo $temp[0]; ?>&adminStatus=<?php echo $temp[5]; ?>'"></img></td>
							<td><img src="../assets/images/icons/del.png" onclick="window.location='users.php?deleteId=<?php echo $temp[0]; ?>'"></img></td>
						</tr>
					<?php
				}
			?>
			
		</table>
	</form>
</body>
</html>

<?php
	if(isset($_GET["makeAdmin"]) && isset($_GET["adminStatus"]))
	{
		$id=$_GET["makeAdmin"];
		$status=$_GET["adminStatus"];
		
		if($status==1) //Inverting the status for the query
			$status=0;
		else
			$status=1;

		$con_obj->query_idu("UPDATE login SET admin='$status' WHERE no='$id'");
		echo "<script>window.location='users.php';</script>";
	}
	if(isset($_GET["deleteId"]))
	{
		$id=$_GET["deleteId"];

		$con_obj->query_idu("DELETE FROM login WHERE no='$id'");
		echo "<script>window.location='users.php';</script>";
	}
}
else
{
	header("Location:login.php");
}	
?>