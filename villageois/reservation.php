<?php
$titre = "Reservation";
$arriere = "../";
include "../design/top.php";

/* if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "vil") {

  header("Location:../index.php");
  } */


// on vérifie que le login et le mot de passe existent dans la bdd
include '../bdd/sql.php';
$req = "SELECT NOMHEB, (SELECT count(*) FROM HEBERGEMENT) as nb
                FROM hebergement"; //recupère le nom des hébergements
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);
?>
</br></br>
<div class='container' align='center'>  
    <table>
        <FORM id="formulaire" method="post" action="verifresa.php" onsubmit="return VerificationChamps()"> 
            <tr>
                <td>
                    Hébergement :
                </td>
                <td>
                    <select name="hebergement">
                        <?php
                        for ($i = 0; $i < $ligne['nb']; $i++) { //pour chaque ligne de résultat
                            if (isset($_GET['heb']) && $_GET['heb'] == $ligne['NOMHEB']) {
                                echo "<option selected>" . $ligne['NOMHEB'] . "</option>";
                            } else {
                                echo "<option>" . $ligne['NOMHEB'] . "</option>"; //le nom de l'hebergement dans la liste
                            }
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
                            if ($ligne2['DATEDEBSEM'] > $date) {
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
            <tr colspan="2">
                <td>
                    <?php
                    //si ?erreur= dans le lien, on affiche une erreura
                    if (isset($_GET['erreur'])) {
                        if ($_GET['erreur'] == 'nondispo') {
                            echo"<font color='red'>Malheuresement, cet hébergement n'est pas disponibles à la date demandée</font></br>";
                            echo"<a href='index.php'>Retour au menu client.</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr
    </FORM>
</table>
</div>
</br>
</br>


<?php
include '../design/footer.php';
?>