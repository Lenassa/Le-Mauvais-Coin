DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS region;
DROP TABLE IF EXISTS lieu;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS annonce;


CREATE TABLE IF NOT EXISTS utilisateur (
	idUtilisateur INTEGER PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
	phone VARCHAR(10)
);

CREATE TABLE IF NOT EXISTS region (
	idRegion INT(2),
	region VARCHAR(50),
		PRIMARY KEY(idregion)
);

CREATE TABLE IF NOT EXISTS lieu (
	code_postal VARCHAR(5) PRIMARY KEY NOT NULL,
	ville VARCHAR(50),
	idRegion INT(2) REFERENCES region (idRegion)
);

CREATE TABLE IF NOT EXISTS categorie (
	idCategorie INT(2) PRIMARY KEY,
	categorie VARCHAR(22)
);

CREATE TABLE IF NOT EXISTS annonce (
	idNumero INTEGER PRIMARY KEY NOT NULL,
	titre VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,
	date VARCHAR(10),
	prix INT(11),
	offre INT(1),
	idCategorie INT(2) REFERENCES categorie (categorie),
	code_postal VARCHAR(5) REFERENCES lieu (code_postal),
	idUtilisateur INTEGER REFERENCES utilisateur (idUtilisateur),
	chemin_img VARCHAR(255),
	password VARCHAR(25)
);

INSERT INTO utilisateur
VALUES (1,'coq@gmoul.com',NULL),
(2,'bob@bobo.org','0601010101'),
(3,'crevette@pornic.com','0826262626'),
(4,'arthur@lol.gro',NULL),
(5,'landing@cci.fr','0645464748'),
(6,'danone.bala@voi.ne','063390594'),
(7,'brigitteu@edu.gouv',NULL),
(8,'anon@ce.pr',NULL),
(9,'jack.lang@pouf.pif',NULL),
(10,'jacque.haricot@magique.conte',NULL),
(11,'memepaspeur@etu.univ-nantes.fr',NULL),
(12,'britney@love.actually',NULL),
(13,'jean.rapetou@magouille.fr',NULL),
(14,'bour.geois@riche.dollar','0999999999');

INSERT INTO lieu
VALUES ('44000','Nantes',12),
('44470','Carquefou',12),
('44210','Pornic',12),
('13100','Aix-en-Provence',21),
('97300','Cayenne',25),
('85000','La roche sur Yon',12),
('44450','Saint-Julien-de-Concelles',12),
('44420','Piriac-sur-Mer',12),
('44600','Saint-Nazaire',12),
('44040','Chéméré',12),
('44116','Paimbœuf',12),
('44211','La Turballe',12);

INSERT INTO region
VALUES (1,'Île-de-France'),
(2,'Champagne-Ardenne'),
(3,'Picardie'),
(4,'Haute-Normandie'),
(5,'Centre-Val de Loire'),
(6,'Basse-Normandie'),
(7,'Bourgogne'),
(8,'Nord-Pas-de-Calais'),
(9,'Lorraine'),
(10,'Alsace'),
(11,'Franche-Comté'),
(12,'Pays de la Loire'),
(13,'Bretagne'),
(14,'Poitou-Charentes'),
(15,'Aquitaine'),
(16,'Midi-Pyrénées'),
(17,'Limousin'),
(18,'Rhônes-Alpes'),
(19,'Auvergne'),
(20,'Languedoc-Roussillon'),
(21,'Provence-Alpes-Côte-d\'Azur'),
(22,'Corse'),
(23,'Guadeloupe'),
(24,'Martinique'),
(25,'Guyane'),
(26,'La Réunion'),
(27,'Mayotte');

INSERT INTO categorie
VALUES (1,'Véhicules'),
(2,'Immobilier'),
(3,'Services'),
(4,'Informatique'),
(5,'Jeux & Jouets'),
(6,'Instruments de Musique'),
(7,'Animaux'),
(8,'Image & Son'),
(9,'Ameublement'),
(10,'Décoration'),
(11,'Vêtements'),
(12,'Autres');

INSERT INTO annonce
VALUES (1,'coq de compétition','donne coq de compétition, peu servi, dans son jus','2016-02-01',0,0,7,44000,1,'images/LogoMauvaisCoin.png','coq'),
(2,'ordinateur transportable','ordinateur transportable 23 pouces de marque soni, remis à zéro pour la vente','2016-02-01',1000,0,4,44470,2,'','ord'),
(3,'lit à barreaux','lit bébé à barreaux blanc, vendu sans matelas et sans bébé','2016-02-01',80,0,9,44470,2,'','lit'),
(4,'appartment au bord de la mer','appartement T4 en bord de mer pour sénor avertis, trois chambres, 2 caves, 5 places de parking et piste d\'attérissage pour hélicoptère','2016-02-05',450000,0,2,44210,3,'','app'),
(5,'cartes pokémon collector ultra rares','lot de 5 cartes pokémon rares comprenant un pikachou et deux rondoudons','2016-02-04',NULL,1,5,13100,4,'','car'),
(6,'Sous vétements petit navire','ensemble de culottes blanches de la marque petit navire, produit absolument original, quelques taches sont présentes mais rien de grave','2016-02-05',10,0,11,13100,4,'','sou'),
(7,'Fiat 500 aménagée en Camping Car','Fiat 500, carte grise 12 places aménagée camping car avec lit 3 places, auvent et evier/frigo intégré dans la banquette arrière','2016-02-05',15000,0,1,97300,5,'images/7.jpg','fia'),
(8,'Cours particulier de Nyotaimori','propose cours particulier de Nyotaimori, avec ou sens wasabi','2016-02-05',100,0,3,85000,6,'','cou'),
(9,'fèves de paque','lot de fèves dora l\'exploratrice usagées, à finir de nettoyer','2016-02-06',5,0,7,44000,1,'images/9.jpeg','fev'),
(10,'sapin de noel','vend cause no crois plus au pere noel, un sapin en plastique avec son lot de boules et plusieurs guirlandes lumineuses','2016-02-06',20,0,10,13100,7,'','sap'),
(11,'cassette vidéo ayant appartenu à François Mitterand','cassette vidéo vierge certifiée etre passée dans les mains de notre feu président, aucune idée du film...','2016-02-06',3000,0,8,44450,8,'','cas'),
(12,'smartefone samsoung','je souhaite vendre, cause triple emploi, un smartefone samsoung absolument neuf et qui a servi 2 ans. Vendu sans batterie, carte sim et écouteurs stéréau. bloqué opérateur lidl mobile','2016-02-06',150,0,4,13100,4,'','sma'),
(13,'vélo à réparer','je me sépare de mon fidèle desprier, quelques travaux à prévoir: roues, cadre, frein, selle, pneus, pédalier et chaine sont probablement à changer. Affaire à saisir!','2016-02-04',120,0,1,44420,9,'','vel'),
(14,'arbre multi-centenaire','arbre très vieux, je sais pas ce que c\'est mais c\'est vieux. A venir chercher sur place, prévoir un pelle','2016-02-08',NULL,0,12,44600,10,'images/14.jpg','arb'),
(15,'exercices corrigés de base de données','je met à disposition, contre un petit repas chaleureux agrémenté de boissons agréables, l\'ensemble des sujets corrigés du cours de base de données en Licence 1 de l\'université de Nantes','2016-02-08',NULL,0,3,44040,11,'images/15.jpg','exe'),
(16,'T-shirt britney spears','Cause déménagement, je cède à contre coeur, snif, mon t-shirt collector Britney Spears, baby one more time special tour. Objet rare sur le marché, faire offre en accord avec sa valeur sentimentale','2016-02-08',NULL,0,11,44116,12,'images/16.jpg','tsh'),
(17,'4x4 de luxe','Suite à un controle fiscal, je vend mon 4x4 de luxe toutes options : accoudoirs chauffants, jantes en bois de chène, aileron sport en titane-carbone, etc.','2016-02-08',45000,0,1,44211,13,'images/17.jpg','4x4'),
(18,'maison bourgeoise','Madame et moi-meme souhaiterions nous séparer de notre pied à terre nantais. Il s\'agit d\'une maison bourgeoise avec 12 chambres, 6 salles de bain et 1 canapé blanc en cuir de vachette','2016-02-08',1000000,0,2,44000,14,'images/18.jpg','mai'),
(19,'kazou numérique','vends un kazou numérique fender à double frete','2016-02-09',200,0,6,44420,9,'images/19.jpg','kaz'),
(20,'ordinateur de landing','vend cause double emploi, ordinateur de landing de compétition avec clavier, écran,cables et webcam.Très peu servi, sauf projet Java','2016-02-05',1000,0,4,97300,5,'','ord');