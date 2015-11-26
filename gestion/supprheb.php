<?php
$titre = "supprimer un hébergement";
$arriere = "../";
include "../design/top.php";


include '../bdd/sql.php';
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
$heb = $_GET['heb'];


$req = "SELECT RESA.DATEDEBSEM, RESA.NOHEB FROM RESA, HEBERGEMENT WHERE HEBERGEMENT.NOHEB = RESA.NOHEB AND HEBERGEMENT.NOMHEB = '" . $heb . "'";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

$date = date("Y-m-d");
$resa = 0;
for ($i = 0; $i < count($ligne); $i++) {
    if ($ligne['DATEDEBSEM'] >= $date) {
        $resa++;
    }
    $ligne = mysqli_fetch_array($res);
}
?>
</br></br>
<div class='container' align='center'>  
    <TABLE class='tableau'>
        <tr>
            <td>
                <?php
                if ($resa > 0) {
                    echo"Il existe des réservations en cours ou à venir pour cet hébergement, vous ne pouvez donc pas le supprimer.";
                } else {
                    $req2 = "DELETE FROM HEBERGEMENT WHERE NOMHEB = '" . $heb . "'";
                    $res2 = mysqli_query($con, $req2);
                    $req3 = "DELETE FROM RESERVATION WHERE NOHEB = " . $ligne['NOHEB'];
                    $res3 = mysqli_query($con, $req3);
                    echo "L'hébergment et toute les réservations enregistrées ont été supprimées";
                }
                ?>
            </td>
        </tr>
    </table>
</div>
</br></br>


<?php
include'../design/footer.php';
?>
