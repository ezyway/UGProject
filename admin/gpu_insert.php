<?php
include("adminNav.php");
if($_SESSION["admin"])
{

	
	//$_SESSION["queryStatusGPU"]="as";
	
	
	if(isset($_SESSION["queryStatusGPU"]))
	{
		//Value is already there
	}
	else
	{
		$_SESSION["queryStatusGPU"]="RandomValue";
	}
?>
<html>
	<head>
		<link rel='stylesheet' href='../style/gpu_insert.css'></link>
		<title>Insert a New GPU</title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<form action="#" method='POST' enctype='multipart/form-data'>
		<div class='main_container'>
			
			<!--Color Overlay-->
			<?php
				if($_SESSION["queryStatusGPU"] == "Inserted")
					echo "<div class='colorOverlayGreen'></div>";
				elseif($_SESSION["queryStatusGPU"] == "Not Inserted")
					echo "<div class='colorOverlayRed'></div>";
				else
					echo "<div class='colorOverlayNormal'></div>";
			?>
			<!--Color Overlay Over-->
			
			<div class='row'>
				<!-- Inserting the Query Status Message in the Heading -->
				<?php
					
					if($_SESSION["queryStatusGPU"] == "Inserted")
					{
						echo "<h1>New GPU has been Inserted</h1>";
						$_SESSION["queryStatusGPU"]="RandomValue";
					}
					elseif($_SESSION["queryStatusGPU"] == "Not Inserted")
					{
						echo "<h1>New GPU was not Inserted</h1>";
						$_SESSION["queryStatusGPU"]="RandomValue";
					}
					else
					{
						echo "<h1>Insert a New GPU</h1>";
					}

				?>
			</div>

			<div class='row'>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='series' id='' class='input' required>
						<span class='bar'></span>
						<label>Series</label>
					</div>
				</div>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='name' id='' class='input' required>
						<span class='bar'></span>
						<label>Name</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='compute_units' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Compute Units</label>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='stream_processors' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Stream Processors</label>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='texture_units' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Texture Units</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='stock_freq' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Stock Frequency</label>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='boost_freq' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Boost Frequency</label>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='game_freq' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Game Frequency</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col4'>
					<div class='marginMakerNearTransistorSize'></div>
					<div class='group'>
						<input type='text' name='transistor_size' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>Transistor Size</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='transistor_count' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>Transistor Count</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='memory_type' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>Memory Type</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='vram' id='' class='input' required>
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
						<input type='text' name='prize' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>Prize</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<font color='white'>
							<input type='file' name='gpu_pic' id='fileUpload' required>
						</font>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col2'>
					<div class='group'>
						<textarea class='input textarea' name='output' required></textarea>
						<span class='bar outputBar'></span>
						<label>Output Ports</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<font color='white'>
							Server Grade<input type='radio' name='hardware_type' value='server'>
							
							<br>
							
							Consumer Grade<input type='radio' name='hardware_type' value='consumer'>
						</font>
					</div>
					<div class='marginMakerNearRadio'></div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='url' id='' class='input' required>
						<span class='bar URLBar'></span>
						<label>Buy From URL</label>
					</div>
					<div class='marginMakerNearURL'></div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col1'>
					<div class='group'>
						<input type='submit' name='Submit' id='submit'>
					</div>
				</div>
			</div>
		</div>
		
	</form>

</body>
</html>


<?php

	include("../connection.php");

	if(isset($_POST['Submit']))
	{
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
		
		$query="insert ino gpu(series,name,compute_units,stream_processors,texture_units,stock_freq,boost_freq,game_freq,transistor_size,transistor_count,output,memory_type,VRAM,prize,url,type,img) values('$series','$name','$compute_units','$stream_processors','$texture_units','$stock_freq','$boost_freq','$game_freq','$transistor_size','$transistor_count','$output','$memory_type','$vram','$prize','$url','$hardware_type','$urlPic')";
		
		$returns = $con_obj->query_idu($query);
		
		if($returns)
		{
			$_SESSION["queryStatusGPU"] = "Inserted";
			echo "<script>window.location='gpu_insert.php';</script>";
		}
		else
		{
			$_SESSION["queryStatusGPU"] = "Not Inserted";
			echo "<script>window.location='gpu_insert.php';</script>";
		}
	}
}
else
{
	header("Location:login.php");
}	
?>