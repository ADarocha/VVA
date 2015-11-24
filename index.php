<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resa_VVA</title>
        <script src="jscss/fonctions.js"></script>
        <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">

    </head>
    

    
    <?php
        session_start(); //creation de session

        if (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'adm') { //si une session est crée et selon le type de compte
            header('Location: admin.php'); //redirection vers la page d'acceuil de ce type d'user
        } elseif (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'vil') {
            header('Location: reservation.php');
        } elseif (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'ges') {
            header('Location: gestion/gestion.php');
        }
    ?>
    

    
    <body>

        <!--formulaire de connexion-->
        <TABLE>
            <FORM id="formulaire" method="post" action="modele/connexion.php" onsubmit="return VerificationChamps()"> 
                <tr>
                    <td>
                        Nom d'utilisateur : 
                    </td>
                    <td>
                        <input id="nomUtilisateur" name="nomUtilisateur" type="text"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Mot de passe : 
                    </td>
                    <td>
                        <input id ="motDePasse" name="motDePasse" type="password"/>
                    </td>
                </tr>
                <tr colspan="2" class="centrer">
                    <td>
                        <input type="submit" value="Connexion" />
                    </td>
                </tr>
                <tr colspan="2" class="centrer">
                    <td>
                        <a href="recherche.php">Recherche d'hébergement</a>
                    </td>
                </tr>
            </FORM>
        </TABLE>
    </body>
</html>
