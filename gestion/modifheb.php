<?php
//création d'hébergement
session_start();
include '../bdd/sql.php';
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
$heb = $_GET['heb'];


echo"
<head>
    <meta charset='UTF-8'>
    <title>Resa_VVA - Modifier " . $heb . " </title>
    <script src='../jscss/fonctions.js'></script>
    <link rel=STYLESHEET href='../jscss/style.css' type='text/css'>
</head>";

$req = "SELECT * FROM HEBERGEMENT, TARIF, TYPE_HEB 
WHERE HEBERGEMENT.NOHEB = TARIF.NOHEB 
AND HEBERGEMENT.CODETYPEHEB = TYPE_HEB.CODETYPEHEB
AND HEBERGEMENT.NOMHEB = '" . $heb . "'
AND TARIF.CODESAISON = 1";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);
?>

<body>
    <form id="creer" method="post" action="../bdd/modifierheb.php?heb=<?php echo $heb; ?>">
        <table>
            <tr>
                <td colspan='2' align='center'>
                    modification de <?php echo $ligne['NOMHEB']; ?>
                </td>
            </tr>
            <tr>
                <td>Nom :</td>
                <td><input id="nomHeb" <?php echo "value='" . $ligne['NOMHEB'] . "'"; ?> name="nomHeb" type="text"/> 25 caractères max.</td>
            </tr>

            <tr>
                <td>Type :</td>
                <td><select name="type">
                        <?php
                        //récupère les types d'hébergement dans la base de données
                        $req2 = "SELECT * 
                            FROM TYPE_HEB";
                        $res2 = mysqli_query($con, $req2);
                        $ligne2 = mysqli_fetch_array($res2);
                        for ($i = 0; $i < count($ligne2); $i++) {
                            if ($ligne2['NOMTYPEHEB'] == $ligne ['NOMTYPEHEB']) {
                                echo '<option selected>' . $ligne2['NOMTYPEHEB'] . '</option>';
                                $ligne2 = mysqli_fetch_array($res2);
                            } else {
                                echo '<option>' . $ligne2['NOMTYPEHEB'] . '</option>';
                                $ligne2 = mysqli_fetch_array($res2);
                            }
                        }
                        ?>
                    </select></td>
            </tr>

            <tr>
                <td>Nombre de personnes max. :</td>
                <td>
                    <select name="nbplaces">
<?php
for ($i = 1; $i < 15; $i++) {
    if ($i == $ligne ['NBPLACEHEB']) {
        echo '<option selected>' . $i . '</option>';
    } else {
        echo '<option>' . $i . '</option>';
    }
}
?>
                    </select>
                </td>   
            </tr>

            <tr>
                <td>Surface :</td>
                <td><input id="surface" <?php echo "value='" . $ligne['SURFACEHEB'] . "'"; ?> name="surface" type="number"/> m²</td>
            </tr> 

            <tr>
                <td>Année :</td>
                <td><input id="annee" <?php echo "value='" . $ligne['ANNEEHEB'] . "'"; ?> name="annee" type="number"/></td>
            </tr>

            <tr>
                <td>Internet :</td>
                <td>
                    <select name="internet">
                        <option>Oui</option>
                        <option>Non</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Secteur :</td>
                <td><input id="secteur" <?php echo "value='" . $ligne['SECTEURHEB'] . "'"; ?> name="secteur" type="text"/></td>
            </tr>

            <tr>
                <td>Orientation :</td>
                <td>
                    <select name="orientation">
                        <option<?php //if ($ligne['ORIENTATIONHEB'] == "Nord"){echo "selected";}  ?>>Nord</option>
                        <option<?php //if ($ligne['ORIENTATIONHEB'] == "Sud"){echo "selected";}  ?>>Sud</option>
                        <option<?php //if ($ligne['ORIENTATIONHEB'] == "Ouest"){echo "selected";}  ?>>Ouest</option>
                        <option<?php //if ($ligne['ORIENTATIONHEB'] == "Est"){echo "selected";}  ?>>Est</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Etat :</td>
                <td><input id="etat" <?php echo "value='" . $ligne['ETATHEB'] . "'"; ?> name="etat" type="text"/> 32 caractères max.</td>
            </tr>


            <tr>
                <td>tarif haute saison :</td>
                <td><input id="tarifhs"<?php echo"value='" . $ligne['PRIXHEB'] . "'"; ?> name="tarifhs" type="number"/></td>
            </tr>

            <tr>
                <td>tarif basse saison :</td>
<?php
$req3 = "SELECT PRIXHEB FROM TARIF, HEBERGEMENT WHERE HEBERGEMENT.NOHEB = TARIF.NOHEB AND TARIF.CODESAISON = 2 AND HEBERGEMENT.NOHEB = " . $ligne['NOHEB'];
$res3 = mysqli_query($con, $req3);
$ligne3 = mysqli_fetch_array($res3);
?>
                <td><input id="tarifbs" <?php echo"value='" . $ligne3['PRIXHEB'] . "'"; ?> name="tarifbs" type="number"/></td>
            </tr>


            <tr>
                <td>Description :</td>
                <td><input id="description" <?php echo "value='" . $ligne['DESCRIHEB'] . "'"; ?> name="description" type="text"/> 200 caractères max.</td>
            </tr>

            <tr>
                <td>Photo (url):</td>
                <td><input id="photo" <?php echo "value='" . $ligne['PHOTOHEB'] . "'"; ?> name="photo" type="text"/></td>
            </tr>

            <tr colspan='2'>
                <td colspan='2' align='center'>
                    <input type="submit" value="Modifier" />
                </td>
            </tr>
        </table>
    </form>
</body>
