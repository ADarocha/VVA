<head>
    <meta charset="UTF-8">
    <script src="jscss/fonctions.js"></script>
    <link rel=STYLESHEET href="jscss/style.css" type="text/css">
</head>



<?php if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != 'adm') 
    { //si une session est crée et selon le type de compte
        header('Location: index.php'); //redirection vers la page d'acceuil de ce type d'user
    }
?>


<!--formulaire de création d'un utilisateur !-->


<FORM id="formulaire" method="post" action="controles/deconnexion.php">
    <input type="submit" value="deconnexion" />
</FORM>


<TABLE>
    <FORM id="formulaire" method="post" action="admcreercompte.php" onsubmit="return VerificationChamps()"> 
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
                <input id ="motDePasse" name="motDePasse" type="password"/>
            </td>
        </tr>

        <tr>
            <td>
                Nom : 
            </td>
            <td>
                <input id ="motDePasse" name="motDePasse" type="password"/>
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

        <select size="6" >
            <option>Admin</option>
            <option>Villageois</option>
            <option>Gestionnaire</option>
        </select>


        <tr>
            <td colspan="2">
                <input type="submit" value="Créer" />
            </td>
        </tr>
    </FORM>
</TABLE>