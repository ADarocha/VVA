<?php

session_start();
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
include 'sql.php';



switch ($_GET['etape']) {
    case "at":
        $coderesa = "ap";
        break;
    case "ap":
        $coderesa = "pa";
        break;
    case "pa":
        $coderesa = "te";
        break;
}

//On modifie l'etat de la réservation.
$req = "UPDATE RESA SET CODEETATRESA = '" . $coderesa . "' WHERE NOHEB = " . $_GET['heb'] . " AND DATEDEBSEM = '" . $_GET['dt'] . "'";
$res = mysqli_query($con, $req);



header('Location: ../gestion/etatreservations.php');
?>