

<?php 
$titre = "Connexion";
$arriere = "";
include "design/top.php";?>
            
            <div id="featured">
                    <div class="container">
                    <table align="center">
                        <form id="formulaire" method="post" action="bdd/connexion.php"> 
                            <tr>
                                <td>
                                    Nom d'utilisateur : 
                                </td>
                                <td>
                                    <input id="nomUtilisateur" name="nomUtilisateur" type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mot de passe : 
                                </td>
                                <td>
                                    <input id ="motDePasse" name="motDePasse" type="password"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="button" value="Connexion" />
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>

<?php include 'design/footer.php'?>
