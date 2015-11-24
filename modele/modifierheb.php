<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Modification</title>
</head>

<?php
session_start();
include 'sql.php';


//récuperation du code type d'hébergement
$req = "SELECT CODETYPEHEB
    FROM TYPE_HEB
    WHERE NOMTYPEHEB = '" . $_POST['type']."'";
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

if ($_POST['internet'] == "oui") {
    $internet = 1;
} else {
    $internet = 0;
}

//Création de l'hebergement
$req2 = "UPDATE HEBERGEMENT SET CODETYPEHEB ='".$ligne['CODETYPEHEB']."',NOMHEB='".$_POST['nomHeb']."',NBPLACEHEB=".$_POST['nbplaces'].",SURFACEHEB=".$_POST['surface'].",INTERNET=".$internet.",ANNEEHEB=".$_POST['annee'].",SECTEURHEB='".$_POST['secteur']."',ORIENTATIONHEB='".$_POST['orientation']."',ETATHEB='".$_POST['etat']."',DESCRIHEB='".$_POST['description']."',PHOTOHEB='".$_POST['photo']."'
        WHERE NOMHEB = '".$_GET['heb']."'";
$res2 = mysqli_query($con, $req2);


//CONTINUER ICI A FAIRE DES UPDATES


$req3 = "SELECT NOHEB FROM HEBERGEMENT WHERE NOMHEB = '".$_POST['nomHeb']."'";
$res3 = mysqli_query($con, $req3);
$ligne3 = mysqli_fetch_array($res3);

$req4 = "UPDATE TARIF SET PRIXHEB = ".$_POST['tarifhs']." WHERE NOHEB = ".$ligne3['NOHEB']." AND CODESAISON = 1";
$res4 = mysqli_query($con, $req4);

$req5 = "UPDATE TARIF SET PRIXHEB = ".$_POST['tarifbs']." WHERE NOHEB = ".$ligne3['NOHEB']." AND CODESAISON = 2";
$res5 = mysqli_query($con, $req5);
        
        
if($_POST['nomHeb']==""|| $_POST['surface']== 0 || $_POST['annee'] == 0 || $_POST['secteur']=="" || $_POST['etat']==""|| $_POST['description']==""|| $_POST['photo']=="" || $_POST['tarifbs'] == 0 || $_POST['tarifhs']==0)
{
    echo"Vous n'avez pas renseigner tous les champs.</br>";
    echo"<a href='../gestion/modifheb.php?heb=".$_GET['heb']."'>Retourner à la modification</a>";
}
else
{
   //lien vers affichage des résidence
   header('Location: ../hebergements.php');
}
?>
        

        
        