<?php
$titre = "Inscrire un nouvel hébergement";
$arriere = "../";
include "../design/top.php";


include '../bdd/sql.php';
if (!isset($_SESSION['TYPECOMPTE']) || $_SESSION['TYPECOMPTE'] != "ges") {

    header("Location:../index.php");
}
?>
</br></br>
<div class='container' align='center'>  
    <form id="creer" method="post" action="../bdd/creaheb.php">
        <table class='tableau'>
            <tr>
                <td colspan='2' align='center'>
                    Création d'un hebergement
                </td>
            </tr>
            <tr>
                <td>Nom :</td>
                <td><input id="nomHeb" name="nomHeb" type="text"/> 25 caractères max.</td>
            </tr>

            <tr>
                <td>Type :</td>
                <td><select name="type">
                        <?php
                        //récupère les types d'hébergement dans la base de données
                        $req = "SELECT * 
                            FROM TYPE_HEB";
                        $res = mysqli_query($con, $req);
                        $ligne = mysqli_fetch_array($res);
                        for ($i = 0; $i < count($ligne); $i++) {
                            echo '<option>' . $ligne['NOMTYPEHEB'] . '</option>';
                            $ligne = mysqli_fetch_array($res);
                        }
                        ?>
                    </select></td>
            </tr>

            <tr>
                <td>Nombre de personnes max. :</td>
                <td>
                    <select name="nbplaces">
                        <?php
                        for ($i = 1; $i < 15; $i++) {
                            echo '<option>' . $i . '</option>';
                        }
                        ?>
                    </select>
                </td>   
            </tr>

            <tr>
                <td>Surface :</td>
                <td><input id="surface" name="surface" type="number"/> m²</td>
            </tr> 

            <tr>
                <td>Année :</td>
                <td><input id="annee" name="annee" type="number"/></td>
            </tr>

            <tr>
                <td>Internet :</td>
                <td>
                    <select name="internet">
                        <option>Oui</option>
                        <option>Non</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Secteur :</td>
                <td><input id="secteur" name="secteur" type="text"/></td>
            </tr>

            <tr>
                <td>Orientation :</td>
                <td>
                    <select name="orientation">
                        <option>Nord</option>
                        <option>Sud</option>
                        <option>Ouest</option>
                        <option>Est</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Etat :</td>
                <td><input id="etat" name="etat" type="text"/> 32 caractères max.</td>
            </tr>


            <tr>
                <td>tarif haute saison :</td>
                <td><input id="tarifhs" name="tarifhs" type="number"/></td>
            </tr>

            <tr>
                <td>tarif basse saison :</td>
                <td><input id="tarifbs" name="tarifbs" type="number"/></td>
            </tr>


            <tr>
                <td>Description :</td>
                <td><input id="description" name="description" type="text"/> 200 caractères max.</td>
            </tr>

            <tr>
                <td>Photo (url):</td>
                <td><input id="photo" name="photo" type="text"/></td>
            </tr>

            <tr colspan='2'>
                <td colspan='2' align='center'>
                    <input type="submit" value="créer" />
                </td>
            </tr>
        </table>
    </form>
</div>
</br>
</br>


<?php
include'../design/footer.php';
?>