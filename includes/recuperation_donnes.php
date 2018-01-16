<?php
	/*Récuprération des informations si elles existent
	Sinon assignation d'une valeur neutre*/
	if (isset($_GET["recherche_texte"])) {

		$recherche_texte = $_GET["recherche_texte"];
	} else {
		$recherche_texte='';
	}

	if (isset($_GET["categorie"])) {

		$categorie = $_GET["categorie"];
	} else {
		$categorie='';
	}

	if (isset($_GET["region"])) {

		$region = $_GET["region"];
	} else {
		$region='';
	}

	if (isset($_GET["lieu"])) {

		$lieu = $_GET["lieu"];
	} else {
		$lieu='';
	}

	if (isset($_GET["prixmin"])) {

		$prix_min = $_GET["prixmin"];
	} else {
		$prix_min='';
	}

	if (isset($_GET["prixmax"])) {

		$prix_max = $_GET["prixmax"];
	} else {
		$prix_max='';
	}

	/*-----------------------------------------------*/

	$prix_deposer='';

?>