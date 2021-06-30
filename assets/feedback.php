<?php
	include("nav.php");

	if(isset($_SESSION["queryStatusFeedback"]))
	{
		//Value is already there
	}
	else
	{
		$_SESSION["queryStatusFeedback"]="RandomValue";
	}
	
	
	include('../connection.php');
	if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		
		$query="select * from login where username='$username'";
		
		$result=$con_obj->query_s($query);
		
		while($temp=mysqli_fetch_array($result))
		{
			$first_name=$temp[1];
			$last_name=$temp[2];
			$username=$temp[3];
			$mobile_number=$temp[6];
			$email=$temp[7];
		}
?>
<html>
	<head>
		<title>Send Us Your Feedback</title>
		<link rel="stylesheet" href="../style/feedback.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
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
			<tr>
				<td class='heading'>
					<?php						
						if($_SESSION["queryStatusFeedback"] == "Inserted")
						{
							echo "Your Feedback was noted";
							$_SESSION["queryStatusFeedback"]="RandomValue";
						}
						elseif($_SESSION["queryStatusFeedback"] == "Not Inserted")
						{
							echo "Your Feedback was not noted";
							$_SESSION["queryStatusFeedback"]="RandomValue";
						}
						else
							echo "Leave a Feedback for US";
					?>
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
						<input type='text' name='email' value='<?php echo $email; ?>' class='input' required>
						<div class='bar'></div>
						<label>E-mail</label>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class='group'>
					<textarea class='input' name='feedback' required></textarea>
					<span class='bar'></span>
					<label>Feedback</label>
					</div>
				</td>
			</tr>
			<tr>
				<td><input type='submit' value='Submit &#8594;' name='submit' class='submit'></td>
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
		$name=$_POST['name'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$feedback=$_POST['feedback'];
		
		$query="insert into feedback(name,email,phone,date,time,ip,feedback) values('$name','$email','$mobile_number','$date','$time','$ip','$feedback')";
		
		$result=$con_obj->query_idu($query);
		
		if($result)
		{
			$_SESSION["queryStatusFeedback"] = "Inserted";
			echo "<script>window.location='feedback.php';</script>";
		}
		else
		{
			$_SESSION["queryStatusFeedback"] = "Not Inserted";
			echo "<script>window.location='feedback.php';</script>";
		}
	}
	include("footer.php");
}
else
{
	header("Location:../login.php");
}
?>