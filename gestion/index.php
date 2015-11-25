

<head>
    <meta charset="UTF-8">
    <title>Resa_VVA - Menu de gestion</title>
    <script src="jscss/fonctions.js"></script>
    <LINK rel=STYLESHEET href="jscss/style.css" type="text/css">
</head>
<body>

    <?php
    session_start();
    if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

        header("Location:../index.php");
    }
    ?>

    <TABLE>
        <tr>
            <td>
                <a href='creerheb.php'>Créer un nouvel hébergement</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href='../hebergements.php'>Consulter / Modifier les hébergements</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href='etatreservations.php'>Consulter / Modifier les réservations</a>
            </td>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
    </TABLE>
</body>