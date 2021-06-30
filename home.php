<?php
	include("nav.php");
	include("connection.php");
?>
<html>
	<head>
		<title>AMD (Advanced Micro Devices)</title>
		<link rel='stylesheet' href="style/home.css"></link>
		<link rel='stylesheet' href="style/common.css"></link>
		<script src='jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>
	<div class="topSpacer"></div>
	
	<div class="wrapper">
        <main>

            <section class="parallax parallax-1"></section>
            <section class="content">
                <div class="container mainHeading">
                    <h2>Advanced Micro Devices (AMD)</h2>
                </div>
            </section>

            <section class="parallax parallax-2"></section>
            <section class="content">
                <div class="container">
					<h2>Our Offerings</h2>
					<table border='0'>
						<tr>
							<td>
								<img src='assets/images/parallax/home/1.png'></img>
							</td>
							<td>
								<img src='assets/images/parallax/home/2.jpg'></img>
							</td>
						</tr>
						<tr>
							<td>
								<button onclick="window.location='assets/processor_select.php'">View CPUs</button>
							</td>
							<td>
								<button onclick="window.location='assets/gpu_select.php'">View GPUs</button>
							</td>
						</tr>
					</table>
                </div>
            </section>

            <section class="parallax parallax-3"></section>
            <section class="content">
                <div class="container dbFetch">
                    <h2>Our Newest Addition in CPU Lineup</h2>
					<?php
						$result=$con_obj->query_s("SELECT * FROm cpu ORDER BY no DESC LIMIT 1");
						while($temp=mysqli_fetch_array($result))
						{
							?>
								<table border='0' align='center' cellspacing='15px'>
									<tr>
										<td class='heading' colspan='2'><?php echo $temp[1]." ".$temp[2]; ?></td>
									</tr>
									<tr>
										<td rowspan='3'><img src='<?php echo $temp[17]; ?>'></img></td>
										<td class='dataTd'>Cores/Threads: <?php echo $temp[3]; ?></td>
									</tr>
									<tr>
										<td class='dataTd'>Boost Frequency: <?php echo $temp[5]; ?></td>
									</tr>
									<tr>
										<td class='buttonTd'><button onclick="window.location='assets/cpuDetailedDisplay.php?id=<?php echo $temp[0]; ?>&cpuName=<?php echo $temp[1]." ".$temp[2]; ?>'">View This CPU</button></td>
									</tr>
								</table>
							<?php
						}
					?>
                </div>
			</section>
			
            <section class="parallax parallax-4"></section>
            <section class="content">
                <div class="container dbFetch">
                    <h2>Our Newest Addition in GPU Lineup</h2>
					<?php
						$result=$con_obj->query_s("SELECT * FROm gpu ORDER BY no DESC LIMIT 1");
						while($temp=mysqli_fetch_array($result))
						{
							?>
								<table border='0' align='center' cellspacing='15px'>
									<tr>
										<td class='heading' colspan='2'><?php echo $temp[1]." ".$temp[2]; ?></td>
									</tr>
									<tr>
										<td rowspan='3'><img src='<?php echo $temp[18]; ?>'></img></td>
										<td class='dataTd'>Stream Processors: <?php echo $temp[4]; ?></td>
									</tr>
									<tr>
										<td class='dataTd'>VRAM: <?php echo $temp[13]; ?></td>
									</tr>
									<tr>
										<td class='buttonTd'><button onclick="window.location='assets/gpuDetailedDisplay.php?id=<?php echo $temp[0]; ?>&gpuName=<?php echo $temp[1]." ".$temp[2]; ?>'">View This GPU</button></td>
									</tr>
								</table>
							<?php
						}
					?>
                </div>
            </section>

        </main>
    </div>

</body>
</html>
<?php
	include("footer.php");
?>