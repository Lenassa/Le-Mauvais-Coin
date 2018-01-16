<?php

	/*------------HEADER DES COMMANDES MYSQL-----------*/
	/*doit être inclut pour toute utilisation de la BDD*/
	  /*ne pas oublier de fermer la connexion après.*/

	/*Création des variable de connexion, insertion de leur donnée*/
	
	/*host de la faculté*/
	/*$mysql_host="mysql.ensinfo.sciences.univ-nantes.prive";*/

	$mysql_host="localhost:3306";
	$mysql_user="e144621x";
	$mysql_password="0KA1YPNB";
	$mysql_database="e144621X";

	/*Connexion au serveur phpmyadmin*/
	$link=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database)
   		or die("Impossible de se connecter au serveur !");

   	/*Sélection de la base de données nous intéressant*/
	mysqli_select_db($link,$mysql_database)
   		or die("Impossible de se connecter à la base de donnée e144621X !".mysqli_errno($link));

   	/*Le jeu de caractère des résultats est forcé en "utf8" afin de résoudre
   	les problèmes d'affichage (caractère spéciaux en "utf8" remplacé par des
   	"?"*/
	mysqli_set_charset($link, "utf8")
  		or die ("Échec de la connexion : %s\n".mysqli_connect_error());
?>