<?php
	include("nav.php");
?>
<html>
	<head>
		<title>Our Graphic Cards</title>
		<link rel="stylesheet" href="../style/gpu_display.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
	<body>

		<div class="colorOverlay"></div>

		<div class="marginMakerNav"></div>

		<table border='0' align='center' cellspacing=10px>
			<?php
				include("../connection.php");
				$type=$_GET["type"];

				$result=$con_obj->query_s("select * from gpu where type='$type'");

				while($temp=mysqli_fetch_array($result))
				{
					?>
						<tr>
							<td rowspan='4' class="imageTd">
								<img src="../<?php echo $temp[18]; ?>"></img>
							</td>
							<td colspan='2' class='nameTd'><?php echo $temp[1]." ".$temp[2]; ?></td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Stock Frequency: <?php echo $temp[6]; ?></td>
							<td class='contentTd'>Boost Frequency: <?php echo $temp[7]; ?></td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Memory Type: <?php echo $temp[12]; ?></td>
							<td class='contentTd'>VRAM: <?php echo $temp[13]; ?></td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Price: ₹<?php echo $temp[14]; ?></td>
							<td class='buttonTd'><button onclick="window.location='gpuDetailedDisplay.php?id=<?php echo $temp[0]; ?>&gpuName=<?php echo $temp[1]." ".$temp[2]; ?>'">View this GPU</button></td>
						</tr>
					

					<tr class='spacer'></tr>
					<?php
				}
			?>
		</table>
		<div class="marginMakerFooter"></div>
	</body>
</html>
<?php
	include("footer.php");
?>