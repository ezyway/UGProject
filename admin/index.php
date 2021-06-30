<?php
include("adminNav.php");
//session_start();
if($_SESSION["admin"])
{

?>

<html>
	<head>
		<link rel='stylesheet' href='../style/adminIndex.css'></link>
		<title>Welcome <?php echo $_SESSION["username"]; ?></title>
		<script src='../jquery-3.4.1.js'></script>
		<script>
			$(document).ready(function(){
				
			});
		</script>
	</head>
<body>

	<div class="mainContainer">
		
		<div class="secondaryContainer">
			
			<div class="gpuContainer">
				
				<div class="colorOverlay"></div>
				
				<div class="heading">
					GPU
				</div>
				
				<div class="marginMakerNearButton"></div>
				
				<button onclick="window.location='gpu_insert.php'">Insert a GPU</button>
				<button onclick="window.location='gpu_ud.php'">Update or Delete a GPU</button>
			</div>
			
			<div class="cpuContainer">

				<div class="colorOverlay"></div>

				<div class="heading">
					CPU
				</div>

				<div class="marginMakerNearButton"></div>
				
				<button onclick="window.location='cpu_insert.php'">Insert a CPU</button>
				<button onclick="window.location='cpu_ud.php'">Update or Delete a CPU</button>
			</div>

			<div class="newsContainer">

			<div class="colorOverlay"></div>

				<div class="heading">
					News
				</div>

				<div class="marginMakerNearButton"></div>
				
				<button onclick="window.location='news_insert.php'">Insert a News</button>
				<button onclick="window.location='news_ud.php'">Update or Delete a News</button>
			</div>
		</div>

		<div class="bottomContainer">
			<div class="bottomSubContainer">

				<div class="bottomColorOverlay"></div>

				<div class="feedbackContainerHeading">Feedback</div>
				<button onclick="window.location='feedback.php'" class='feedbackButton'>See Feedbacks</button>
			</div>
			
			<div class="spacer"></div>

			<div class="bottomSubContainer">

				<div class="bottomColorOverlay"></div>

				<div class="feedbackContainerHeading">Users</div>
				<button onclick="window.location='users.php'" class='userButton'>See Users</button>
			</div>
		</div>
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