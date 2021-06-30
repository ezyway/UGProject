<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	include("../connection.php");

?>
<html>
	<head>
		<link rel='stylesheet' href='../style/news_ud.css'></link>
		<title>Update/Delete a News Post</title>
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
	<table>
		<caption>News Details</caption>
		<tr>
			<th>id</th>
			<th>Uploader</th>
			<th>Topic</th>
			<th>Content</th>
			<th>Date</th>
			<th>Time</th>
			<th>IP</th>
		</tr>
		<?php
			$result=$con_obj->query_s("select * from news");
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
			</tr>
				<?php
			}
		?>
	</table>
	<div class="belowRecords">
		<form action="#" method="POST">
			<?php
				if(isset($_POST["UpdateNews"]))
				{
					$id=$_POST['id'];
					$name=$_POST['name'];
					$about=$_POST['about'];
					$content=$_POST['content'];
					$date=$_POST['date'];
					$time=$_POST['time'];
					$ip=$_SERVER['REMOTE_ADDR'];
					
					$query="update news set name='$name', about='$about', content='$content', date='$date', time='$time', ip='$ip' where id='$id'";
					
					$returns = $con_obj->query_idu($query);
					
					if($returns)
						echo "News was Updated Successfully. <a href='news_ud.php'> Click Here </a>to go back.";
					else
						echo "News was not Updated. <a href='news_ud.php'> Click Here </a>to go back.";

				}
				elseif(isset($_POST["update"]))
				{
					/* Getting info from the DB about the News to be updated */
					$id=$_POST["id"];
					$result=$con_obj->query_s("select * from news where id='$id'");

					if(mysqli_num_rows($result)>0)
					{
						while($temp=mysqli_fetch_array($result))
						{
						?>
							<div class="mainFormContainer">
								
								<div class="headingCol">
									Update News	
									<input type='text' value="<?php echo $temp[0]; ?>" name='id' hidden>
									<input type='text' name='date' class='date_textbox' hidden>
									<input type='text' name='time' class='time_textbox' hidden>
								</div>

								<div class="colInputName">
									<div class='group'>
										<input type='text' name='name' value='<?php echo $temp[1]; ?>' class='input' required>
										<span class='bar'></span>
										<label>Full Name</label>
									</div>
								</div>

								<div class="colInputAbout">
									<div class='group'>
										<input type='text' name='about' class='input' required value='<?php echo $temp[2]; ?>'>
										<div class='bar'></div>
										<label>About</label>
									</div>
								</div>

								<div class="colInputContent">
									<div class='group'>
										<textarea class='input' name='content' required><?php echo $temp[3]; ?></textarea>
										<span class='bar'></span>
										<label>News Content</label>
									</div>
								</div>

								<div class="colButton">
									<div class="row">
										<input type='button' value="Cancel" id="cancel" onclick="window.location.href='news_ud.php'">
									</div>
									<div class="row">
										<input type='submit' value='Submit &#8594;' name='UpdateNews' id='submit'>
									</div>
								</div>

								<div class="marginMaker"></div>

							</div>
						<?php
						}
					}
					else
						echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='news_ud.php'> Click Here </a>to go back. <div>";
				}
				elseif(isset($_POST["delete"]))
				{
					$id=$_POST["id"];
					$result=$con_obj->query_idu("delete from news where id='$id'");
					
					if(mysqli_affected_rows($con_obj->con)>0)
					{
						echo "<div class='textMessage'> The Records were Deleted. <a href='news_ud.php'> Click Here </a>to go back. <div>";
						//echo "<script>window.location='news_ud.php';</script>";
					}
					else
						echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='news_ud.php'> Click Here </a>to go back. <div>";
				}
				else
				{
					?>
						<div class="udButton">
							<div>
								<input type="submit" value="Edit" name="update" id='update'>
							</div>
						
							<div>
								<div class="group" style="width:350px;">
									<input type='text' name='id' class='input' required>
									<span class='bar'></span>
									<label>Enter the ID</label>
								</div>
							</div>
							
							<div>
								<input type="submit" value="Delete" name="delete" id='delete'>
							</div>
						</div>
					<?php
				}
			?>
		</form>
	</div>	
</body>
</html>
<?php
}
else
{
	header("Location:login.php");
}
?>