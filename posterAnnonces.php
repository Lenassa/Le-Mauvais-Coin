<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("includes/head.php"); ?>
	</head>

	<body>
		<header>
			<?php include("includes/bandeau.php"); ?> 
			<?php include("includes/menu.php"); ?>
		</header>

		<?php
		include("includes/headerphp.php");
		include("includes/recuperation_donnes.php");
		?>

		<div class="page_core">

			<div class="recadrage_header"></div>

			<div class="colonne_gauche">
				<p class="maintient"></p>
			</div>

			<div class="colonne_centre">
				<p class="maintient"></p>

				<?php include("includes/deposer.php"); ?>
			</div>
			
			<div class="colonne_droite">
				<p class="maintient"></p>
			</div>
		</div>

		<?php include("includes/footer.php"); ?>
	</body>
</html>