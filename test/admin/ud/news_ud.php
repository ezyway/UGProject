<?php
	session_start();
	
	include('../connection.php');
	$username="sreyas";    //$_SESSION['username'];
	
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
		<link rel='stylesheet' href='../style/news_insert.css'></link>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				var dt=new Date();
				var month=["January","February","March","April","May","June","July","August","September","October","November","December"];
				var date=dt.getDate() +' - '+ month[dt.getMonth()] +' - '+ dt.getFullYear();
				
				var hours=dt.getHours() == 0 ? 12 : dt.getHours();
				var time=(dt.getHours() < 12 ? hours : dt.getHours()-12) +':'+ ('0' + dt.getMinutes()).slice(-2) +':'+ ('0' + dt.getSeconds()).slice(-2) +' '+(dt.getHours() < 12 ? "AM" : "PM");
				
				$("#date").val(date);
				$("#time").val(time);
			});
		</script>
	</head>
<body>
	<!-- <form action="#" method='POST'>
		Name<input type='text' name='name' id='' value="<?php echo $_SESSION['user1']; ?>" required>
		About<input type='text' name='about' id='' value='Ramdom Thing...!' required>
		Content<textarea name='content' required></textarea>
		<input type='text' name='date' id='date' >
		<input type='text' name='time' id='time' >
		<input type='submit' name='Submit' id='submit'>
	</form> -->
	<form action='#' method="POST">
		<table>
			<tr>
				<td class='heading'>
					New News
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
				<td><input type='submit' value='Submit &#8594;' name='submit' class='submit'></td>
			</tr>
			
			<input type='text' name='date' class='date_textbox' hidden>
			<input type='text' name='time' class='time_textbox' hidden>
		</table>
	</form>
</body>
</html>
<?php

include("../connection.php");

if(isset($_POST['Submit']))
{
	$name=$_POST['name'];
	$about=$_POST['about'];
	$content=$_POST['content'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$ip=$_SERVER['REMOTE_ADDR'];
	
	
	$query="insert into news(name,about,content,date,time,ip) values('$name','$about','$content','$date','$time','$ip')";
	
	$returns = $con_obj->query_idu($query);
	
	if($returns)
		echo "News were Updated Successfully";
	else
		echo "Oops... Query was not fired properly...";
}		
?>