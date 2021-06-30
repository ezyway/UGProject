<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	include("../connection.php");
?>

<html>
	<head>
		<link rel='stylesheet' href='../style/gpu_ud.css'></link>
		<title>Update/Delete a GPU</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<table border='0' width='100%'>
		<caption>GPU Details</caption>
		<tr>
			<th>ID</th>
			<th>Series</th>
			<th>Name</th>
			<th>Compute Units</th>
			<th>Stream Processors</th>
			<th>Texture Units</th>
			<th>Stock Speed</th>
			<th>Boost Speed</th>
			<th>Game Speed</th>
			<th>Transistor Size</th>
			<th>Transistor Count</th>
			<th>Output Ports</th>
			<th>Memory Type</th>
			<th>VRAM</th>
			<th>Prize</th>
			<th>Discount</th>
			<th>Amazon URL</th>
			<th>Type</th>
			<th>Image</th>
		</tr>
		<?php
			$result=$con_obj->query_s("select * from gpu");
			while($temp=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>".$temp[0]."</td>";
				echo "<td>".$temp[1]."</td>";
				echo "<td>".$temp[2]."</td>";
				echo "<td>".$temp[3]."</td>";
				echo "<td>".$temp[4]."</td>";
				echo "<td>".$temp[5]."</td>";
				echo "<td>".$temp[6]."</td>";
				echo "<td>".$temp[7]."</td>";
				echo "<td>".$temp[8]."</td>";
				echo "<td>".$temp[9]."</td>";
				echo "<td>".$temp[10]."</td>";
				echo "<td>".$temp[11]."</td>";
				echo "<td>".$temp[12]."</td>";
				echo "<td>".$temp[13]."</td>";
				echo "<td>".$temp[14]."</td>";
				echo "<td>".$temp[15]."</td>";
				echo "<td><a href='".$temp[16]."'>Amazon Link</a></td>";
				echo "<td>".$temp[17]."</td>";
				echo "<td><img height='100px' width='100px' src='../".$temp[18]."'></img></td>";
				echo "</tr>";	
			}
		?>
	</table>

	<div class="belowRecords">
		<form action="#" method="POST" enctype='multipart/form-data'>
			<?php
				if(isset($_POST["UpdateGPU"]))
				{
					$id=$_POST['id'];
					$name=$_POST['name'];
					$series=$_POST['series'];
					$compute_units=$_POST['compute_units'];
					$stream_processors=$_POST['stream_processors'];
					$texture_units=$_POST['texture_units'];
					$stock_freq=$_POST['stock_freq'];
					$boost_freq=$_POST['boost_freq'];
					$game_freq=$_POST['game_freq'];
					$transistor_size=$_POST['transistor_size'];
					$transistor_count=$_POST['transistor_count'];
					$output=$_POST['output'];
					$memory_type=$_POST['memory_type'];
					$vram=$_POST['vram'];
					$prize=$_POST['prize'];
					$url=$_POST['url'];
					$hardware_type=$_POST['hardware_type'];
					
					//Uploading Image
					$root=$_SERVER['DOCUMENT_ROOT'];
	
					$file_name=$_FILES['gpu_pic']['name'];
					$tmp_name=$_FILES['gpu_pic']['tmp_name'];
					$path=$root."/project/upload/gpu/".$file_name;
					$urlPic="upload/gpu/".$file_name;
					
					move_uploaded_file($tmp_name,$path);
					
					$query="update gpu set series='$series', name='$name',compute_units='$compute_units', stream_processors='$stream_processors', texture_units='$texture_units', stock_freq='$stock_freq', boost_freq='$boost_freq', game_freq='$game_freq', transistor_size='$transistor_size', transistor_count='$transistor_count', output='$output',memory_type='$memory_type', VRAM='$vram', prize='$prize', url='$url', type='$hardware_type', img='$urlPic' where no='$id'";
					
					$returns = $con_obj->query_idu($query);
					
					if($returns)
						echo "Product was Updated Successfully. <a href='gpu_ud.php'> Click Here </a>to go back.";
					else
						echo "Product was not Updated. <a href='gpu_ud.php'> Click Here </a>to go back.";

				}
				elseif(isset($_POST["update"]))
				{
					/* Getting info from the DB about the GPU to be updated */
					$id=$_POST["id"];
					$result=$con_obj->query_s("select * from gpu where no='$id'");

					if(mysqli_num_rows($result)>0)
					{
						while($temp=mysqli_fetch_array($result))
						{
						?>
							<div class='main_container'>
								<div class='row'>
									<h1>Insert a new GPU</h1>
									<input type='text' name='id' hidden value="<?php echo $temp[0]; ?>">
								</div>

								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='series' id='' class='input' required value="<?php echo $temp[1]; ?>">
											<span class='bar'></span>
											<label>Series</label>
										</div>
									</div>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='name' id='' class='input' required value="<?php echo $temp[2]; ?>">
											<span class='bar'></span>
											<label>Name</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='compute_units' id='' class='input' required value="<?php echo $temp[3]; ?>">
											<span class='bar col3bar'></span>
											<label>Compute Units</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='stream_processors' id='' class='input' required value="<?php echo $temp[4]; ?>">
											<span class='bar col3bar'></span>
											<label>Stream Processors</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='texture_units' id='' class='input' required value="<?php echo $temp[5]; ?>">
											<span class='bar col3bar'></span>
											<label>Texture Units</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='stock_freq' id='' class='input' required value="<?php echo $temp[6]; ?>">
											<span class='bar col3bar'></span>
											<label>Stock Frequency</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='boost_freq' id='' class='input' required value="<?php echo $temp[7]; ?>">
											<span class='bar col3bar'></span>
											<label>Boost Frequency</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='game_freq' id='' class='input' required value="<?php echo $temp[8]; ?>">
											<span class='bar col3bar'></span>
											<label>Game Frequency</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col4'>
										<div class='marginMakerNearTransistorSize'></div>
										<div class='group'>
											<input type='text' name='transistor_size' id='' class='input' required value="<?php echo $temp[9]; ?>">
											<span class='bar col4bar'></span>
											<label>Transistor Size</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='transistor_count' id='' class='input' required value="<?php echo $temp[10]; ?>">
											<span class='bar col4bar'></span>
											<label>Transistor Count</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='memory_type' id='' class='input' required value="<?php echo $temp[12]; ?>">
											<span class='bar col4bar'></span>
											<label>Memory Type</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='vram' id='' class='input' required value="<?php echo $temp[13]; ?>">
											<span class='bar col4bar'></span>
											<label>VRAM</label>
										</div>
										<div class='marginMakerNearVRAM'></div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col4c'></div>
									<div class='col4c'></div>
									<div class='col4'>
										<div class='group col4group'>
											<input type='text' name='prize' id='' class='input' required value="<?php echo $temp[14]; ?>">
											<span class='bar col4bar'></span>
											<label>Prize</label>
										</div>
									</div>
									<div class='col4'>
											<input type='file' name='gpu_pic' id='fileUpload' required>
									</div>
								</div>
								
								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<textarea class='input textarea' name='output' required><?php echo $temp[11]; ?></textarea>
											<span class='bar outputBar'></span>
											<label>Output Ports</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											Server Grade<input type='radio' name='hardware_type' value='server' required>
											
											<br>
											
											Consumer Grade<input type='radio' name='hardware_type' value='consumer' required>
										</div>
										<div class='marginMakerNearRadio'></div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='url' id='' class='input' required value="<?php echo $temp[16]; ?>">
											<span class='bar URLBar'></span>
											<label>Amazon URL</label>
										</div>
										<div class='marginMakerNearURL'></div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<input type='button' value="Cancel" id="cancel" onclick="window.location.href='gpu_ud.php'">
										</div>
									</div>
									<div class='col2'>
										<div class='group'>
											<input type='submit' value="Update" name='UpdateGPU' id='submit'>
										</div>
									</div>
								</div>
							</div>
		
						<?php
						}
					}
					else
						echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='gpu_ud.php'> Click Here </a>to go back. <div>";
				}
				elseif(isset($_POST["delete"]))
				{
					$id=$_POST["id"];
					$result=$con_obj->query_idu("delete from gpu where no='$id'");
					
					if(mysqli_affected_rows($con_obj->con)>0)
					{
						echo "<div class='textMessage'> The Records were Deleted. <a href='gpu_ud.php'> Click Here </a>to go back. <div>";
						//echo "<script>window.location='gpu_ud.php';</script>";
					}
					else
						echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='gpu_ud.php'> Click Here </a>to go back. <div>";
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