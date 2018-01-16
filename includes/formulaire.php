<!--Formulaire de recherche du site-->
<form action="annonces.php" method="get">

    <!--Saisie de mot-clefs. Le PHP permet de pré-remplir le champ avec
    une requête si existante-->
    <input class="formRecherche" type="text" name="recherche_texte" placeholder="Que recherchez-vous ?" <?php if(isset($recherche_texte)){echo'value="'.$recherche_texte.'"';} ?>/>

    <!--Séléction de la catégorie. Le PHP sert à pré-sélectionner la ligne de
    la requête précédente si requête il y a et que ce champ était rempli. Par défaut,
    "<<Choisissez la catégorie>>" est sélectionné-->
    <select class="formCategorie" name ="categorie">
        <option value="">&laquo;Choisissez la catégorie&raquo;</option>
        <option value ="1" <?php if(isset($categorie) && $categorie == 1){echo'selected="selected"';} ?>>Véhicules</option>
        <option value ="2" <?php if(isset($categorie) && $categorie == 2){echo'selected="selected"';} ?>>Immobilier</option>
        <option value ="3" <?php if(isset($categorie) && $categorie == 3){echo'selected="selected"';} ?>>Services</option>
        <option value="12" <?php if(isset($categorie) && $categorie == 12){echo'selected="selected"';} ?>>Autres</option>
        <option disabled class="categorie_titre">- LOISIR -</option>
        <option value="4" <?php if(isset($categorie) && $categorie == 4){echo'selected="selected"';} ?>>Informatique</option>
        <option value="5" <?php if(isset($categorie) && $categorie == 5){echo'selected="selected"';} ?>>Jeux & Jouets</option>
        <option value="6" <?php if(isset($categorie) && $categorie == 6){echo'selected="selected"';} ?>>Instruments de Musique</option>
        <option value="7" <?php if(isset($categorie) && $categorie == 7){echo'selected="selected"';} ?>>Animaux</option>
        <option value="8" <?php if(isset($categorie) && $categorie == 8){echo'selected="selected"';} ?>>Image & Son</option>
        <option disabled class="categorie_titre">- MAISON -</option>
        <option value="9" <?php if(isset($categorie) && $categorie == 9){echo'selected="selected"';} ?>>Ammeublement</option>
        <option value="10" <?php if(isset($categorie) && $categorie ==10 ){echo'selected="selected"';} ?>>Décoration</option>
        <option value="11" <?php if(isset($categorie) && $categorie == 11){echo'selected="selected"';} ?>>Vêtements</option>
    </select>

    <!--Ici, même principe que pour la sélection "catégorie" avec la variable $region-->
    <select class="formRegion" name="region">
        <option value=''>&laquo;Toute la France&raquo;</option>
        <option id='cat10' value="10" <?php if(isset($region) && $region == 10){echo'selected="selected"';} ?>>Alsace</option>
        <option id='cat15' value="15" <?php if(isset($region) && $region == 15){echo'selected="selected"';} ?>>Aquitaine</option>
        <option id='cat19' value="19" <?php if(isset($region) && $region == 19){echo'selected="selected"';} ?>>Auvergne</option>
        <option id='cat6' value="6" <?php if(isset($region) && $region == 6){echo'selected="selected"';} ?>>Basse-Normandie</option>
        <option id='cat7' value="7" <?php if(isset($region) && $region == 7){echo'selected="selected"';} ?>>Bourgogne</option>
        <option id='cat13' value="13" <?php if(isset($region) && $region == 13){echo'selected="selected"';} ?>>Bretagne</option>
        <option id='cat5' value="5" <?php if(isset($region) && $region == 5){echo'selected="selected"';} ?>>Centre-Val de Loire</option>
        <option id='cat2' value="2" <?php if(isset($region) && $region == 2){echo'selected="selected"';} ?>>Champagne-Ardenne</option>
        <option id='cat22' value="22" <?php if(isset($region) && $region == 22){echo'selected="selected"';} ?>>Corse</option>
        <option id='cat11' value="11" <?php if(isset($region) && $region == 11){echo'selected="selected"';} ?>>Franche-Comté</option>
        <option id='cat4' value="4" <?php if(isset($region) && $region == 4){echo'selected="selected"';} ?>>Haute-Normandie</option>
        <option id='cat1' value="1" <?php if(isset($region) && $region == 1){echo'selected="selected"';} ?>>Île-de-France</option>
        <option id='cat20' value="20" <?php if(isset($region) && $region == 20){echo'selected="selected"';} ?>>Languedoc-Roussillon</option>
        <option id='cat17' value="17" <?php if(isset($region) && $region == 17){echo'selected="selected"';} ?>>Limousin</option>
        <option id='cat9' value="9" <?php if(isset($region) && $region == 9){echo'selected="selected"';} ?>>Lorraine</option>
        <option id='cat16' value="16" <?php if(isset($region) && $region == 16){echo'selected="selected"';} ?>>Midi-Pyrénées</option>
        <option id='cat8' value="8" <?php if(isset($region) && $region == 8){echo'selected="selected"';} ?>>Nord-Pas-de-Calais</option>
        <option id='cat12' value="12" <?php if(isset($region) && $region == 12){echo'selected="selected"';} ?>>Pays de la Loire</option>
        <option id='cat3' value="3" <?php if(isset($region) && $region == 3){echo'selected="selected"';} ?>>Picardie</option>
        <option id='cat14' value="14" <?php if(isset($region) && $region == 14){echo'selected="selected"';} ?>>Poitou-Charente</option>
        <option id='cat21' value="21" <?php if(isset($region) && $region == 21){echo'selected="selected"';} ?>>Provence-Alpes-Côte-d'Azur</option>
        <option id='cat18' value="18" <?php if(isset($region) && $region == 18){echo'selected="selected"';} ?>>Rhône-Alpes</option>
        <option disabled class="categorie_titre">DOM-TOM</option>
        <option id='cat23' value="23" <?php if(isset($region) && $region == 23){echo'selected="selected"';} ?>>Guadeloupe</option>
        <option id='cat25' value="25" <?php if(isset($region) && $region == 25){echo'selected="selected"';} ?>>Guyane</option>
        <option id='cat26' value="26" <?php if(isset($region) && $region == 26){echo'selected="selected"';} ?>>La Réunion</option>
        <option id='cat24' value="24" <?php if(isset($region) && $region == 24){echo'selected="selected"';} ?>>Martinique</option>
        <option id='cat27' value="27" <?php if(isset($region) && $region == 27){echo'selected="selected"';} ?>>Mayotte</option>
    </select>

    <!--Même principe que pour le champ "recherche_texte" avec la variable $lieu-->
    <input class="formLieu" type="text" name="lieu" placeholder="Ville ou Code Postal" <?php if(isset($lieu)){echo'value="'.$lieu.'"';} ?> />

    <!--Cas particulier : les champs de prix affiche le prix maximal et le prix minimal
    existant dans la requête utilisateur. De plus, tout comme "recherche_texte" et "lieu",
    le champ se pré-remplit si une valeur a été donné lors de la requête précédente.-->
    <?php

        /*La requête utilisateur est passée en tant que TABLE afin de séléctionner le prix maximal*/
        $requete_prix="SELECT MAX(prix) FROM (".$requete.") AS v";

        /*Exécution de la nouvelle requête*/
        $res=mysqli_query($link,$requete_prix)
            or die("Erreur : la requête a échouée ! Veuillez contacter l'administrateur.".mysqli_errno($link));

        /*Stockage du résultat dans un tableau $max*/
        $max = mysqli_fetch_array($res);

        /*La requête utilisateur est passée en tant que TABLE afin de séléctionner le prix minimal*/
        $requete_prix="SELECT MIN(prix) FROM (".$requete.") AS v";

        $res=mysqli_query($link,$requete_prix)
            or die("Erreur : la requête 2 a échouée ! Veuillez contacter l'administrateur.");

        /*Stockage du résultat dans un tableau $min*/
        $min=mysqli_fetch_array($res);

        /*Traitement d'un cas particulier : si le prix maximal est égal au prix minimal,
        alors le prix minimal est forcé à 0 dans une question de facilité de lecture
        par l'utilisateur (e.g. ergonomie)*/
        if ($min[0]==$max[0]) {
            $min[0]=0;
        }

        if(is_null($max[0])) {
            $max[0]=1;
        }

        $max[0]=strrev( chunk_split( strrev($max[0]),3,' '));
        $min[0]=strrev( chunk_split( strrev($min[0]),3,' '));

    ?>
        
    <!--Champs de saisie du prix minimal et maximal. Pré-remplissage en PHP comme pour
    "recherche_texte" et "lieu" avec les variables $prix_min et $prix_max-->
    <p class="formPrix">Prix : de</p>
    <input class="formPrixP" type="text" name="prixmin" placeholder=<?php echo'"'.$min[0].' €" '; if(!is_null($prix_min) && $prix_min >= $min[0]){echo'value="'.$prix_min.'"';} ?>/>
    <p class="formPrix">à</p>
    <input class="formPrixP" type="text" name="prixmax" placeholder=<?php echo'"'.$max[0].' €" '; if(!is_null($prix_max) && $prix_max <= $max[0]){echo'value="'.$prix_max.'"';} ?>/>

    <!--Boutton d'envoie du formulaire-->
    <input class="formSend" type="submit" value="Rechercher"/>

</form>