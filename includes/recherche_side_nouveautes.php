<?php

	$requete="SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) ORDER BY date DESC LIMIT 3";
	$res=mysqli_query($link,$requete)
   		or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));
	            	
	while($ligne = mysqli_fetch_array($res)) {
		echo'<div class="annonce">';
			echo'<div class="wrapper">';
				echo'<p class="titre">'.$ligne['titre'].'</p>';
				echo'<p class="user_email">'.$ligne['email'].'</p>';
				echo'<p class="user_phone">'.$ligne['phone'].'</p>';
				echo'<p class="categorie">'.$ligne['categorie'].'</p>';
				echo'<p class="description">'.$ligne['description'].'</p>';
				echo'<p class="ville">'.$ligne['ville'].'</p>';
				echo'<p class="separateur_ville_region">/</p>';
				echo'<p class="code_postal">'.$ligne['code_postal'].'</p>';
				echo'<p class="region">'.$ligne['region'].'</p>';
				echo'<p class="prix">';
				if (!is_null($ligne['prix'])) {
					echo''.strrev( chunk_split( strrev($ligne['prix']),3,' ')).' €';
				}
				echo'</p>';
				echo'<p class="date">'.$ligne['date'].'</p>';
			echo'</div>';
		echo'</div>';
	}
	mysqli_close($link);
?>