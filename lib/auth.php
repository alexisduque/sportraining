

<?PHP

session_start();
// Fichier auth.php

include("lib/conf.site");
include("lib/fonctions.php");

// On intialise la connexion à la base de données


if(isset($_REQUEST['login']) && isset($_REQUEST['password']))
{

$requete = "SELECT * FROM user WHERE `user`='".$_REQUEST['login']."' AND
`password`='".sha1($_REQUEST['password'])."'";

if(sql($requete, $bdd))
{
// Nous avons bien le bon utilisateur
// Nous créons la variable de session
$_SESSION['auth']['etat']="AUTH : OK";
$requete = "SELECT prenom, id FROM user WHERE `user`='".$_REQUEST['login']."' AND `password`='".sha1($_REQUEST['password'])."'";
$req = mysql_query($requete);

$_SESSION['auth']= mysql_fetch_array($req);
echo "Vous êtes authentifié";
header("Location: /sportraining/moncompte");

} else
{
	
$_SESSION['error']="Erreur de connexion";
echo " Nous n'avons pas les bonnes informations" 	;
// Nous n'avons pas les bonnes informations
// On renvoi vers la page d'authentification
header("Location: /sportraining/connexion");

}
}

 else
 
{
// Formulaire incomplet
//echo " Formulaire incomplet";
header("Location: /sportraining/connexion");
}
?>
