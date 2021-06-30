<?php
include("adminNav.php");
if($_SESSION["admin"])
{
	
	
	//$_SESSION["queryStatusCPU"]="Inserted";
	

	if(isset($_SESSION["queryStatusCPU"]))
	{
		//Value is already there
	}
	else
	{
		$_SESSION["queryStatusCPU"]="RandomValue";
	}
?>
<html>
	<head>
		<link rel='stylesheet' href='../style/cpu_insert.css'></link>
		<script src='../jquery-3.4.1.js'></script>
		<title>Insert a New CPU</title>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>

	<form action="#" method='POST' enctype='multipart/form-data'>
	
		<div class='mainContainer'>
			
			
			<!--Color Overlay-->
			<?php
				if($_SESSION["queryStatusCPU"] == "Inserted")
					echo "<div class='colorOverlayGreen'></div>";
				elseif($_SESSION["queryStatusCPU"] == "Not Inserted")
					echo "<div class='colorOverlayRed'></div>";
				else
					echo "<div class='colorOverlayNormal'></div>";
			?>
			<!--Color Overlay Over-->


			<div class='row'>
				<!-- Inserting the Query Status Message in the Heading -->
				<?php
					
					if($_SESSION["queryStatusCPU"] == "Inserted")
					{
						echo "<h1>New CPU has been Inserted</h1>";
						$_SESSION["queryStatusCPU"]="RandomValue";
					}
					elseif($_SESSION["queryStatusCPU"] == "Not Inserted")
					{
						echo "<h1>New CPU was not Inserted</h1>";
						$_SESSION["queryStatusCPU"]="RandomValue";
					}
					else
					{
						echo "<h1>Insert a New CPU</h1>";
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
						<input type='text' name='cores_threads' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Cores/Threads</label>
					</div>
				</div>
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
			</div>
			
			<div class='row'>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='transistor_size' id='' class='input' required>
						<span class='bar'></span>
						<label>Transistor Size</label>
					</div>
				</div>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='total_cache' id='' class='input' required>
						<span class='bar'></span>
						<label>Total Cache</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='l1' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>L1 Cache</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='l2' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>L2 Cache</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='l3' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>L3 Cache</label>
					</div>
				</div>
				<div class='col4'>
					<div class='group'>
						<input type='text' name='TDP' id='' class='input' required>
						<span class='bar col4bar'></span>
						<label>TDP</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='cooler' id='' class='input' required>
						<span class='bar'></span>
						<label>Included Thermal Solution</label>
					</div>
				</div>
				<div class='col2'>
					<div class='group'>
						<input type='text' name='prize' id='' class='input' required>
						<span class='bar'></span>
						<label>Prize</label>
					</div>
				</div>
			</div>
			
			<div class='row'>
				<div class='col3'>
					<div class='group'>
						<input type='text' name='url' id='' class='input' required>
						<span class='bar col3bar'></span>
						<label>Buy From URL</label>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<font color='white'>
							Server Grade<input type='radio' name='hardware_type' value='server'>
						
						<br>
						
							Consumer Grade<input type='radio' name='hardware_type' value='consumer'>
						</font>
					</div>
				</div>
				<div class='col3'>
					<div class='group'>
						<font color='white'>
							<input type='file' name='cpu_pic' id='fileUpload' required>
						</font>
					</div>
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

		$pic_name=$_FILES['cpu_pic']['name'];
		$tmp_name=$_FILES['cpu_pic']['tmp_name'];
		$path=$root."/project/upload/cpu/".$pic_name;
		$urlPic="upload/cpu/".$pic_name;
		
		move_uploaded_file($tmp_name,$path);
		
		
		$query="insert into cpu(series,name,cores_threads,stock_freq,boost_freq,transistor_size,total_cache,l1,l2,l3,cooler,TDP,prize,url,type,img) values('$series','$name','$cores_threads','$stock_freq','$boost_freq','$transistor_size','$total_cache','$l1','$l2','$l3','$cooler','$TDP','$prize','$url','$hardware_type','$urlPic')";
		
		$returns = $con_obj->query_idu($query);
		
		if($returns)
		{
			$_SESSION["queryStatusCPU"] = "Inserted";
			echo "<script>window.location='cpu_insert.php';</script>";
		}
		else
		{
			$_SESSION["queryStatusCPU"] = "Not Inserted";
			echo "<script>window.location='cpu_insert.php';</script>";
		}
	}
}
else
{
	header("Location:login.php");
}	
?>