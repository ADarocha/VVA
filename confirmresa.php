<meta charset="UTF-8">
<?php
session_start();


//nombre de places choisie en variable de session
if (!isset($_GET['page'])){
$_SESSION['nbPlaces'] = $_POST['nbplaces2'];}


//récapitulatif de la réservation
echo"<table>
    <tr colspan='2'>
        <td>
            Récapitulatif :
        </td> 
    </tr>
    <tr>
        <td>
            Hébergement choisi :
        </td>
        <td>
            " . $_SESSION['hebergement'] . "
        </td>
    </tr>
    <tr>
        <td>
            Début de la réservation :
        </td>
        <td>
            " . $_SESSION['semaine'] . "
        </td>
    </tr>
    <tr>
        <td>
            Nombre d'occupants :
        </td>
        <td>
            " . $_SESSION['nbPlaces'] . "
        </td>
    </tr>
    <tr colspan='2'>
        <td>
            Tarif retenu :
        </td>
        <td>
            " . $_SESSION['tarif'] . "€
        </td>
    </tr>
    <tr colspan='2'>
        <td>
            Montant des arrhes :
        </td>
        <td>
            " . $_SESSION['tarif'] * 0.5 . "€
        </td>
    </tr>
    <tr colspan='2'>
        <td>
            <form id='form' method='post' action='modele/reservationsql.php'>
                <input type='submit' value='Confirmer la réservation'/>
            </form>
        </td>
    </tr>
</table>";



//Si la reservation est effectuée, on confirme.
 if (isset($_GET['page'])) {
        if ($_GET['page'] == 'succes') {
            echo"<font color='green'>La réservation a été prise en compte.</font>";
        }
    }
