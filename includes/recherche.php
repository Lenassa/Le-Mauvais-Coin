<?php
	/*Exécution de la requête*/
   	$res=mysqli_query($link,$requete)
       		or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));

    if(mysqli_num_rows($res)==0) {
		echo'<p class="pas_de_resultat">Aucune annonce trouvée !<br /><br />Si vous effectuez une recherche par mots-clés, vérifiez bien qu\'il n\'y ait pas de faute de frappe.</p>';
	} else {

    	/*Stockage des résultats dans un tableau tampon. On parcoure toutes lmes lignes du tableau*/
		while($ligne = mysqli_fetch_array($res)) {

			/*Mise en forme des résultats pour un traitement par CSS afin de les afficher correctement*/
			echo'<section>';
				echo'<input type="checkbox" id="hack'.$ligne['idNumero'].'" class="hack_annonce"/><label for="hack'.$ligne['idNumero'].'"><div class="annonce">';
	
					echo'<div class="wrapper_img">';
						if(!empty($ligne['chemin_img'])) {
							echo'<img alt="Image de l\'annonce numéro '.$ligne['idNumero'].'" src="'.$ligne['chemin_img'].'">';
						}
					echo'</div>';
	
					echo'<div class="wrapper">';
	
						echo'<p class="titre">'.stripslashes($ligne['titre']).'</p>';
						
						/*Les informations sont entrées en doublons pour servir dans le cas
						de la modification et de la suppression.
						Le format formulaire sert à envoyer les données vers la page de
						dépot / modificaion / supresion d'annoce.*/
						echo'<form action="posterAnnonces.php" method="post">
								<input type="hidden" name="idNumero" value="'.$ligne['idNumero'].'"/>
								<input type="hidden" name="idUtilisateur" value="'.$ligne['idUtilisateur'].'"/>
								<input type="hidden" name="titre_deposer" value="'.$ligne['titre'].'"/>
								<input type="hidden" name="description_deposer" value="'.$ligne['description'].'"/>';
								if (!is_null($ligne['prix'])) {

									echo'<input type="hidden" name="prix_deposer" value="'.$ligne['prix'].'"/>';
								}
								if (!is_null($ligne['phone'])) {

									echo'<input type="hidden" name="phone_deposer" value="'.$ligne['phone'].'"/>';
								}
								echo'<input type="hidden" name="email_deposer" value="'.$ligne['email'].'"/>
								<input type="hidden" name="categorie_deposer" value="'.$ligne['idCategorie'].'"/>
								<input type="hidden" name="region_deposer" value="'.$ligne['idRegion'].'"/>
								<input type="hidden" name="ville_deposer" value="'.$ligne['ville'].'"/>
								<input type="hidden" name="code_postal_deposer" value="'.$ligne['code_postal'].'"/>
								<input type="submit" class="modifier" value="&#9998; / &#10008;"/>
							</form>';


						echo'<p class="user_email">'.$ligne['email'].'</p>';
						echo'<p class="user_phone">'.$ligne['phone'].'</p>';
						echo'<p class="categorie">'.$ligne['categorie'].'</p>';
						echo'<p class="description">'.stripslashes($ligne['description']).'</p>';
						echo'<p class="ville">'.stripslashes($ligne['ville']).'</p>';
						echo'<p class="separateur_ville_region">/</p>';
						echo'<p class="code_postal">'.$ligne['code_postal'].'</p>';
						echo'<p class="region">'.$ligne['region'].'</p>';
						echo'<p class="prix">';
	
							/*Si le prix est non NULL, il est inversé ('12345' devient '54321')
							séparé en groupe de 3 chiffres par un escpace avec chunk_split() ('543 21')
							puis inversé à nouveau ('12 345') avant de se voir ajouter ' €' ('12 345 €')*/
							if (!is_null($ligne['prix'])) {
	
								echo''.strrev( chunk_split( strrev($ligne['prix']),3,' ')).' €';
							}
	
							if ($ligne['offre'] == 1) {
								echo'<p class="faire_offre">Faire Offre</p>';
						}
	
	
						echo'</p>';
						echo'<p class="date">'.$ligne['date'].'</p>';
	
					echo'</div>';
	
				echo'</div></label>';
			echo'</section>';
		}
	}

	

	/*Les variables contenant les données du formulaires sont vidées pour
	éviter tout conflit et par soucis de propreté*/
	unset($recherche_texte,$categorie,$region,$lieu,$prix_min,$prix_max);
?>