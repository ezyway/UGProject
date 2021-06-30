<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	
	//$_SESSION["queryStatusNews"]="Not Inserted";
	
	
	if(isset($_SESSION["queryStatusNews"]))
	{
		//Value is already there
	}
	else
	{
		$_SESSION["queryStatusNews"]="RandomValue";
	}
	
	
	include('../connection.php');
	$username=$_SESSION['username'];
	$query="select * from login where username='$username'";
	$result=$con_obj->query_s($query);
	while($temp=mysqli_fetch_array($result))
	{
		$first_name=$temp[1];
		$last_name=$temp[2];
		$username=$temp[3];
	}
?>
<html>
	<head>
		<link rel='stylesheet' href='../style/news_insert.css'></link>
		<title>Insert a New News</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				var dt=new Date();
				var month=["January","February","March","April","May","June","July","August","September","October","November","December"];
				var date=dt.getDate() +' - '+ month[dt.getMonth()] +' - '+ dt.getFullYear();
				
				var hours=dt.getHours() == 0 ? 12 : dt.getHours();
				var time=(dt.getHours() < 12 ? hours : dt.getHours()-12) +':'+ ('0' + dt.getMinutes()).slice(-2) +':'+ ('0' + dt.getSeconds()).slice(-2) +' '+(dt.getHours() < 12 ? "AM" : "PM");
				
				$(".date_textbox").val(date);
				$(".time_textbox").val(time);
			});
		</script>
	</head>
<body>
	<form action='#' method="POST">
		<table>
		
		<!--Color Overlay-->
		<?php
			if($_SESSION["queryStatusNews"] == "Inserted")
				echo "<div class='colorOverlayGreen'></div>";
			elseif($_SESSION["queryStatusNews"] == "Not Inserted")
				echo "<div class='colorOverlayRed'></div>";
			else
				echo "<div class='colorOverlayNormal'></div>";

		?>
		<!--Color Overlay Over-->
		
		
		<!--<div class="colorOverlay"></div>-->
			<tr>
				<td class='heading'>
					<div class="group headingGroup">
						<!-- Inserting the Query Status Message in the Heading -->
						<?php
							
							if($_SESSION["queryStatusNews"] == "Inserted")
							{
								echo "New News has been Inserted";
								$_SESSION["queryStatusNews"]="RandomValue";
							}
							elseif($_SESSION["queryStatusNews"] == "Not Inserted")
							{
								echo "New News was not Inserted";
								$_SESSION["queryStatusNews"]="RandomValue";
							}
							else
							{
								echo "New News";
							}

						?>
					</div>
				</td>
			</tr>
			<tr>
				<td class='details_td'>
					<div class='group'>
						<input type='text' name='name' value='<?php echo $first_name." ".$last_name; ?>' class='input' required>
						<span class='bar'></span>
						<label>Full Name</label>
					</div>
				</td>
			</tr>
			<tr>
				<td class='details_td'>
					<div class='group'>
						<input type='text' name='about' class='input' required>
						<div class='bar'></div>
						<label>About</label>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class='group'>
						<textarea class='input' name='content' required></textarea>
						<span class='bar'></span>
						<label>News Content</label>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="group">
						<input type='submit' value='Submit &#8594;' name='submit' class='submit'>
					</div>
				</td>
			</tr>
			
			<input type='text' name='date' class='date_textbox' hidden>
			<input type='text' name='time' class='time_textbox' hidden>
		</table>
	</form>
</body>
</html>
<?php

	if(isset($_POST['submit']))
	{
		$about=$_POST['about'];
		$content=$_POST['content'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$ip=$_SERVER['REMOTE_ADDR'];
		
		
		$query="insert into news(name,about,content,date,time,ip) values('$username','$about','$content','$date','$time','$ip')";
		
		$returns = $con_obj->query_idu($query);
		
		if($returns)
		{
			$_SESSION["queryStatusNews"] = "Inserted";
			echo "<script>window.location='news_insert.php';</script>";
		}
		else
		{
			$_SESSION["queryStatusNews"] = "Not Inserted";
			echo "<script>window.location='news_insert.php';</script>";
		}
	}		
}
else
{
	header("Location:login.php");
}	
?>