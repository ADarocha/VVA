<?php
if (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'adm') { //si une session est crée et selon le type de compte
    header('Location: admin.php'); //redirection vers la page d'acceuil de ce type d'user
} elseif (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'vil') {
    header('Location: villageois/index.php');
} elseif (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == 'ges') {
    header('Location: gestion/gestion.php');
}
$titre = "VVA - Acceuil";
$arriere = "";
include "design/top.php";
?>


<div id="extra" class="container">
    <div class="title">
        <h2>Venez passer un bon moment dans les alpes !</h2>
        <span class="byline">Profitez de nos offres à prix réduit et passez vos vacances avec VVA.</span> </div>
    <div id="three-column">
        <div class="boxA">
            <div class="box"><img src='design/images/chalet.jpg' style='width:100px;height:100px;'>
                <p>Nous possèdons un large éventail de logements différents. Nous nous engagons à une qualité et un confort
                maximal pour chacun d'entre eux.</p>
            </div>
        </div>
        <div class="boxB">
            <div class="box"> <img src='design/images/euro.jpg' style='width:100px;height:100px;'>
                <p>Des prix accessibles, même en haute saison !</p>
            </div>
        </div>
        <div class="boxC">
            <div class="box"> <img src='design/images/ski.jpg' style='width:100px;height:100px;'>
                <p>Localisé dans les alpes, VVA est proche d'un grand nombre de centres d'intérêts.</p>
            </div>
        </div>
    </div>
    <ul class="actions">
        <li><a href="hebergements.php" class="button">Voir nos offres</a></li>
    </ul>
</div>



<?php include'design/footer.php'; ?>