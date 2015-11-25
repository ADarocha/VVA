<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Création d'hébergement</title>
</head>

<?php
session_start();
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "adm") {

    header("Location:../index.php");
}
include 'sql.php';



$req = "INSERT INTO COMPTE VALUES('" . $_POST['nomUtilisateur'] . "','" . $_POST['motDePasse'] . "','" . $_POST['nom'] . "',"
        . "'" . $_POST['prenom'] . "','" . date("Y-m-d") . "',NULL,'" . $_POST['typeUtilisateur'] . "')";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

if ($_POST['typeUtilisateur'] == "Villageois") {
    $req2 = "INSERT INTO `villageois`(USER, NOMVILLAGEOIS, PRENOMVILLAGEOIS, ADRMAIL, NOTEL, NOPORT)"
            . " VALUES ('" . $_POST['nomUtilisateur'] . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "',"
            . "'" . $_POST['mail'] . "','" . $_POST['telfixe'] . "','" . $_POST['telport'] . "')";
    $res2 = mysqli_query($con, $req2);
    $ligne2 = mysqli_fetch_array($res2);
}

echo "Compte crée avec succès. </br>";
?>
<a href='../admin/'>Retourner au menu d'administration.</a>




