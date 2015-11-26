<?php
$titre = "Acceuil gestionnaire";
$arriere = "../";
include "../design/top.php";


if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
?>
</br></br>
<div class='container' align='center'>  
                <ul class="actions">
                    <li><a href="creerheb.php" class="button">Enregistrer un nouvel hébergement</a></li>
                    </br>
                    <li><a href="../hebergements.php" class="button">Consulter / Modifier les hébergements</a></li>
                    </br>
                    <li><a href="etatreservations.php" class="button">Consulter / Modifier les réservations</a></li>
                    </br>
                </ul>

</div></br></br>

<?php
include'../design/footer.php';
?>