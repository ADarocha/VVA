<?php
include 'sql.php';
session_start();

//requete pour récupérer le numéro d'hébergment
$req = "SELECT NOHEB
        FROM hebergement
        WHERE NOMHEB = '".$_SESSION['hebergement']."'";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

//requete pour enregistrer une réservation
$req2 = "INSERT INTO resa (NOHEB, DATEDEBSEM, NOVILLAGEOIS, CODEETATRESA, DATERESA, DATEACCUSERECEPT, DATEARRHES, MONTANTARRHES, NBOCCUPANT, PRIXRESA)
        VALUES (".$ligne['NOHEB'].", '".$_SESSION['semaine']."', ".$_SESSION['noVil'].", 'ok', NULL, NULL, NULL, NULL, ".$_SESSION['nbPlaces'].", ".$_SESSION['tarif'].")";
$res2 = mysqli_query($con, $req2);


//redirection avec message de confirmation
header('Location: ../confirmresa.php?page=succes');