<?php
	include("nav.php");
?>
<html>
	<head>
		<title><?php echo $_GET['gpuName']; ?></title>
		<link rel="stylesheet" href="../style/gpuDetailedDisplay.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
	<body>

		<div class="colorOverlay"></div>

		<div class="marginMakerDiv"></div>
		
		<!--Retriving the GPU Details-->
		<?php
			$id=$_GET["id"];
			include("../connection.php");

			$result=$con_obj->query_s("select * from gpu where no='$id'");
		?>

		<table border='0' align='center' cellspacing=10px>
			<?php
				while($temp=mysqli_fetch_array($result))
				{
				?>
					<tr>
						<td colspan='4' class='nameTd'><?php echo $temp[1]." ".$temp[2]; ?></td>
					</tr>
					<tr>
						<td rowspan='4' class='imgTd'><img src="../<?php echo $temp[18]; ?>"></td>
						<td class='dataTd'>Stock Clock: <?php echo $temp[6]; ?></td>
						<td class='dataTd'>Boost Clock: <?php echo $temp[7]; ?></td>
						<td class='dataTd'>Game Clock: <?php echo $temp[8]; ?></td>
					</tr>

					<tr>
						<td class='dataTd'>Compute Units: <?php echo $temp[3]; ?></td>
						<td class='dataTd'>Steam Processors: <?php echo $temp[4]; ?></td>
						<td class='dataTd'>Texture Units: <?php echo $temp[5]; ?></td>
					</tr>

					<tr>
						<td class='dataTd'>Transistor Size: <?php echo $temp[9]; ?></td>
						<td class='dataTd'>Transistor Count: <?php echo $temp[10]; ?></td>
						<td class='dataTd'>VRAM: <?php echo $temp[13]; ?></td>
					</tr>

					<tr>
						<td class='dataTd' colspan='2'>Memory Type: <?php echo $temp[12]; ?></td>
						<td class='dataTd'>GPU Type: <?php echo ucwords($temp[17]); ?></td>
					</tr>

					<tr>
						<td colspan='3' class='dataTd'>Output Ports: <?php echo $temp[11]; ?></td>
						<td class='dataTd'>Prize: ₹<?php echo $temp[14]; ?></td>
					</tr>

					<tr>
						<td colspan='4' class='buttonTd'><button onclick="window.location='<?php echo $temp[16]; ?>'">Buy Now</button></td>
					</tr>
				<?php
				}
			?>
		</table>
	</body>
	<div class="marginMakerDiv"></div>
</html>
<?php
	include("footer.php");
?>