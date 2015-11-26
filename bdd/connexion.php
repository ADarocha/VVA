<?php

session_start(); //démarrage session
// on vérifie que le login et le mot de passe existent dans la bdd
include 'sql.php'; //connexion à la bdd
$req = "SELECT USER, TYPECOMPTE
			FROM compte
			WHERE USER ='" . $_POST['nomUtilisateur'] . "'
			AND MDP ='" . $_POST['motDePasse'] . "'"; //requete pour récuperer login + mdp
$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

//si ils n'existent pas, on redirige vers index.php avec une erreur
if (mysqli_num_rows($res) == 0) {
    header('Location: ../index.php?page="erreur"');
} else {//sinon on va sur notre page
    if ($ligne['TYPECOMPTE'] == "ges") {
        $_SESSION['LOGIN'] = $ligne['USER'];
        $_SESSION['TYPECOMPTE'] = $ligne['TYPECOMPTE'];
        header('Location: ../gestion/');        
        
    } elseif ($ligne['TYPECOMPTE'] == "vil") {
        $_SESSION['LOGIN'] = $ligne['USER'];
        $_SESSION['TYPECOMPTE'] = $ligne['TYPECOMPTE'];
        //requete pour récupérer le numéro du villageois
        $req2 = "SELECT NOVILLAGEOIS
			FROM villageois
                        WHERE USER ='" . $_POST['nomUtilisateur'] . "'";
        $res2 = mysqli_query($con, $req2);
        $ligne2 = mysqli_fetch_array($res2);
        // numéro du villageois en variable de session
        $_SESSION['noVil'] = $ligne2['NOVILLAGEOIS'];
        header('Location: ../villageois/');
        
    } elseif ($ligne['TYPECOMPTE'] == "adm") {
        $_SESSION['LOGIN'] = $ligne['USER'];
        $_SESSION['TYPECOMPTE'] = $ligne['TYPECOMPTE'];
        header('Location: ../admin/');
    }
}

mysqli_close($con);
?>