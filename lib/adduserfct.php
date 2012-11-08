<?php
session_start();
include("lib/conf.site");
include("lib/fonctions.php");



// On récupère ce que l'utilisateur à saisi, si il n'a rien saisi (login ou mot de passe) on le renvoi sur la page de
//création de compte

if(isset($_REQUEST['user']) && isset($_REQUEST['password']))
{
$test_id="SELECT id FROM user WHERE `user`='".$_REQUEST['user']."'";
$test_nom="SELECT id FROM user WHERE `nom`='".$_REQUEST['nom']."' AND `Prenom`='".$_REQUEST['prenom']."'";
$requete="INSERT INTO user VALUES ('', '".$_REQUEST['nom']."', '".$_REQUEST['prenom']."', ".$_REQUEST['age'].", ".$_REQUEST['fcmax'].", '".sha1($_REQUEST['password'])."', '".$_REQUEST['user']."')";

if(sql($test_id))
{
	echo "<script language='Javascript'>";
	echo "alert ('Votre Login est d\351ja utilis\351 !');\n";
	echo "location.href='/sportraining/adduser';\n";
	echo "</script>\n";	
}

else if(sql($test_nom))
{
	echo "<script language='Javascript'>";
	echo "alert ('Vous avez d\351ja un compte !');\n";
	echo "location.href='/sportraining/index';\n";
	echo "</script>\n";
}

else 

{

// On exécute la requete grace à la fonction sql présente dans le fichier fonctions.php

mysql_query($requete);


echo "<script language='Javascript'>";
echo "<!--\n";
echo "alert ('Vous \352tes d\351sormais enregistr\351, connectez vous !');\n";
echo "location.href='/sportraining/index';\n";
echo "// -->\n";
echo "</script>\n";

} 
} else echo "erreur";



?>


