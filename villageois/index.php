<?php
$titre = "Acceuil villageois";
$arriere = "../";
include "../design/top.php";
include '../bdd/sql.php';
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "vil") {

    header("Location:../index.php");
}
?>
</br></br>
<div class='container' align='center'>  
    Vos réservations :
    </br>
    <table border='1' class='tableau'>
        <tr>
            <td>Hébergement :</td>
            <td>Dû :</td>
            <td>Arrhes :</td>
            <td>Date de début :</td>
            <td>Date de paiement des Arrhes :</td>
            <td>État de la réservation :</td>
            <td>Action(s) :</td>
        </tr>
        <?php
        $req = "SELECT H.NOMHEB, H.NOHEB, R.PRIXRESA, R.MONTANTARRHES, R.DATEDEBSEM, R.DATEARRHES, "
                . "E.NOMETATRESA, R.CODEETATRESA, E.NOMETATRESA"
                . " FROM RESA R, VILLAGEOIS V, HEBERGEMENT H, ETAT_RESA E WHERE R.NOVILLAGEOIS = V.NOVILLAGEOIS "
                . "AND R.NOHEB = H.NOHEB AND R.CODEETATRESA = E.CODEETATRESA "
                . "AND V.NOVILLAGEOIS = " . $_SESSION['noVil'];
        $res = mysqli_query($con, $req);
        $ligne = mysqli_fetch_array($res);

        for ($i = 0; $i < count($ligne) / 2; $i++) {
            echo"
            <tr>
                <td>" . $ligne['NOMHEB'] . "</td>
                <td>" . $ligne['PRIXRESA'] . "€</td>
                <td>" . $ligne['MONTANTARRHES'] . "€</td>
                <td>" . $ligne['DATEDEBSEM'] . "</td>
                <td>" . $ligne['DATEARRHES'] . "</td>
                <td>" . $ligne['NOMETATRESA'] . "</td>
                <td>";

            /* if ($ligne['NOMETATRESA'] == "quelquechose") faire un switch, selon 
              l'étape, écrire l'étape suivante */

            switch ($ligne['CODEETATRESA']) {
                case "at":
                    $suivant = " Payer arrhes";
                    break;
                case "ap":
                    $suivant = "Payer le reste";
                    break;
                case "pa":
                    $suivant = "Location terminée";
                    break;
            }

            if (isset($suivant)) {
                if ($ligne['CODEETATRESA'] != "te" && $ligne['CODEETATRESA'] != 'pa') {
                    echo"<form action='paiement.php?heb=" . $ligne['NOHEB'] . "&dt=" . $ligne['DATEDEBSEM'] . "&etape=" . $ligne['CODEETATRESA'] . "' method='post'>
                    <input type='submit' name='btpayer' value='"/* ici le nom du bouton avec l'étape suivante */ . $suivant . "' />";
                }
            }

            echo "</td>
            </tr>
            </tr>
            ";
            $ligne = mysqli_fetch_array($res);
        }
        echo"</table>
        </div>
        </br>
        </br>";

        include'../design/footer.php';
        ?>
