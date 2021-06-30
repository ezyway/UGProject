<?php
	include("nav.php");
?>
<html>
	<head>
		<title>Our Graphics Technology</title>
		<link rel="stylesheet" href="../style/gpu_select.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			function initComparisons() {
				var x, i;
				x = document.getElementsByClassName("img-comp-overlay");
				for (i = 0; i < x.length; i++) {
					compareImages(x[i]);
				}
			function compareImages(img) {
					var slider, img, clicked = 0, w, h;
					w = img.offsetWidth;
					h = img.offsetHeight;
					img.style.width = (w / 2) + "px";
					slider = document.createElement("DIV");
					slider.setAttribute("class", "img-comp-slider");
					img.parentElement.insertBefore(slider, img);
					slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
					slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
					slider.addEventListener("mousedown", slideReady);
					window.addEventListener("mouseup", slideFinish);
					slider.addEventListener("touchstart", slideReady);
					window.addEventListener("touchstop", slideFinish);
					
					function slideReady(e) {
						e.preventDefault();
						clicked = 1;
						window.addEventListener("mousemove", slideMove);
						window.addEventListener("touchmove", slideMove);
					}
					function slideFinish() {
						clicked = 0;
					}
					function slideMove(e) {
						var pos;
						if (clicked == 0) return false;
						pos = getCursorPos(e)
						if (pos < 0) pos = 0;
						if (pos > w) pos = w;
						slide(pos);
					}
					function getCursorPos(e) {
						var a, x = 0;
						e = e || window.event;
						a = img.getBoundingClientRect();
						x = e.pageX - a.left;
						x = x - window.pageXOffset;
						return x;
					}
					function slide(x) {
						img.style.width = x + "px";
						slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
					}
				}
			}
		</script>
	</head>
<body>

	<div class="spacer"></div>

			<!-- ------------------------------------------------------------
										Top Heading Start
			------------------------------------------------------------ -->

	<div class="pageHeadingDiv">
		
		<div class="fullContainer">
			<h1>Bend the Rules</h1>
			<div class="imgContainer">
				<img src='images/imgs/gpuSelectHeading.webp'></img>
			</div>
		</div>

	</div>

			<!-- ------------------------------------------------------------
										Top Heading Over
			------------------------------------------------------------ -->

			<!-- ------------------------------------------------------------
										Slider Start
			------------------------------------------------------------ -->

	<div class="sliderContainer">

		<div class="heading">Intelligent Sharpening Technology</div>
		<div class="content">Radeon Image Sharpening combines contrast-adaptive sharpening with GPU upscaling to deliver crisp looking visuals with virtually no performance impact.</div>

		<div class="img-comp-container">
			<div class="img-comp-img">
				<img src="images/slider/imgSharpeningON.webp" width="1260" height="400">
			</div>
			<div class="img-comp-img img-comp-overlay">
				<img src="images/slider/imgSharpeningOFF.webp" width="1260" height="400">
			</div>
		</div>

		<div class="content">Click &#8593; Drag</div>

	</div>

	<div class="spacerForContainer"></div>

	<div class="sliderContainer">

		<div class="heading">Stunning Visual Fidelity</div>
		<div class="content">FidelityFX is a collection of high-quality post-process effects that automatically collapse multiple effects into fewer shader passes to reduce overhead and free up your GPU for the visceral experience you demand.</div>

		<div class="img-comp-container">
			<div class="img-comp-img">
				<img src="images/slider/FidelityFXOFF.webp" width="1260" height="400">
			</div>
			<div class="img-comp-img img-comp-overlay">
				<img src="images/slider/FidelityFXON.webp" width="1260" height="400">
			</div>
		</div>
		
		<div class="content">Click &#8593; Drag</div>

	</div>
	
	<div class="spacerForContainer"></div>

	<div class="sliderContainer">

		<div class="heading">No Stuttering. No Tearing. Just Gaming.</div>
		<div class="content">Radeon Freesync and FreeSync 2 HDR take full advantage of Radeon RX 5700 XT, bringing gamers the best stutter and tear-free gaming experience with higher refresh rates, lower latency, and 10-bit HDR, available on over 700 monitors.</div>
	
		<div class="img-comp-container">
			<div class="img-comp-img">
				<img src="images/slider/freeSyncOFF.webp" width="1260" height="400">
			</div>
			<div class="img-comp-img img-comp-overlay">
				<img src="images/slider/freeSyncON.webp" width="1260" height="400">
			</div>
		</div>
		
		<div class="content">Click &#8593; Drag</div>

	</div>

			<!-- ------------------------------------------------------------
										Slider Over
			------------------------------------------------------------ -->

	<div class="spacerForContainer"></div>

			<!-- ------------------------------------------------------------
									Image Content Start
			------------------------------------------------------------ -->

	<div class="contentContainer">
		<div class="text">
			<div class="heading">Extreme Refresh Rates For Extreme Resolutions</div>
			<div class="content">DisplayPort 1.4 with Display Stream Compression is ready to power extreme refresh rates, frame rates, resolution, and color depth for next-generation displays, supporting up to 8K resolution at 60 Hz or 5K at 120 Hz.</div>
		</div>
		<div class="imgContainer">
			<img src='images/imgs/gpuSelect1.webp'></img>
		</div>
	</div>

	<div class="contentContainer">
		<div class="imgContainer">
			<img src='images/imgs/gpuSelect2.webp'></img>
		</div>
		<div class="text">
			<div class="heading">Customizable Gaming Experience</div>
			<div class="content">Take your gaming experience to the next level. Experience stutter-free, tear-free gaming, reduced input latency and day-0 drivers optimized for new game releases.</div>
		</div>
	</div>

	<div class="contentContainer">
		<div class="text">
			<div class="heading">More Performance, Less Power.</div>
			<div class="content">Efficiently energetic, Radeon RX 5700 XT delivers more performance while consuming less power than its predecessor.</div>
		</div>
		<div class="imgContainer">
			<img src='images/imgs/gpuSelect3.webp'></img>
		</div>
	</div>
	
	<div class="contentContainer">
		<div class="imgContainer">
			<video src='videos/RDNA.mp4' controls autoplay></video>
		</div>
		<div class="text">
			<div class="heading">The New Gaming DNA</div>
			<div class="content">RDNA architecture is engineered for the next generation of high-performance gaming. It’s the DNA that powers your games, the DNA that brings your games to life, the DNA that keeps evolving.</div>
		</div>
	</div>

	<div class="contentContainer">
		<div class="text">
			<div class="heading">GDDR6 Memory for Advanced Gaming</div>
			<div class="content">Equipped with 8GB of advanced GDDR6 memory to provide high bandwidth of up to 448 GB/s, enabling 1440p performance for today’s most demanding games.</div>
		</div>
		<div class="imgContainer">
			<img src='images/imgs/gpuSelect4.webp'></img>
		</div>
	</div>

	<div class="contentContainer">
		<div class="imgContainer">
			<img src='images/imgs/gpuSelect5.webp'></img>
		</div>
		<div class="text">
			<div class="heading">Armed with More Bandwidth</div>
			<div class="content">Radeon RX 5700 XT features PCI Express 4.0 support, with a throughput of 16 GT/s and enables two times the bandwidth compared to PCI Express 3.0. Get ready for the next generation of PC gaming.</div>
		</div>
	</div>

			<!-- ------------------------------------------------------------
									Image Content Over
			------------------------------------------------------------ -->

	<div class="main_container">
		<div class="container server">
			<a href="gpu_display.php?type=server">
				<div class="image_container">
					<img src="images/gpu/server_grade_logo.jpg" alt="Server Grade Processors"></img>
				</div>
				<div class="title"><b>Radeon Server Solutions</b></div>
				<div class="description">
					With our Server Grade Hardware, you can setup any type of server that can fulfill any needs of your clients.
				</div>
			</a>
		</div>
	
		<div class="container consumer">
			<a href="gpu_display.php?type=consumer">
				<div class="image_container">
					<img src="images/gpu/consumer_grade_logo.jpg" alt="Consumer Grade Processors"></img>
				</div>
				<div class="title"><b>Radeon Graphics</b></div>
				<div class="description">
					With our GPUs, you can game and also stream and do much more. 
				</div>
			</div>
		</a>
	</div>
		
	<script>
		initComparisons();
	</script>
	
	<div class="spacer"></div>

</body>
</html>
<?php
	include("footer.php");
?>