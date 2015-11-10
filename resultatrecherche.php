<head>
        <meta charset="UTF-8">
        <title>Résultat de la recherche</title>
        <script src="jscss/fonctions.js"></script>
        <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">

</head>


<?php

session_start(); //démarrage session
// on vérifie que le login et le mot de passe existent dans la bdd
include 'controles/sql.php'; //connexion à la bdd
$req = " SELECT * 
    FROM hebergement
    WHERE NOMHEB <> 'PISTACHE AUX NOISETTES' "; //requete pour récuperer login + mdp

if ($_POST['nbplaces'] != "indifferent") {
    $req = $req." AND NBPLACEHEB <= " . $_POST['nbplaces'] . "";
}
if ($_POST['orientation'] != "indifferent") {
    $req = $req." AND ORIENTATIONHEB = '" . $_POST['orientation'] . "'";
}
if ($_POST['internet'] != "indifferent") {
    if ($_POST['internet'] == "Oui")
    {$req = $req." AND INTERNET = 1";}
    else
    {$req = $req." AND INTERNET = 0";}
}

$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

if (mysqli_num_rows($res) == 0) {
    echo "Aucun résultat.";
}
else
{
    
}
?>

<table>
    
    <tr>
        <td>Nom :</td>
        <td>Photos :</td>
        <td>Places :</td>
        <td>Surface :</td>
        <td>Internet :</td>
        <td>Etat :</td>
        <td>Année construction :</td>
        <td>Orientation :</td>
        <td>Description :</td>
    </tr>
    
    
    
    
</table>
