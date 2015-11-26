<?php
$titre = "Paiement";
$arriere = "../";
include "../design/top.php";
include '../bdd/sql.php';

if (!isset($_GET['heb']) || !isset($_GET['dt']) || !isset($_GET['etape'])) {
    if ($_GET['etape'] == "ap" || $_GET['etape'] == "at") {
        
    } else {
        header('Location: index.php');
    }
}

/*if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "vil") {

    header("Location:../index.php");
}*/

switch ($_GET['etape']) {
    case "at":
        $suivant = "ap";
        break;
    case "ap":
        $suivant = "pa";
        break;
}


$req = "UPDATE resa SET CODEETATRESA = '" . $suivant . "' WHERE NOHEB = " . $_GET['heb'] . " AND DATEDEBSEM = '" . $_GET['dt'] . "' ";
$res = mysqli_query($con, $req);
?>

</br></br>
<div class='container' align='center'> 
    <table class='tableau'>
        <tr>
            <td>
                Paiement accepté ! 
            </td>
        </tr>
        <tr>
            <td>
                <a href='index.php'>revenir en arrière.</a>
            </td>
        </tr>
    </table>
</div>
</br>
</br>


<?php
include'../design/footer.php';
?>
