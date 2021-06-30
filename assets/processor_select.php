<?php
	include("nav.php");
?>
<html>
	<head>
		<title>Select your Prosessor Type</title>
		<link rel="stylesheet" href="../style/processor_select.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
	<body>

	<div class="spacer"></div>

			<!-- ------------------------------------------------------------
										Top Heading Start
			------------------------------------------------------------ -->

	<div class="pageHeadingDiv">
		
		<div class="fullContainer">
			<h1>Pushing the Boundaries</h1>
			<div class="imgContainer">
				<img src='images/imgs/cpuSelectHeading.webp'></img>
			</div>
		</div>

	</div>

			<!-- ------------------------------------------------------------
										Top Heading Over
			------------------------------------------------------------ -->


			<!-- ------------------------------------------------------------
										Content Start
			------------------------------------------------------------ -->

			<div class="videoContainer">
				<div class="heading">3rd Gen AMD Ryzen™ Technology</div>
				<div class="imgContainer">
					<video src='videos/amdTrailer_login.mp4' controls></video>
				</div>
			</div>

			<table class='twoImgTable' align='center' border='0'>
				<tr>
					<td>
						<img src='images/imgs/cpuSelect1.webp'></img>
					</td>
					<td>
						<img src='images/imgs/cpuSelect2.webp'></img>
					</td>
				</tr>

				<tr>
					<td class='heading'>New Motherboards. Exclusive Technologies.</td>
					<td class='heading'>7nm “Zen 2” Architecture</td>
				</tr>
				<tr>
					<td class='description'>AMD X570 motherboards with PCIe 4.0 give gamers more flexibility and more control than ever.</td>
					<td class='description'>Improved energy efficiency, higher clock speeds and more cores than ever before.</td>
				</tr>
			</table>

			<div class="threeVideoContainer">
				<table>
					<tr>
						<td>
							<video src='videos/gameCache.mp4' controls></video>
						</td>
						<td>
							<video src='videos/precisionBoost2.mp4' controls></video>
						</td>
						<td>
							<video src='videos/oneClickOverclockin.mp4' controls></video>
						</td>
					</tr>

					<tr>
						<td class='heading'>AMD GameCache</td>
						<td class='heading'>Precision Boost 2</td>
						<td class='heading'>One Click Overclocking</td>
					</tr>

					<tr>
						<td class='heading2'>More Memory On-Chip to Accelerate Gaming</td>
						<td class='heading2'>Boost performance when you need it</td>
						<td class='heading2'>Making Precision Boost 2 even better</td>
					</tr>

					<tr>
						<td class='description'>Up to twice the cache of previous generations, GameCache is designed to reduce memory latency for higher frame rates in top titles.</td>
						<td class='description'>Precision Boost 2 automatically raises processor frequencies for supercharged performance when you need it most.</td>
						<td class='description'>Precision Boost Overdrive uses your motherboard’s robust design to boost clock speeds higher and longer, and lets you overclock at the touch of a button.</td>
					</tr>
				</table>
			</div>

			<div class="contentContainer">
				<img src='images/imgs/cpuSelect3.webp'></img>
				<div class="heading">The Premium AMD Wraith Prism Cooler, Now with More Processors.</div>
				<div class="description">Every boxed 3rd Gen AMD Ryzen 7 and Ryzen 9 processor now includes the top-of-the-line AMD Wraith Prism, featuring full RGB color-controlled illumination.</div>
			</div>

			<!-- ------------------------------------------------------------
										Content Over
			------------------------------------------------------------ -->


		<div class="main_container">
			
			<div class="container server">
				<a href="cpu_display.php?type=server">
					<div class="image_container">
						<img src="images/processors/server_grade_logo.png" alt="Server Grade Processors"></img>
					</div>
					<div class="title"><b>Server Grade</b></div>
					<div class="description">
						With our Server Grade Hardware, you can setup any type of server that can fulfill any needs of your clients.
					</div>
				</a>
			</div>
			
		
			<div class="container consumer">
				<a href="cpu_display.php?type=consumer">
					<div class="image_container">
						<img src="images/processors/consumer_grade_logo.png" alt="Consumer Grade Processors"></img>
					</div>
					<div class="title"><b>Consumer Grade</b></div>
					<div class="description">
						With our Processors, you can game and also stream and do much more. 
					</div>
				</a>
			</div>
		</div>
		
		<div class="spacer"></div>

	</body>
</html>
<?php
	include("footer.php");
?>