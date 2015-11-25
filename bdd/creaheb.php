<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Création d'hébergement</title>
</head>

<?php
session_start();
include 'sql.php';
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}

//récuperation du code type d'hébergement
$req = "SELECT CODETYPEHEB
    FROM TYPE_HEB
    WHERE NOMTYPEHEB = '" . $_POST['type'] . "'";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

if ($_POST['internet'] == "Oui") {
    $internet = 1;
} else {
    $internet = 0;
}


//Création de l'hebergement
$req2 = "INSERT INTO HEBERGEMENT(NOHEB, CODETYPEHEB,NOMHEB,NBPLACEHEB,SURFACEHEB,INTERNET,ANNEEHEB,SECTEURHEB,ORIENTATIONHEB,ETATHEB,DESCRIHEB,PHOTOHEB)
        VALUES(NULL,'" . $ligne['CODETYPEHEB'] . "','" . $_POST['nomHeb'] . "'," . $_POST['nbplaces'] . "," . $_POST['surface'] . "," . $internet . "," . $_POST['annee'] . ",'" . $_POST['secteur'] . "','" . $_POST['orientation'] . "','" . $_POST['etat'] . "','" . $_POST['description'] . "','" . $_POST['photo'] . "')";
$res2 = mysqli_query($con, $req2);

$req3 = "SELECT NOHEB FROM HEBERGEMENT WHERE NOMHEB = '" . $_POST['nomHeb'] . "'";
$res3 = mysqli_query($con, $req3);
$ligne3 = mysqli_fetch_array($res3);

$req4 = "INSERT INTO TARIF(NOHEB, CODESAISON, PRIXHEB)
        VALUES(" . $ligne3['NOHEB'] . ",'1'," . $_POST['tarifhs'] . "),(" . $ligne3['NOHEB'] . ",'2'," . $_POST['tarifbs'] . ")";
$res4 = mysqli_query($con, $req4);


if ($_POST['nomHeb'] == "" || $_POST['surface'] == 0 || $_POST['annee'] == 0 || $_POST['secteur'] == "" || $_POST['etat'] == "" || $_POST['description'] == "" || $_POST['photo'] == "" || $_POST['tarifbs'] == 0 || $_POST['tarifhs'] == 0) {
    echo"Vous n'avez pas renseigner tous les champs.</br>";
    echo"<a href='../gestion/creerhab.php'>Retourner au formulaire de création</a>";
} else {
    //lien vers affichage des résidence
    header('Location: ../hebergements.php');
}
?>
        


