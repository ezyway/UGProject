<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	include("../connection.php");

?>
<html>
	<head>
		<link rel='stylesheet' href='../style/adminFeedback.css'></link>
		<title>Feedbacks</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>	
	<table>
		<caption>Feedbacks</caption>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>E-mail</th>
			<th>Phone</th>
			<th>Date</th>
			<th>Time</th>
			<th>IP</th>
			<th>Feedback</th>
			<th>Reply</th>
			<th>Delete</th>
		</tr>
		<?php
			$result=$con_obj->query_s("select * from feedback");
			while($temp=mysqli_fetch_array($result))
			{
				?>
					<tr>
						<td><?php echo $temp[0]; ?></td>
						<td><?php echo $temp[1]; ?></td>
						<td><?php echo $temp[2]; ?></td>
						<td><?php echo $temp[3]; ?></td>
						<td><?php echo $temp[4]; ?></td>
						<td><?php echo $temp[5]; ?></td>
						<td><?php echo $temp[6]; ?></td>
						<td><?php echo $temp[7]; ?></td>
						<td><a href="mailto:<?php echo $temp[2]; ?>?Subject=Reply%20from%20<?php echo $_SESSION["username"] ?>"> Reply to <?php echo $temp[1]; ?></a></td>
						<td><a href="feedback.php?id=<?php echo $temp[0]; ?>"><img src="../assets/images/icons/del.png"></img></a></td>
			</tr>
				<?php
			}
		?>
	</table>
</body>
</html>
<?php
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$con_obj->query_idu("delete from feedback where no='$id'");
		$_GET["id"]=null;
		echo "<script>window.location='feedback.php';</script>";
	}
}
else
{
	header("Location:login.php");
}
?>