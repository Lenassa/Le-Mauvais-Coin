<?php
	
	/*CREATION DE LA REQUETE EN FONCTION DES DONNES RECUPEREE
	DANS LE FORMULAIRE DE RECHERCHE*/

	/*Initialisation de la requête SQL*/
	$requete ="SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ";

	/*Ajout de la partie moteur de recherche par mot-clés si $recherche_texte existe.
	Vérifie l'attribut "description" et l'attribut "titre".
	Les "%" de part et d'autre de la données de recherche rentrée par l'utilisateur
	permettent de trouver les mot-clefs même si ceux-ci sont au coeur d'un mot.
	(exemple : $recherche_texte = "nature", naturel ressortira s'il est présent)*/
	if ($recherche_texte !='') {
		$requete = $requete." ((description LIKE '%$recherche_texte%') OR (titre LIKE '%recherche_texte%')) ";
	}
	
	/*-------------------------------------------------*/
	/*A partir de ce point, pour chaque élément, on vérifie si la requête diffère
	de l'initialisation. Si cela est le cas, il devient nécéssaire d'ajouter un "AND".
	Les espaces permettent de conserver la cohésion de la requete sans faire d'amalgame
	entre les différents éléments.*/
	/*-------------------------------------------------*/

	/*Ajout de la recherche par catégorie si $categorie existe*/
	if ($categorie != '') {
		if ($requete != "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = $requete." AND ";
		}
		$requete = $requete." idCategorie =$categorie ";
	}

	/*Ajout de la recherche par région si $region existe*/
	if ($region != '') {
		if ($requete != "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = $requete." AND ";	
		}
		$requete = $requete." idRegion =$region ";
	}

	/*Ajout de la recherche de la ville ou du code postal si $lieu existe*/
	if ($lieu != '') {
		if ($requete != "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = $requete." AND ";	
		}

		/*Si $lieu est numérique, alors il s'agit d'un code postal.
		Sinon, il s'agit du nom d'une ville.*/
		if(is_numeric($lieu)) {

			$requete = $requete." code_postal =$lieu ";
		} else {

			$requete = $requete." ville ='$lieu' ";
		}
	}

	/*Ajout de la recherche par prix maximum si $prix_max existe*/
	if ($prix_max != '') {
		if ($requete != "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = $requete. " AND ";	
		}

		/*Prise en compte du cas ou l'attribut "prix" est NULL. Il doit quand même apparaître*/
		$requete = $requete." (prix <= $prix_max OR prix IS NULL) ";
	}

	/*Ajout de la recherche par prix minimum si $prix_min existe*/
	if ($prix_min != '') {
		if ($requete != "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = $requete." AND ";	
		}

		/*Prise en compte du cas ou l'attribut "prix" est NULL. Il doit quand même apparaître*/
		$requete = $requete." (prix >= $prix_min OR prix IS NULL)";
	}

	/*Si aucune variable n'existe, la requête est modifiée pour retirer le WHERE*/
	if ($requete == "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie) WHERE ") {
			$requete = "SELECT * FROM ((annonce NATURAL JOIN utilisateur) NATURAL JOIN (lieu NATURAL JOIN region) NATURAL JOIN categorie)";	
	}

	if( !isset($_POST['tri']) ) {
		
		$_POST['tri'] = 0;
	}

	if ($_POST['tri'] == 0) {
		
		/*Quelle que soit la requête, les résultats seront ordonnés par date*/
		$requete = $requete." ORDER BY date DESC";
	}

	if ($_POST['tri'] == 1) {
		
		/*Quelle que soit la requête, les résultats seront ordonnés par date*/
		$requete = $requete." ORDER BY date ASC";
	}

	if ($_POST['tri'] == 2) {
		
		/*Quelle que soit la requête, les résultats seront ordonnés par date*/
		$requete = $requete." ORDER BY prix DESC";
	}

	if ($_POST['tri'] == 3) {
		
		/*Quelle que soit la requête, les résultats seront ordonnés par date*/
		$requete = $requete." ORDER BY prix ASC";
	}
?>