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
			</div>

			<div class="colonne_centre">
				<p class="maintient"></p>

				<?php
					include("includes/headerphp.php");
					$nb_annonce_courante=mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(idNumero) FROM annonce")); 
						$nb_annonce=mysqli_fetch_array(mysqli_query($link, "SELECT MAX(idNumero) FROM annonce"));
						mysqli_close($link);
				?>

				<p>Bienvenue sur Le Mauvais Coin, site de petites annonces en lignes.<br/>
					Nous hébergeons actuellement 
					<?php echo''.$nb_annonce_courante[0]; ?> annonces,<br />
				et avons hébergé <?php echo''.$nb_annonce[0]; ?> annonces jusqu'à ce jour.</p>

			</div>
			
			<div class="colonne_droite">
				<p class="maintient"></p>
			</div>
		</div>

		<?php include("includes/footer.php"); ?>
	</body>
</html>