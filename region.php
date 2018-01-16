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
				
				<div class="region_liste">

					<div class="region_metropole">
						<p>Régions Métropolitaines :</p>
						<?php include("includes/headerphp.php");
							$requete="SELECT * FROM region WHERE idRegion <= 22 ORDER BY region ASC";
							
							/*Exécution de la requête*/
   							$res=mysqli_query($link,$requete)
       							or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));

						    /*Stockage des résultats dans un tableau tampon. On parcoure toutes lmes lignes du tableau*/
							while($ligne = mysqli_fetch_array($res)) {
								echo'<a href="annonces.php?region='.$ligne['idRegion'].'">'.$ligne['region'].'</a>';
							}
							mysqli_close($link);
						?>
					</div>

					<div class="region_DOM_TOM">
						<p>DOM-TOMs :</p>
						<?php include("includes/headerphp.php");
							$requete="SELECT * FROM region WHERE idRegion > 22 ORDER BY region ASC";
							
							/*Exécution de la requête*/
   							$res=mysqli_query($link,$requete)
       							or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));

						    /*Stockage des résultats dans un tableau tampon. On parcoure toutes lmes lignes du tableau*/
							while($ligne = mysqli_fetch_array($res)) {
								echo'<a href="annonces.php?region='.$ligne['idRegion'].'">'.$ligne['region'].'</a>';
							}
						?>

					</div>
					<div class="region_categorie">
						<p>Catégotries :</p>
						<?php $requete="SELECT * FROM categorie";
							
							/*Exécution de la requête*/
   							$res=mysqli_query($link,$requete)
       							or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));

						    /*Stockage des résultats dans un tableau tampon. On parcoure toutes lmes lignes du tableau*/
							while($ligne = mysqli_fetch_array($res)) {
								echo'<a href="annonces.php?categorie='.$ligne['idCategorie'].'">'.$ligne['categorie'].'</a>';
							}
							mysqli_close($link);
						?>
					</div>
				</div>
			</div>
			
			<div class="colonne_droite">
				<p class="maintient"></p>
			</div>
		</div>

		<?php include("includes/footer.php"); ?>
	</body>
</html>