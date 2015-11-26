<?php

$titre = "Administration de VVA";
$arriere = "../";
include "../design/top.php";

        if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != 'adm') {
            header('Location: ../index.php');
        }
    ?>
    

</br></br>
<div class='container' align='center'>  
                <ul class="actions">
                    <li><a href="creercompte.php" class="button">Enregistrer un nouvel utilisateur</a></li>
                    </br>
                    <li><a href="voircomptes.php" class="button">Gérer les utilisateurs</a></li>
                    </br>
                </ul>

</div></br></br>

<?php
include'../design/footer.php';
?>
