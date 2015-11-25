

<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Gestion : réservations</title>
    <script src="jscss/fonctions.js"></script>
    <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">
</head>
<body>

    <?php
    if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

        header("Location:../index.php");
    }

    session_start();

    include '../bdd/sql.php';


    $req = "SELECT * FROM RESA, VILLAGEOIS, HEBERGEMENT, ETAT_RESA WHERE RESA.NOVILLAGEOIS = VILLAGEOIS.NOVILLAGEOIS AND RESA.NOHEB = HEBERGEMENT.NOHEB AND RESA.CODEETATRESA = ETAT_RESA.CODEETATRESA";
    $res = mysqli_query($con, $req);
    $ligne = mysqli_fetch_array($res);
    ?>


    <table border='1'>
        <tr>
            <td>Nom :</td>
            <td>Prénom :</td>
            <td>Hébergement :</td>
            <td>Dû :</td>
            <td>Arrhes :</td>
            <td>Date de début :</td>
            <td>Date de paiement des Arrhes :</td>
            <td>Date paiement :</td>
            <td>État de la réservation :</td>
            <td>Description :</td>
            <td>Action(s) :</td>
        </tr>
        <?php
        for ($i = 0; $i < count($ligne) / 2; $i++) {
            echo"
            <tr>
                <td>" . $ligne['NOMVILLAGEOIS'] . "</td>
                <td>" . $ligne['PRENOMVILLAGEOIS'] . "</td>
                <td>" . $ligne['NOMHEB'] . "</td>
                <td>" . $ligne['PRIXRESA'] . "€</td>
                <td>" . $ligne['MONTANTARRHES'] . "€</td>
                <td>" . $ligne['DATEDEBSEM'] . "</td>
                <td>" . $ligne['DATEARRHES'] . "</td>
                <td>" . $ligne['ORIENTATIONHEB'] . "</td>
                <td>" . $ligne['NOMETATRESA'] . "</td>
                <td>" . $ligne['DESCRIHEB'] . "</td>
                <td>";

            /* if ($ligne['NOMETATRESA'] == "quelquechose") faire un switch, selon 
              l'étape, écrire l'étape suivante */

            switch ($ligne['CODEETATRESA']) {
                case "at":
                    $suivant = " Arrhes payés";
                    break;
                case "ap":
                    $suivant = "Location payée";
                    break;
                case "pa":
                    $suivant = "Location terminée";
                    break;
            }


            if (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == "ges") {
                if ($ligne['CODEETATRESA'] != "te" && isset($suivant)) {
                    echo"<form action='../bdd/modifresa.php?heb=" . $ligne['NOHEB'] . "&dt=" . $ligne['DATEDEBSEM'] . "&etape=" . $ligne['CODEETATRESA'] . "' method='post'>
                    <input type='submit' name='btModif' value='"/* ici le nom du bouton avec l'étape suivante */ . $suivant . "' />
                </form>";
                    echo"<form action='../bdd/supprresa.php?heb=" . $ligne['NOHEB'] . "&dt=" . $ligne['DATEDEBSEM'] . "' method='post'>
                    <input type='submit' name='btSuppr' value='Supprimer' />
                </form>";
                } else if ($ligne['CODEETATRESA'] == "te") {
                    echo "<td>Terminé</td>";
                }
            }
            echo "</td>
            </tr>
            </tr>
            ";
            $ligne = mysqli_fetch_array($res);
        }
        ?>
    </table>
</body>