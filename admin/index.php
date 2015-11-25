<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resa_VVA</title>
        <script src="jscss/fonctions.js"></script>
        <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">

    </head>
    

    
    <?php
        session_start(); //creation de session

        if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != 'adm') {
            header('Location: ../index.php');
        }
    ?>
    

    
    <body>
        <TABLE>
        <tr>
            <td>
                <a href='creercompte.php'>Créer un nouvel utilisateur</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href='voircomptes.php'>Voir / supprimer / modifier un utilisateur</a>
            </td>
        </tr>
    </TABLE>
    </body>
</html>
