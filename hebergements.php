<?php
$titre = "VVA - Acceuil";
$arriere = "";
include "design/top.php";
        include 'bdd/sql.php';


        $req = "SELECT * FROM HEBERGEMENT, TARIF, TYPE_HEB WHERE HEBERGEMENT.NOHEB = TARIF.NOHEB AND HEBERGEMENT.CODETYPEHEB = TYPE_HEB.CODETYPEHEB AND TARIF.CODESAISON = 1";
        $res = mysqli_query($con, $req);
        $ligne = mysqli_fetch_array($res);


        for ($i = 0; $i < count($ligne) / 2; $i++) {
            echo"</br>
                <div class='container' align='center'>        
                <table border='1' class='tableau'>
            <tr>
                <td>Nom :</td>
                <td>" . $ligne['NOMHEB'] . "</td>
                <td>Photo :</td>
            </tr>
            <tr> 
                <td>Type :</td>
                <td>" . $ligne['NOMTYPEHEB'] . "</td>
                <td rowspan='12'><img src='" . $ligne['PHOTOHEB'] . "' style='width:400px;height:300px;'></td>
            </tr>
            <tr>
                <td>Habitants maximum :</td>
                <td>" . $ligne['NBPLACEHEB'] . "</td>
            </tr>
            <tr>
                <td>Surface :</td>
                <td>" . $ligne['SURFACEHEB'] . " m²</td>
            </tr>
            <tr>
                <td>Année de construction :</td>
                <td>" . $ligne['ANNEEHEB'] . "</td>
            </tr>
            <tr>
                <td>Internet :</td>
                <td>";

            if ($ligne['INTERNET'] == 1) {
                $internet = "Oui";
            } else {
                $internet = "Non";
            }

            echo $internet . "</td>
            </tr>
            <tr>
                <td>Secteur :</td>
                <td>" . $ligne['SECTEURHEB'] . "</td>
            </tr>
            <tr> 
                <td>Orientation :</td>
                <td>" . $ligne['ORIENTATIONHEB'] . "</td>
            </tr>
            <tr>
                <td>État :</td>
                <td>" . $ligne['ETATHEB'] . "</td>
            </tr>
            <tr>
                <td>Description :</td>
                <td>" . $ligne['DESCRIHEB'] . "</td>
            </tr>
            <tr>
                <td>Tarifs :</td>
                <td style='width:250px'>Haute saison : " . $ligne['PRIXHEB'] . "€
                    </br>Basse saison :";

            $req2 = "SELECT * FROM HEBERGEMENT, TARIF, TYPE_HEB WHERE HEBERGEMENT.NOHEB = TARIF.NOHEB AND HEBERGEMENT.CODETYPEHEB = TYPE_HEB.CODETYPEHEB AND TARIF.CODESAISON = 2 AND HEBERGEMENT.NOHEB = " . $ligne['NOHEB'];
            $res2 = mysqli_query($con, $req2);
            $ligne2 = mysqli_fetch_array($res2);


            echo"" . $ligne2['PRIXHEB'] . "€</td>
            </tr>
            <tr>
            <tr>
                <td>Action(s) :</td>
                <td>";

            if (isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == "ges") {
                echo"<form action='gestion/modifheb.php?heb=" . $ligne['NOMHEB'] . "' method='post'>
                    <input type='submit' name='btModif' value='Modifier' />
                    </form>";
                echo"<form action='gestion/supprheb.php?heb=" . $ligne['NOMHEB'] . "' method='post'>
                    <input type='submit' name='btSupprimer' value='Supprimer' />
                    </form>";
            }
            else if(isset($_SESSION['TYPECOMPTE']) && $_SESSION['TYPECOMPTE'] == "vil")
            {
                echo"<form action='villageois/reservation.php?heb=" . $ligne['NOMHEB'] . "' method='post'>
                    <input type='submit' name='btModif' value='Réserver' />
                    </form>";
            }

            echo "</td>
            </tr>
            </tr>
            </table>
            </div>";
            $ligne = mysqli_fetch_array($res);
            echo"</br>";
        }

        
        include'design/footer.php';?>