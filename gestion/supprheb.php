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
    <title>Resa_VVA - suppression de " . $heb . " </title>
    <script src='../jscss/fonctions.js'></script>
    <link rel=STYLESHEET href='../jscss/style.css' type='text/css'>
</head>";

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