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

		<div class="page_core">
			
			<div class="recadrage_header"></div>
			
			<div class="colonne_gauche">
				<p class="maintient"></p>
				<p class="info_page">Voici les 10 dernières annonces parues sur le site.</p>
			</div>

			<div class="colonne_centre">
				<p class="maintient"></p>
				
				<?php
					include("includes/headerphp.php");

	            	$requete="SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) ORDER BY date DESC LIMIT 10";
	        		
	        		include("includes/recherche.php");

	        		mysqli_close($link);
				?>

			</div>

			<div class="colonne_droite">
				<p class="maintient"></p>
			</div>
		</div>

		<?php include("includes/footer.php"); ?>
	</body>
</html>