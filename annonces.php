<?php
/*Débute une session, permettant de stocker des variables
propres à chaque utilisateur. Envoie un cookie identificateur.*/ 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("includes/head.php"); ?>
	</head>

	<body>
		<header>
			<!--Ajout du bandeau titre et du menu-->
			<?php include("includes/bandeau.php"); ?> 
			<?php include("includes/menu.php"); ?>
		</header>

		<!--Triatement des données et création de la requête-->
		<?php
		include("includes/headerphp.php");
		include("includes/recuperation_donnes.php");
		include("includes/requete.php") ?>

		<!--Ajout du formulaire-->
		<div class="formulaire">
			<?php include("includes/formulaire.php"); ?>
		</div>
		
		<div class="page_core">

			<!--div dit de recadrage, de la même taille que les
			éléments en "fixed". Ils permettent l'affichage correct
			de la partie dynamique de la page, sans que celle-ci
			ne soit masquée par les éléments en "fixed"-->
			<div class="recadrage_header"></div>
			<div class="recadrage_form"></div>

			<div class="colonne_gauche">

				<!--La classe maintient permet de donner une consistence
				aux colonnes gauche et droites. Si laissées vides,
				elle se retrouvent avec une hauteur de 0, et leur présence
				est ignorée par l'attribut "float", ce qui mène à un décalage
				de la colonne centrale-->
				<p class="maintient"></p>
				
				<?php include("includes/filtre.php"); ?>

			</div>

			<div class="colonne_centre">
				<p class="maintient"></p>
				
				<!--Exécution de la requête et affichage des éventuels résultats-->
				<?php include("includes/recherche.php"); ?>
			</div>

			<div class="colonne_droite">
				<p class="maintient"></p>
				<p class="info_page">

					<?php
						$compteur_region=mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(DISTINCT region) FROM (".$requete.") AS v")); 
						$compteur_categorie=mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(DISTINCT categorie) FROM (".$requete.") AS v"));
					?>

					Nous avons trouvé 
					<?php echo''.mysqli_num_rows($res); ?> annonce(s) correspondant à votre recherche.
					<br />
					<br />Votre recherche porte sur 
					<?php echo''.$compteur_region[0]; ?> région(s) et 
					<?php echo''.$compteur_categorie[0]; ?> catégorie(s).
				</p>
			</div>
		</div>

		<!--Ajout du pied de page avec son logo et son menu-->
		<?php include("includes/footer.php"); 

		/*Fermeture de la connexon à la base de données*/
		mysqli_close($link);
		?>
	</body>
</html>