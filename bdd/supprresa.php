<?php

session_start();
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
include 'sql.php';


//On modifie l'etat de la réservation.
$req = "DELETE FROM RESA WHERE NOHEB = " . $_GET['heb'] . " AND DATEDEBSEM = '" . $_GET['dt'] . "'";
$res = mysqli_query($con, $req);



header('Location: ../gestion/etatreservations.php');
?>