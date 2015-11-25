


<?php
include '../bdd/sql.php';

if (!isset($_GET['heb']) || !isset($_GET['dt']) || !isset($_GET['etape'])) {
    if ($_GET['etape'] == "ap" || $_GET['etape'] == "at") {
        
    } else {
        header('Location: index.php');
    }
}

if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "vil") {

    header("Location:../index.php");
}

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


<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Paiement réussi</title>
    <script src="jscss/fonctions.js"></script>
    <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">
</head>

<body>

    Paiement accepté ! 
    <a href='index.php'>revenir en arrière.</a>

</body>