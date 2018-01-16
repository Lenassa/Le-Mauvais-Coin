<?php
    
    /*compte le nombre d'erreurs dans le formulaire*/
    $error = 0;

    /*Prend la valeur 1 au cours du traitement au moins l'une des requêtes de type
    INSERT INTO, UPDATE, ou DELETE FROM réussi. Permet de lancer la réinitialisation
    de toutes la variables de session en fin de script*/
    $done = 0;

    $ajout_ville = 0;

    if ( !isset($_POST['ajout_ville']) ) {
        $_POST['ajout_ville'] = 0;
    }

    /*Si la variable $_POST['idNumero'] existe, alors il s'agit d'une modification
    ou bien d'une supression, auquel cas on récupère cette variable afin de retrouver
    l'annonce*/
    if ( isset($_POST['idNumero']) ) {
        $_SESSION['idNumero'] = $_POST['idNumero'];
    }

    /*Si $_POST['idUtilisateur'] existe, alors il s'agit d'une mise à jour
    de la base de donnée, on récupère donc cette valeur sous forme de session
    pour une utilisation ultérieure*/
    if ( isset($_POST['idUtilisateur']) ) {
        $_SESSION['idUtilisateur'] = $_POST['idUtilisateur'];
    }

    if ( isset($_POST['supprimer']) ) {
        $_SESSION['supprimer'] = true;
    }

    $user_rights = false;

?>


<?php

    if( isset($_SESSION['user_rights']) && $_SESSION['user_rights'] == false ) {
                
        echo'<p class="error_password">Mot de passe érroné</p>';
        unset($_SESSION['user_rights']);
    }

    if ( isset($_SESSION['done']) OR isset($_POST['done']) ) {

        echo'<p class="error_password">Procédure réussie</p>';
        session_unset();
        unset($_POST);
    }
?>



<form class="annonce_deposer" enctype="multipart/form-data" action="posterAnnonces.php" method="post">




    <!--__________________________________________________CATEGORIE__________________________________________-->
    <div class="formDeposer">

        <p>CAT&Eacute;GORIE</p>

        <!--Séléction de la catégorie. Le PHP sert à pré-sélectionner la ligne de
        la requête précédente si requête il y a et que ce champ était rempli. Par défaut,
        "<<Choisissez la catégorie>>" est sélectionné-->

        <?php
            if ( isset($_POST['categorie_deposer']) && $_POST['categorie_deposer']==''){
                
                echo'<p class="error">Veuillez choisir une catégorie</p>';
                $error += 1;
            
            } else if ( isset($_POST['categorie_deposer']) ) {
                
                $_SESSION['categorie_deposer'] = $_POST['categorie_deposer'];
            }
        ?>

        <select class="formCategorie_deposer" name ="categorie_deposer">
            <option value="">&laquo;Choisissez la catégorie&raquo;</option>
            <option value ="1" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 1){echo'selected="selected"';} ?>>Véhicules</option>
            <option value ="2" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 2){echo'selected="selected"';} ?>>Immobilier</option>
            <option value ="3" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 3){echo'selected="selected"';} ?>>Services</option>
            <option value="12" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 12){echo'selected="selected"';} ?>>Autres</option>
            <option disabled class="categorie_titre">- LOISIR -</option>
            <option value="4" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 4){echo'selected="selected"';} ?>>Informatique</option>
            <option value="5" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 5){echo'selected="selected"';} ?>>Jeux & Jouets</option>
            <option value="6" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 6){echo'selected="selected"';} ?>>Instruments de Musique</option>
            <option value="7" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 7){echo'selected="selected"';} ?>>Animaux</option>
            <option value="8" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 8){echo'selected="selected"';} ?>>Image & Son</option>
            <option disabled class="categorie_titre">- MAISON -</option>
            <option value="9" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 9){echo'selected="selected"';} ?>>Ammeublement</option>
            <option value="10" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] ==10 ){echo'selected="selected"';} ?>>Décoration</option>
            <option value="11" <?php if(isset($_SESSION['categorie_deposer']) && $_SESSION['categorie_deposer'] == 11){echo'selected="selected"';} ?>>Vêtements</option>
        </select>
    </div>
    





    <!--___________________________________________________LIEU_________________________________________________-->

    <div class="formDeposer">
        <p>LOCALISATION</p>
        
        <!--Ici, même principe que pour la sélection "catégorie" avec la variable $region_deposer-->
        
        <?php
            if ( isset($_POST['region_deposer']) && $_POST['region_deposer']==''){
                
                echo'<p class="error">Veuillez choisir une région</p>';
                $error += 1;
            
            } else if ( isset($_POST['region_deposer']) ) {
               
                $_SESSION['region_deposer'] = $_POST['region_deposer'];
            }
        ?>

        <select class="formRegion_deposer" name="region_deposer">
            <option value=''>&laquo;Choisissez la région&raquo;</option>
            <option id='cat10' value="10" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 10){echo'selected="selected"';} ?>>Alsace</option>
            <option id='cat15' value="15" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 15){echo'selected="selected"';} ?>>Aquitaine</option>
            <option id='cat19' value="19" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 19){echo'selected="selected"';} ?>>Auvergne</option>
            <option id='cat6' value="6" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 6){echo'selected="selected"';} ?>>Basse-Normandie</option>
            <option id='cat7' value="7" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 7){echo'selected="selected"';} ?>>Bourgogne</option>
            <option id='cat13' value="13" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 13){echo'selected="selected"';} ?>>Bretagne</option>
            <option id='cat5' value="5" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 5){echo'selected="selected"';} ?>>Centre-Val de Loire</option>
            <option id='cat2' value="2" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 2){echo'selected="selected"';} ?>>Champagne-Ardenne</option>
            <option id='cat22' value="22" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 22){echo'selected="selected"';} ?>>Corse</option>
            <option id='cat11' value="11" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 11){echo'selected="selected"';} ?>>Franche-Comté</option>
            <option id='cat4' value="4" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 4){echo'selected="selected"';} ?>>Haute-Normandie</option>
            <option id='cat1' value="1" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 1){echo'selected="selected"';} ?>>Île-de-France</option>
            <option id='cat20' value="20" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 20){echo'selected="selected"';} ?>>Languedoc-Roussillon</option>
            <option id='cat17' value="17" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 17){echo'selected="selected"';} ?>>Limousin</option>
            <option id='cat9' value="9" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 9){echo'selected="selected"';} ?>>Lorraine</option>
            <option id='cat16' value="16" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 16){echo'selected="selected"';} ?>>Midi-Pyrénées</option>
            <option id='cat8' value="8" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 8){echo'selected="selected"';} ?>>Nord-Pas-de-Calais</option>
            <option id='cat12' value="12" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 12){echo'selected="selected"';} ?>>Pays de la Loire</option>
            <option id='cat3' value="3" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 3){echo'selected="selected"';} ?>>Picardie</option>
            <option id='cat14' value="14" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 14){echo'selected="selected"';} ?>>Poitou-Charente</option>
            <option id='cat21' value="21" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 21){echo'selected="selected"';} ?>>Provence-Alpes-Côte-d'Azur</option>
            <option id='cat18' value="18" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 18){echo'selected="selected"';} ?>>Rhône-Alpes</option>
            <option disabled class="categorie_titre">DOM-TOM</option>
            <option id='cat23' value="23" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 23){echo'selected="selected"';} ?>>Guadeloupe</option>
            <option id='cat25' value="25" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 25){echo'selected="selected"';} ?>>Guyane</option>
            <option id='cat26' value="26" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 26){echo'selected="selected"';} ?>>La Réunion</option>
            <option id='cat24' value="24" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 24){echo'selected="selected"';} ?>>Martinique</option>
            <option id='cat27' value="27" <?php if(isset($_SESSION['region_deposer']) && $_SESSION['region_deposer'] == 27){echo'selected="selected"';} ?>>Mayotte</option>
        </select>

        <!--Même principe que pour le champ "recherche_texte" avec la variable $lieu-->



       
        <?php
            /*Vérification de la présence et de l'existence du nom de Ville.
            Une requête SQL rapide permet de vérifier l'existence de la ville entrée.
            Si présence et validité, alors stockage dans une variable SESSION*/

            if ( isset($_POST['ville_deposer']) && empty($_POST['ville_deposer'])) {
                
                echo'<p class="error">Veuillez entrer un nom de ville valide</p>';
                $error += 1;
            
            } else if ( isset($_POST['ville_deposer']) ) {
                
                $_SESSION['ville_deposer'] = $_POST['ville_deposer'];
            }
        ?>

        <input class="formVille_deposer" type="text" name="ville_deposer" placeholder="Ville ?" <?php if(isset($_SESSION['ville_deposer'])){echo'value="'.$_SESSION['ville_deposer'].'"';} ?> />
        


        <?php
            /*Vérification de la présence, la validité, et l'existence du code postal. Est vérifié Le fait que l'entrée
            est numérique, qu'il fasse 5 charactères de long, et qu'il existe. Si présence et validité, alors stockage dans une variable SESSION*/

            if ( isset($_POST['code_postal_deposer']) && (empty($_POST['code_postal_deposer']) OR !is_numeric($_POST['code_postal_deposer']) OR (!empty($_POST['code_postal_deposer']) && strlen($_POST['code_postal_deposer']) != 5))) {
                
                echo'<p class="error">Veuillez entrer un code_postal valide</p>';
                $error += 1;
           
            } else if (isset($_POST['code_postal_deposer']) && !empty($_POST['code_postal_deposer'])) {
                $_SESSION['code_postal_deposer'] = $_POST['code_postal_deposer'];
            }
        ?>

        <input class="formCode_postal_deposer" type="text" name="code_postal_deposer" placeholder="Code Postal ?" <?php if(isset($_SESSION['code_postal_deposer'])){echo'value="'.$_SESSION['code_postal_deposer'].'"';} ?> />
    
        <?php

            /*Dans le cadre où la combinaison code postal / ville n'existe pas dans la base de données*/
            if ( isset($_SESSION['ville_deposer']) && isset($_SESSION['code_postal_deposer']) ) {


                    if ( mysqli_num_rows(mysqli_query($link,"SELECT code_postal, ville FROM lieu WHERE code_postal = '".$_SESSION['code_postal_deposer']."' AND ville= '".$_SESSION['ville_deposer']."';")) == 0) {
                
                        if($_POST["ajout_ville"]==1){$glitch1="checked";$glitch2="";}else{$glitch2="checked";$glitch1="";}

                        /*Propose à l'utilisateur d'ajouter la ville dans la base de données ou bien de rectifier ses informations*/
                        echo'<p class="error">Cette association Ville / Code Postal nous est inconnue ! Souhaitez-vous l\'ajouter ?<br />
                        <input type="radio" name="ajout_ville" value="1" '.$glitch1.'> Oui<br />
                        <input type="radio" name="ajout_ville" value="0" '.$glitch2.'> Non </p>';
                    
                        if ($_POST["ajout_ville"] == 0) {
                            
                            echo'<p class="error">Veuillez indiquer votre choix ou bien vérifier les informations que vous avez entré</p>';
                            $error += 1;
                        }
                    }
                }
        ?>

    </div>








      <!--_________________________________________________UTILISATEUR___________________________________________-->
    
    <div class="formDeposer">
        <p>VOS INFORMATIONS</p>

        <?php
            /*Vérification de la présence et validité de l'e-mail. Le type "email" vérifie seul ladite validité
            Si présence et validité, alors stockage dans une variable SESSION*/

            if (isset($_POST['email_deposer']) && empty($_POST['email_deposer'])) {
                
                echo'<p class="error">Veuillez entrer un email valide</p>';
                $error += 1;
            
            } else if (isset($_POST['email_deposer']) && !empty($_POST['email_deposer'])) {
                
                $_SESSION['email_deposer'] = $_POST['email_deposer'];
            }
        ?>

        <input class="formMail_deposer" type="email" name="email_deposer" placeholder="exemple@domain.ex" <?php if(isset($_SESSION['email_deposer'])){echo'value="'.$_SESSION['email_deposer'].'"';} ?> />
    


        <?php
            /*Vérification de la présence et validité du téléphone. Il doit comporter 10 charactères, être numérique,
            et commencer par un "0". Si présence et validité, alors stockage dans une variable SESSION*/

            if (( isset($_POST['phone_deposer']) && !empty($_POST['phone_deposer']) ) && ( !is_numeric($_POST['phone_deposer']) OR ( ( strlen($_POST['phone_deposer']) != 10 ) OR mb_substr($_POST['phone_deposer'], 0, 1, 'utf-8') != '0' ))) {
                
                echo'<p class="error">Veuillez entrer un numéro de téléphone valide</p>';
                $error += 1;
            
            } else if(isset($_POST['phone_deposer'])) {
                
                $_SESSION['phone_deposer'] = $_POST['phone_deposer'];
            }
        ?>

        <input class="formPhone" type="text" name="phone_deposer" maxlenght="10" placeholder="0123456789" <?php if(isset($_SESSION['phone_deposer'])){echo'value="'.$_SESSION['phone_deposer'].'"';} ?> />
    </div>










    <!--______________________________________________________ANNONCE____________________________________________-->
    
    <div class="formDeposer">
        <p>VOTRE ANNONCE</p>

	   <!--Saisie de mot-clefs. Le PHP permet de pré-remplir le champ avec
        une requête si existante-->

        <?php
            if (isset($_POST['titre_deposer']) && (empty($_POST['titre_deposer']) OR strlen($_POST['titre_deposer']) < 10)) {
                echo'<p class="error">Veuillez entrer un titre pour votre annonce d\'au moins 10 charactères</p>';
                $error += 1;

            } else if (isset($_POST['titre_deposer']) && !empty($_POST['titre_deposer'])) {
                
                $_SESSION['titre_deposer'] = $_POST['titre_deposer'];
            }
        ?>

        <input class="formTitre_deposer" type="text" name="titre_deposer" placeholder="Titre de votre annonce (10 char. minimum)" <?php if(isset($_SESSION['titre_deposer'])){echo'value="'.$_SESSION['titre_deposer'].'"';} ?>/>
    


        <?php
            /*Vérification de la validité de la description. Elle doit être d'au moins 100 charactères, et est obligatoire
            Si existence et validité, alors elle est stockée dans une variable de session*/

            if (isset($_POST['description_deposer']) && (empty($_POST['description_deposer']) OR strlen($_POST['description_deposer']) < 100)) {
                
                echo'<p class="error">Veuillez entrer une description pour votre annonce d\'au moins 100 charactères</p>';
                $error += 1;

            } else if(isset($_POST['description_deposer'])) {
                
                $_SESSION['description_deposer'] = $_POST['description_deposer'];
            }
        ?>

        <textarea class="formDescription_deposer" name="description_deposer" rows="8" cols="89" placeholder="Entrez une description pour votre annonce (100 char. minimum)."><?php if(isset($_SESSION['description_deposer'])){echo''.$_SESSION['description_deposer'];}?></textarea>
    


        <!--Champs de saisie du prix. Pré-remplissage en PHP comme pour
        "recherche_texte" et "lieu" avec la variable $_POST['prix_deposer']-->

        <?php
            /*Vérification de la validité du prix. Il doit être numéique ET être un entier. Ce n'est pas un élément obligatoire.
            Si existence et validité, alors il est stocké dans une variable session*/

            if ( (isset($_POST['prix_deposer']) && !empty($_POST['prix_deposer'])) && (!is_numeric($_POST['prix_deposer']) OR filter_var($_POST['prix_deposer'], FILTER_VALIDATE_INT, 'min-range' >= 0) == false )) {
                
                echo'<p class="error">Veuillez entrer un prix valide pour votre annonce (les centimes ne sont pas acceptés)</p>';
                $error += 1;
            
            } else if ( isset($_POST['prix_deposer']) && !empty($_POST['prix_deposer']) ) {

                $_SESSION['prix_deposer'] = $_POST['prix_deposer'];
            }
        ?>

        <input class="formPrix_deposer" type="text" name="prix_deposer" placeholder="Votre Prix ?" <?php if(isset($_SESSION['prix_deposer'])){echo'value="'.$_SESSION['prix_deposer'].'"';} ?>/>
    

        <?php
            if ( isset($_POST['faire_offre']) && $_POST['faire_offre'] == 1) {
                
                $_SESSION['faire_offre'] = $_POST['faire_offre'];
            
            } else {
                
                unset($_SESSION['faire_offre']);
            }
        ?>

        <input type="hidden" name="faire_offre" value="0"/>
        <input type="checkbox" name="faire_offre" value="1" class="formFaire_offre" <?php if(isset($_SESSION['faire_offre'])){echo'checked';} ?>><p class="formFaire_offre"/>: Faire offre ?</p>


        <input type="hidden" name="MAX_FILE_SIZE" value ="1000000" />
        <input type="file" name="image" accept=".jpg,.jpeg,.png" class="formImage_deposer"/>
        

        <?php

            if ( isset($_SESSION['idNumero']) ) {
                
                echo'<p class="infoForm">Pour modifier ou supprimer votre annonce, entrez le mot de passe choisi lors de sa création</p>';
            }

            if ( isset($_POST['password_deposer']) && empty($_POST['password_deposer']) ) {
                echo'<p class="error">Veuillez entrer un mot de passe afin de pouvoir modifier ou supprimer votre annonce par la suite</p>';
                $error += 1;
            
            } else if ( isset($_POST['password_deposer']) && !empty($_POST['password_deposer']) ) {

                $_SESSION['password_deposer'] = $_POST['password_deposer'];
            }
        ?>

        <input class="formPassword" type="password" name="password_deposer" placeholder="Mot de passe ?"/>

    </div>


    <!--Boutton de réinitialisation du formulaire-->
    <input class="formSend_deposer" type="submit" name="done" value="Vider le formulaire"/>
    <br />

    <!--Boutton d'envoie du formulaire-->
    <input class="formSend_deposer" type="submit" name="deposer" value="Déposer / Modifier"/>
    <?php
        if( isset($_SESSION['idNumero']) ) {
            echo'<input class="formSend_supprimer" type="submit" name="supprimer" value="Supprimer"/>';
        }
    ?>
</form>















<?php
/*_______________________________________________________________________________________________________*/
/*____________________________________________TRAITEMENT DES DONNES______________________________________*/
/*_______________________________________________________________________________________________________*/
?>







<?php
    if($error == 0) {




        /*______________________________Récupération du mot de passe dans la base de données_______________________*/
        

        if( isset($_SESSION['idNumero']) && isset($_SESSION['idUtilisateur']) ) {

            $password = mysqli_fetch_array(mysqli_query($link,"SELECT password
                                                                FROM annonce 
                                                                WHERE idNumero = ".$_SESSION['idNumero']." 
                                                                AND idUtilisateur = ".$_SESSION['idUtilisateur'].";"));

            $password = $password[0];
        }


        /*Test du mot de passe pour vérifier les droits d'utilisateur*/
        if ( isset($_SESSION['password_deposer']) && isset($password) ) {

            if ( $password == $_SESSION['password_deposer'] ) {

                $user_rights = true;
            
            } else {
                $_SESSION['user_rights'] = false;
            }
        }





        /*_________________________________________________UTILISATEUR_____________________________________________*/


        /*Si la variable obligatoire Utilisateur existe*/
        if ( isset($_SESSION['email_deposer']) ) {

                
            /*On récupère l'idUtilisateur MAX existant pour une utilisation ultérieur*/
            $idUtilisateur = mysqli_fetch_array( mysqli_query($link,"SELECT MAX(idUtilisateur) 
                                                                     FROM utilisateur;"));
            $idUtilisateur = $idUtilisateur[0];
        
            /*Si l'utilisateur a rentré un numéro de téléphone (donnée facultative)*/
            if ( isset($_SESSION['phone_deposer']) ) {

                /*Si la requête renvoie faux, alors l'utilisateur n'existe pas encore,
                ou bien il s'agit d'un mise à jour d'un utilisateur existant
                (les données diffèrent donc)*/
                if( mysqli_num_rows(mysqli_query($link,"SELECT email, phone 
                                        FROM utilisateur 
                                        WHERE email ='".$_SESSION['email_deposer']."' 
                                        AND phone ='".$_SESSION['phone_deposer']."';")) == 0 ) {
            
                    /*Son ID est alors le dernier existant + 1*/
                    $idUtilisateur += 1;


                    /*SI la variable marquant la mise à jour existe,
                    ALORS la base de donnée est mise à jour
                    SINON l'utilisateur est créé*/

                    /*MISE A JOUR AVEC TELEPHONE*/
                    if( isset($_SESSION['idUtilisateur']) ) {

                        
                        /*Si l'utilisateur a les droits d'édition et de supression sur cette annonce alors*/
                        if ($user_rights) {

                            mysqli_query($link,"UPDATE utilisateur
                                                SET email ='".$_SESSION['email_deposer'].
                                                "', phone ='".$_SESSION['phone_deposer'].
                                                "' WHERE idUtilisateur =".$_SESSION['idUtilisateur'].";")
                                                        or die("plop you dieded update user with phone".mysqli_errno($link));
                        }

                    



                    /*CREATION DE L'UTILISATEUR AVEC TELEPHONE*/
                    } else {

                        /*On créé l'utilisateur dans la base de données*/
                        mysqli_query($link,"INSERT INTO utilisateur 
                                            VALUES (".$idUtilisateur.",'"
                                                .$_SESSION['email_deposer']."','"
                                                .$_SESSION['phone_deposer']."');")
                                                        or die("plop you dieded user with phone".mysqli_errno($link));
                    }

                } else {
                
                    /*Si l'utilisateur existe déjà, on récupère son ID pour une utilisation ultérieur*/
                    $idUtilisateur = mysqli_fetch_array(mysqli_query($link,"SELECT idUtilisateur 
                                        FROM utilisateur 
                                        WHERE email ='".$_SESSION['email_deposer']."' 
                                        AND phone ='".$_SESSION['phone_deposer']."';"));
                    $idUtilisateur = $idUtilisateur[0];
                }

            } else {
                /*Si l'utilisateur n'a pas rentré de téléphone*/

                /*Si la requête de recherche renvoie faux, alors l'utilisateur n'existe pas encore
                (comme il n'a rentré aucun numéro de téléphone, celui-ci n'est pas cherché).
                La requête renvoie également faux dans le cas d'une mise à jour, car les
                nouvelles données diffèrent de celles stockées*/
                if( !mysqli_query($link,"SELECT email 
                                        FROM utilisateur 
                                       WHERE email ='".$_SESSION['email_deposer']."';")) {
                

                    /*MISE A JOUR SANS TELEPHONE*/
                    if(isset($_SESSION['idUtilisateur'])) {

                        
                        /*Si l'utilisateur a les droits d'édition et de supression sur cette annonce alors*/
                        if ($user_rights) {

                            mysqli_query($link,"UPDATE utilisateur
                                                SET email ='".$_SESSION['email_deposer'].
                                                "', phone = NULL 
                                                WHERE idUtilisateur =".$_SESSION['idUtilisateur'].";")
                                                        or die("plop you dieded update user with phone".mysqli_errno($link));
                        }

                    



                    /*AJOUT NORMAL, PAS DE MISE A JOUR*/
                    } else {

                        $idUtilisateur += 1;

                        mysqli_query($link,"INSERT INTO utilisateur 
                                            VALUES (".$idUtilisateur.",'"
                                                .$_SESSION['email_deposer']."',
                                                NULL);")
                                                    or die("plop you dieded user without phone".mysqli_errno($link));
                    }
                
                } else {
                 
                    /*Si l'utilisateur existe déjà, on récupère son ID pour une utilisation ultérieur*/
                    $idUtilisateur = mysqli_fetch_array(mysqli_query($link,"SELECT idUtilisateur 
                                        FROM utilisateur 
                                        WHERE email ='".$_SESSION['email_deposer']."',NULL;"));
                    $idUtilisateur = $idUtilisateur[0];
                }
            }
        }










        /*__________________________________________________________LIEU__________________________________________*/

        if (isset($_POST['ajout_ville'])) {
         
            $ajout_ville = $_POST['ajout_ville'];
        }

        if ( $ajout_ville == 1 && isset($_SESSION['code_postal_deposer']) && isset($_SESSION['ville_deposer']) && isset($_SESSION['region_deposer']) ) {

            mysqli_query($link,"INSERT INTO lieu
                                VALUES ('".$_SESSION['code_postal_deposer']."','"
                                    .$_SESSION['ville_deposer']."',"
                                    .$_SESSION['region_deposer'].")")
                                            or die("plop you dieded city".mysqli_errno($link));
        }











        /*_____________________________________________________ANNONCE____________________________________________*/


        if (isset($_SESSION['titre_deposer']) && isset($_SESSION['description_deposer'])
            && isset($_SESSION['categorie_deposer']) && isset($_SESSION['code_postal_deposer'])
            && isset($_SESSION['password_deposer'])) {


            /*On récupère l'idNumero maximal existant*/
            $idNumero = mysqli_fetch_array( mysqli_query($link,"SELECT MAX(idNumero) 
                                                                FROM annonce ;"));
            $idNumero = $idNumero[0] + 1;

            /*On récupère la date courante*/
            $date = getdate();

            if ($date['mday'] < 10) {

                $date['mday'] = '0'.$date['mday'];
            }

            if ($date['mon'] < 10) {

                $date['mon'] = '0'.$date['mon'];
            }

            /*Si un prix est indiqué, on le récupère, sinon NULL est inséré dans la requête*/
            if ( isset($_SESSION['prix_deposer']) ) {

                $prix = $_SESSION['prix_deposer'];
            
            } else {

                $prix = NULL;
            }


            /*Si l'utilisateur a coché faire offre, alors 1 est inséré dans la requête,
            sinon un 0 viendra le remplacer*/
            if ( isset($_SESSION['faire_offre']) ) {

                $offre = 1;
            
            } else {

                $offre = 0;
            }


            /*Si l'utilisateur a téléversé une image, alors son chemin d'accès est inséré
            dans la requête, sinon une chaine de charactères vide le remplace*/
            if ( isset($_SESSION['chemin_img']) ) {

                $chemin_img = $_SESSION['chemin_img'];
            
            } else {

                $chemin_img = "";
            }


            if ( isset($_SESSION['idNumero']) ) {


                /*Si l'utilisateur a les droits sur cette annonce alors*/
                if ($user_rights) {

                    /*Si le choix est de supprimer, alors*/
                    if ( isset($_SESSION['supprimer']) ) {

                        mysqli_query($link,"DELETE FROM annonce 
                                            WHERE idNumero =".$_SESSION['idNumero']." ;")
                                                    or die("plop you dieded DELETE".mysqli_errno($link));



                    $_SESSION['done'] = true;






                    /*Sinon, l'annonce est modifié (étant donnée qu'elle existe déjà*/
                    } else {
                    
                        mysqli_query($link, "UPDATE annonce
                                            SET titre ='".addslashes( $_SESSION['titre_deposer'] ).
                                                "', description ='".addslashes( $_SESSION['description_deposer'] ).
                                                "', prix =".$prix.
                                                ", offre =".$offre.
                                                ", idCategorie =".$_SESSION['categorie_deposer'].
                                                ", code_postal ='".$_SESSION['code_postal_deposer'].
                                                "' WHERE idNumero =".$_SESSION['idNumero'].";")
                                                        or die("plop you dieded update annonce".mysqli_errno($link));


                        $_SESSION['done'] = true;
                    }
                }
            
            





            /*L'annonce n'existant pas déjà, elle est postée*/
            } else {

                
                mysqli_query($link,"INSERT INTO annonce
                                    VALUES (".$idNumero.",'"
                                        .addslashes( $_SESSION['titre_deposer'] )."','"
                                        .addslashes( $_SESSION['description_deposer'] )."','"
                                        .$date['year']."-".$date['mon']."-".$date['mday']."',"
                                        .$prix.","
                                        .$offre.","
                                        .$_SESSION['categorie_deposer'].",'"
                                        .$_SESSION['code_postal_deposer']."',"
                                        .$idUtilisateur.",'"
                                        .$chemin_img."','"
                                        .$_SESSION['password_deposer']."')")
                                                or die("plop you dieded".mysqli_errno($link));
                

                $_SESSION['done'] = true;
            }
        }

    }
?>