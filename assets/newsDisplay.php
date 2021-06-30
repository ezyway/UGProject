<?php
	include("nav.php");
?>
<html>
	<head>
		<title>News from AMD</title>
		<link rel="stylesheet" href="../style/newsDisplay.css"></link>
		<script src="../jquery-3.4.1.js"></script>
		
		<script>
			$(document).ready(function(){

			});
		</script>
	</head>
	<body>

		<div class="colorOverlay"></div>

		<table border='0' cellspacing='5px'>
			
			<?php
				include("../connection.php");
				$result=$con_obj->query_s("SELECT * FROM news ORDER BY id DESC");
				while($temp=mysqli_fetch_array($result))
				{
					?>
						<tr class='spacer'></tr>

						<tr>
							<td colspan='4' class='titleTd'><?php echo $temp[2]; ?></td>
						</tr>

						<tr>
							<td class='detailTd TdByAt'>Posted By: <?php echo $temp[1]; ?></td>
							<td class='detailTd TdByAt'>Posted At: <?php echo $temp[5]; ?></td>
							<td class='detailTd TdOn' colspan='2'>Posted On: <?php echo $temp[4]; ?></td>
						</tr>
						
						<tr>
							<td colspan='4' class='contentTd'><?php echo $temp[3]; ?></td>
						</tr>

						<tr class='spacer'></tr>
					<?php
				}
			?>
		</table>
		<div class='spacer'></div>
	</body>
</html>

<?php
	include("footer.php");
?>