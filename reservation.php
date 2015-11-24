<head>
    <meta charset="UTF-8">
</head>



<?php
session_start(); //démarrage session
// on vérifie que le login et le mot de passe existent dans la bdd
include 'modele/sql.php';
$req = "SELECT NOMHEB, (SELECT count(*) FROM HEBERGEMENT) as nb
                FROM hebergement"; //recupère le nom des hébergements
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);
?>



<body>
    <TABLE>
        <FORM id="formulaire" method="post" action="verifresa.php" onsubmit="return VerificationChamps()"> 
            <tr>
                <td>
                    Hébergement :
                </td>
                <td>
                    <select name="hebergement">
                        <?php
                        for ($i = 0; $i < $ligne['nb']; $i++) { //pour chaque ligne de résultat
                            echo '<option>' . $ligne['NOMHEB'] . '</option>'; //le nom de l'hebergement dans la liste
                            $ligne = mysqli_fetch_array($res); //on passe à la ligne suivante
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <?php
            $req2 = "SELECT DATEDEBSEM, DATEFINSEM, (SELECT count(*) FROM SEMAINE) as nb
                FROM semaine"; //recupère le nom des hébergements
            $res2 = mysqli_query($con, $req2);
            $ligne2 = mysqli_fetch_array($res2);
            $nb = $ligne2['nb'];
            $date = date("Y-m-d");
                    ?>

            <tr>
                <td>
                    Semaine :
                </td>
                <td>               
                    <select name="semaine">
                        <?php
                        for ($i = 0; $i < $nb; $i++) { //pour chaque ligne de résultat
                            if($ligne2['DATEDEBSEM'] > $date){
                            echo '<option>' . $ligne2['DATEDEBSEM'] . ' au ' . $ligne2['DATEFINSEM'] . '</option>'; //le nom de l'hebergement dans la liste
                            }
                            $ligne2 = mysqli_fetch_array($res2); //on passe à la ligne suivante
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr colspan="2" class="centrer">
                <td>
                    <input type="submit" value="Vérifier la réservation" />
                </td>
            </tr>
        </FORM>
    </TABLE>


    <?php
    //si ?erreur= dans le lien, on affiche une erreura
    if (isset($_GET['erreur'])) {
        if ($_GET['erreur'] == 'nondispo') {
            echo"<font color='red'>Malheuresement, cet hébergement n'est pas disponibles à la date demandée</font>";
        }
    }
    ?>

</body>