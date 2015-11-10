//verifie que les champs sont remplis
function VerificationChamps()
{
    if(document.getElementById("formulaire").nomUtilisateur.value == "") //si la case nom d'utilisateur ou mdp sont vide, on préviens.
    {
        alert("Veuillez entrer un nom d'utilisateur.");
        return;
    }
    if(document.getElementById("formulaire").motDePasse.value == "")
    {
        alert("Veuillez entrer un mot de passe.");
        return;
    }
}
