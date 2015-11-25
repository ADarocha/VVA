<head>
    <meta charset="UTF-8">
    <script src="jscss/fonctions.js"></script>
    <title>Resa_VVA - Créer un compte</title>
    <link rel=STYLESHEET href="jscss/style.css" type="text/css">
</head>



<?php
session_start();
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != 'adm') { //si une session est crée et selon le type de compte
    header('Location: ../index.php'); //redirection vers la page d'acceuil de ce type d'user
}
?>


<!--formulaire de création d'un utilisateur !-->



<TABLE>
    <FORM id="formulaire" method="post" action="../bdd/inscription.php" onsubmit="return VerificationChamps()"> 
        <tr colspan="2"> Création d'un compte utilisateur : </tr>
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

        <tr>
            <td>
                Prénom : 
            </td>
            <td>
                <input id ="motDePasse" name="prenom" type="text"/>
            </td>
        </tr>

        <tr>
            <td>
                Nom : 
            </td>
            <td>
                <input id ="motDePasse" name="nom" type="text"/>
            </td>
        </tr>
        <tr>
            <td>
                Type d'utilisateur :
            </td>
            <td>
                <select name="typeUtilisateur">
                    <option>Admin</option>
                    <option>Villageois</option>
                    <option>Gestionnaire</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>(Remplir la suite uniquement dans le cas de la création d'un villageois)</td>
        </tr>
        <tr>
            <td>
                Adresse mail : 
            </td>
            <td>
                <input id ="mail" name="mail" type="text"/>
            </td>
        </tr>
        <tr>
            <td>
                N° de téléphone fixe : 
            </td>
            <td>
                <input id ="telfixe" name="telfixe" type="text"/>
            </td>
        </tr>
        <tr>
            <td>
                N° de téléphone portable : 
            </td>
            <td>
                <input id ="telport" name="telport" type="text"/>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="Créer" />
            </td>
        </tr>
    </FORM>
</TABLE>