<?php
	include("nav.php");
?>
<html>
	<head>
		<title>Select your Prosessor Type</title>
		<link rel="stylesheet" href="../style/cpu_display.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
	<body>

		<div class="colorOverlay"></div>

		<table border='0' align='center' cellspacing=10px>
			<?php
				include("../connection.php");
				$type=$_GET["type"];

				$result=$con_obj->query_s("select * from cpu where type='$type'");

				while($temp=mysqli_fetch_array($result))
				{
					?>
						<tr>
							<td rowspan='4' class="imageTd">
								<img src="../<?php echo $temp[17]; ?>"></img>
							</td>
							<td colspan='2' class='nameTd'><?php echo $temp[1]." ".$temp[2]; ?></td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Cores / Threads: <?php echo $temp[3]; ?></td>
							<td class='contentTd'>Stock Frequency: <?php echo $temp[4]; ?></td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Boost Frequency: <?php echo $temp[5]; ?></td>
							<td class='contentTd'>TDP: <?php echo $temp[12]; ?> Watts</td>
						</tr>
						
						<tr class='data'>
							<td class='contentTd'>Price: ₹<?php echo $temp[13]; ?></td>
							<td class='buttonTd'><button onclick="window.location='cpuDetailedDisplay.php?id=<?php echo $temp[0]; ?>&cpuName=<?php echo $temp[1]." ".$temp[2]; ?>'">View this CPU</button></td>
						</tr>
					

					<tr class='spacer'></tr>
					<?php
				}
			?>
		</table>
	</body>
</html>
<?php
	include("footer.php");
?>