<html>
	<head>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				var dt=new Date();
				var month=["January","February","March","April","May","June","July","August","September","October","November","December"];
				var date=dt.getDate() +' - '+ month[dt.getMonth()] +' - '+ dt.getFullYear();
				
				var hours=dt.getHours() == 0 ? 12 : dt.getHours();
				var time=(dt.getHours() < 12 ? hours : dt.getHours()-12) +':'+ ('0' + dt.getMinutes()).slice(-2) +':'+ ('0' + dt.getSeconds()).slice(-2) +' '+(dt.getHours() < 12 ? "AM" : "PM");
				
				$(".date_textbox").val(date);
				$(".time_textbox").val(time);
				
				$("#submit").click();
			});
		</script>
	</head>
<body>
	<form action="#" method='POST'>
		<input type='text' name='date' class='date_textbox'>
		<input type='text' name='time' class='time_textbox'>
		<input type='submit' name='Submit' id='submit'>
	</form>
</body>
</html>
<?php

include("connection.php");

if(isset($_POST['Submit']))
{
	$date=$_POST['date'];
	$time=$_POST['time'];
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$query="insert into index_page_visits(ip,time,date) values('$ip','$time','$date')";
	
	$returns = $con_obj->query_idu($query);
	
	header('Location:home.php');
}		
?>