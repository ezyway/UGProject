<?php
	include("nav.php");
?>
<html>
	<head>
		<title><?php echo $_GET['cpuName']; ?></title>
		<link rel="stylesheet" href="../style/cpuDetailedDisplay.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
	<body>

		<div class="colorOverlay"></div>
		<div class="marginMakerDiv"></div>
		<!--Retriving the CPU Details-->
		<?php
			$id=$_GET["id"];
			include("../connection.php");

			$result=$con_obj->query_s("select * from cpu where no='$id'");
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
						<td rowspan='4' class='imgTd'><img src="../<?php echo $temp[17]; ?>"></td>
						<td class='dataTd'>Cores/Threads: <?php echo $temp[3]; ?></td>
						<td class='dataTd'>Stock Clock: <?php echo $temp[4]; ?></td>
						<td class='dataTd'>Boost Clock: <?php echo $temp[5]; ?></td>
					</tr>

					<tr>
						<td class='dataTd'>CPU Type: <?php echo ucwords($temp[16]); ?></td>
						<td class='dataTd'>TDP: <?php echo $temp[12]; ?> Watts</td>
						<td class='dataTd'>Total Cache: <?php echo $temp[7]; ?></td>
					</tr>
					
					<tr>
						<td class='dataTd'>L1 Cache: <?php echo $temp[8]; ?></td>
						<td class='dataTd'>L2 Cache: <?php echo $temp[9]; ?></td>
						<td class='dataTd'>L3 Cache: <?php echo $temp[10]; ?></td>
					</tr>

					<tr>
						<td class='dataTd'>Prize: ₹<?php echo $temp[13]; ?></td>
						<td colspan='2' class='dataTd'>Included Cooler: <?php echo $temp[11]; ?></td>
					</tr>

					<tr>
						<td colspan='4' class='buttonTd'><button onclick="window.location='<?php echo $temp[15]; ?>'">Buy Now</button></td>
					</tr>
				<?php
				}
			?>
		</table>
	</body>
</html>
<?php
	include("footer.php");
?>