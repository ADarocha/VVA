<?php 
$titre = "Verification de la réservation";
$arriere = "../";
include "../design/top.php";
include '../bdd/sql.php';


//Requête pour vérifier si l'herbergement sélectionné est déjà réservé ou non
/*if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "vil") {

    header("Location:../index.php");
}*/
$req = "SELECT resa.DATEDEBSEM, resa.NOHEB
                FROM resa, hebergement
                WHERE resa.NOHEB = hebergement.NOHEB
                AND hebergement.NOMHEB = '" . $_POST['hebergement'] . "' 
                AND resa.DATEDEBSEM = '" . $_POST['semaine'] . "'";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);







//Si l'hébergement est déjà réservé, on redirige vers reservation.php avec un message d'erreur
if (mysqli_num_rows($res) == 1) {
    header('Location: reservation.php?erreur=nondispo');
}





//sinon on permet à l'utilisateur de confirmer sa reservation
else {






//requete de récuperation du nombre de places
    $req2 = "SELECT NBPLACEHEB
                FROM hebergement
                WHERE NOMHEB = '" . $_POST['hebergement'] . "'";
    $res2 = mysqli_query($con, $req2);
    $ligne2 = mysqli_fetch_array($res2);



//variables
    $nbPlaces = $ligne2['NBPLACEHEB'];
    $_SESSION['hebergement'] = $_POST['hebergement'];
    $_SESSION['semaine'] = substr($_POST['semaine'], 0, 10);




//recupération du tarif
    $req3 = "SELECT tarif.PRIXHEB
                FROM hebergement, tarif, saison, semaine
                WHERE hebergement.NOHEB = tarif.NOHEB
                AND tarif.CODESAISON = saison.CODESAISON
                AND saison.CODESAISON = semaine.CODESAISON
                AND hebergement.NOMHEB = '" . $_SESSION['hebergement'] . "' 
                AND semaine.DATEDEBSEM = '" . $_POST['semaine'] . "'";
    $res3 = mysqli_query($con, $req3);
    $ligne3 = mysqli_fetch_array($res3);

    $_SESSION['tarif'] = $ligne3['PRIXHEB'];



    //affichage du formulaire
    echo"
        </br></br>
<div class='container' align='center'>  
<table class='tableau'>
    <form id='form' method='post' action='confirmresa.php'>
    <tr>
        <td>
            Vous avez selectionné l'hebergement " . $_SESSION['hebergement'] . "
        </td>
    </tr>
    <tr>
        <td>Nombre de places : <select name='nbplaces2'>
                ";
    for ($i = 1; $i <= $nbPlaces; $i++) {
        echo '<option>' . $i . '</option>';
    }
    echo"
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <input type='submit' value='Confirmer la réservation' />
        </td>
    </tr>
    </form>
    </table>
    </div>
    </br></br>";
}

  include'../design/footer.php';
        ?>
