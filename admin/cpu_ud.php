<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	include("../connection.php");
?>
<html>
	<head>
		<link rel='stylesheet' href='../style/cpu_ud.css'></link>
		<title>Update/Delete a CPU</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<table border='0' width='100%'>
		<caption>CPU Details</caption>
		<tr>
			<th>ID</th>
			<th>Series</th>
			<th>Name</th>
			<th>Core / Thread</th>
			<th>Stock Speed</th>
			<th>Boost Speed</th>
			<th>Transistor Size</th>
			<th>Total Cache</th>
			<th>L1 Cache</th>
			<th>L2 Cache</th>
			<th>L3 Cache</th>
			<th>Cooler</th>
			<th>TDP</th>
			<th>Prize</th>
			<th>Discount</th>
			<th>URL</th>
			<th>Type</th>
			<th>Image</th>
		</tr>
		<?php
			$result=$con_obj->query_s("select * from cpu");
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
				echo "<td><a href='".$temp[15]."'>Amazon Link</a></td>";
				echo "<td>".$temp[16]."</td>";
				echo "<td><img height='100px' width='100px' src='../".$temp[17]."'></img></td>";
				echo "</tr>";	
			}
		?>
	</table>
	
	<div class="belowRecords">
		<form action="#" method="POST" enctype='multipart/form-data'>
			<?php
				if(isset($_POST["UpdateCPU"]))
				{
					$id=$_POST['id'];
					$name=$_POST['name'];
					$series=$_POST['series'];
					$cores_threads=$_POST['cores_threads'];
					$stock_freq=$_POST['stock_freq'];
					$boost_freq=$_POST['boost_freq'];
					$transistor_size=$_POST['transistor_size'];
					$total_cache=$_POST['total_cache'];
					$l1=$_POST['l1'];
					$l2=$_POST['l2'];
					$l3=$_POST['l3'];
					$cooler=$_POST['cooler'];
					$TDP=$_POST['TDP'];
					$prize=$_POST['prize'];
					$url=$_POST['url'];
					$hardware_type=$_POST['hardware_type'];
					
					//Uploading Image
					$root=$_SERVER['DOCUMENT_ROOT'];
					
					$file_name=$_FILES['cpu_pic']['name'];
					$tmp_name=$_FILES['cpu_pic']['tmp_name'];
					$path=$root."/project/upload/cpu/".$file_name;
					$urlPic="upload/cpu/".$file_name;
					
					move_uploaded_file($tmp_name,$path);
					
					
					$query="update cpu set series='$series',name='$name',cores_threads='$cores_threads',stock_freq='$stock_freq',boost_freq='$boost_freq',transistor_size='$transistor_size',total_cache='$total_cache',l1='$l1',l2='$l2',l3='$l3',cooler='$cooler',TDP='$TDP',prize='$prize',url='$url',type='$hardware_type',img='$urlPic' where no='$id'";
					
					$returns = $con_obj->query_idu($query);
					
					if($returns)
						echo "Product was Updated Successfully. <a href='cpu_ud.php'> Click Here </a>to go back.";
					else
						echo "Product was not Updated. <a href='cpu_ud.php'> Click Here </a>to go back.";

				}
				elseif(isset($_POST["update"]))
				{
					/* Getting info from the DB about the CPU to be updated */
					$id=$_POST["id"];
					$result=$con_obj->query_s("select * from cpu where no='$id'");

					if(mysqli_num_rows($result)>0)
					{
						while($temp=mysqli_fetch_array($result))
						{
						?>
							<div class='main_container'>
								<div class='row'>
									<h1>Update This CPU</h1>
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
											<input type='text' name='cores_threads' id='' class='input' required value="<?php echo $temp[3]; ?>">
											<span class='bar col3bar'></span>
											<label>Cores/Threads</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='stock_freq' id='' class='input' required value="<?php echo $temp[4]; ?>">
											<span class='bar col3bar'></span>
											<label>Stock Frequency</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='boost_freq' id='' class='input' required value="<?php echo $temp[5]; ?>">
											<span class='bar col3bar'></span>
											<label>Boost Frequency</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='transistor_size' id='' class='input' required value="<?php echo $temp[6]; ?>">
											<span class='bar'></span>
											<label>Transistor Size</label>
										</div>
									</div>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='total_cache' id='' class='input' required value="<?php echo $temp[8]; ?>">
											<span class='bar'></span>
											<label>Total Cache</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='l1' id='' class='input' required value="<?php echo $temp[8]; ?>">
											<span class='bar col4bar'></span>
											<label>L1 Cache</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='l2' id='' class='input' required value="<?php echo $temp[9]; ?>">
											<span class='bar col4bar'></span>
											<label>L2 Cache</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='l3' id='' class='input' required value="<?php echo $temp[10]; ?>">
											<span class='bar col4bar'></span>
											<label>L3 Cache</label>
										</div>
									</div>
									<div class='col4'>
										<div class='group'>
											<input type='text' name='TDP' id='' class='input' required value="<?php echo $temp[12]; ?>">
											<span class='bar col4bar'></span>
											<label>TDP</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='cooler' id='' class='input' required value="<?php echo $temp[11]; ?>">
											<span class='bar'></span>
											<label>Included Thermal Solution</label>
										</div>
									</div>
									<div class='col2'>
										<div class='group'>
											<input type='text' name='prize' id='' class='input' required value="<?php echo $temp[13]; ?>">
											<span class='bar'></span>
											<label>Prize</label>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col3'>
										<div class='group'>
											<input type='text' name='url' id='' class='input' required value="<?php echo $temp[15]; ?>">
											<span class='bar col3bar'></span>
											<label>Amazon URL</label>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											Server Grade<input type='radio' name='hardware_type' value='server' required>
											
											<br>
											
											Consumer Grade<input type='radio' name='hardware_type' value='consumer'>
										</div>
									</div>
									<div class='col3'>
										<div class='group'>
											<input type='file' name='cpu_pic' id='fileUpload'>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col2'>
										<div class='group'>
											<input type='button' value="Cancel" id="cancel" onclick="window.location.href='cpu_ud.php'">
										</div>
									</div>
									<div class='col2'>
										<div class='group'>
											<input type='submit' value="Update" name='UpdateCPU' id='submit'>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
					}
					else
					echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='cpu_ud.php'> Click Here </a>to go back. <div>";
				}
				elseif(isset($_POST["delete"]))
				{
					$id=$_POST["id"];
					$result=$con_obj->query_idu("delete from cpu where no='$id'");
					
					if(mysqli_affected_rows($con_obj->con)>0)
					{
						echo "<div class='textMessage'> The Records were Deleted. <a href='cpu_ud.php'> Click Here </a>to go back. <div>";
						//echo "<script>window.location='cpu_ud.php';</script>";
					}
					else
						echo "<div class='textMessage'> No records were found at ID Number ".$id." <a href='cpu_ud.php'> Click Here </a>to go back. <div>";
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