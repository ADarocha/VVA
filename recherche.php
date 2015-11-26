<?php
$titre = "Connexion";
$arriere = "";
include "design/top.php";
?>

<div id="featured">
    <div class="container"  align="center">
        <form id="recherche" method="post" action="resultatrecherche.php">
            <table>
                <tr>
                    <td colspan='2'>Recherche :</td>
                </tr>
                <tr>
                    <td>Places max. :</td>
                    <td>
                        <select name="nbplaces">
                            <option>indifferent</option>
                            <?php
                            for ($i = 1; $i < 15; $i++) {
                                echo '<option>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </td>   
                </tr>
                <tr>
                    <td>Orientation :</td>
                    <td>
                        <select name="orientation">
                            <option>indifferent</option>
                            <option>Nord</option>
                            <option>Sud</option>
                            <option>Ouest</option>
                            <option>Est</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Internet :</td>
                    <td>
                        <select name="internet">
                            <option>indifferent</option>
                            <option>Oui</option>
                            <option>Non</option>
                        </select>
                    </td>
                </tr>
                <tr colspan='2'>
                    <td>
                        <input type="submit" value="Rechercher" />
                    </td>
                </tr>
            </table>
        </form>
    </div></div>

<?php include 'design/footer.php' ?>