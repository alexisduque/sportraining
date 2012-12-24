
<?php
date_default_timezone_set('UTC');
session_start();
include("lib/conf.site");
include("lib/fonctions.php");


if (isset($_REQUEST['id_seance']) == false) {
$get_type = "SELECT id From type WHERE Filiere = '".$_REQUEST['type']."'";
$type = mysql_query($get_type);
$filiere = mysql_fetch_assoc($type);
$_REQUEST['contenu'] = preg_replace("#'#", 'min', $_REQUEST['contenu']);	
$requete1="INSERT INTO seances VALUES ('','".$_REQUEST['sport']."','".$_REQUEST['contenu']."', ".$filiere ['id'].")";
mysql_query($requete1);
//echo $requete1;
$id = mysql_insert_id() ;
// echo $id;
} else {

$id = $_REQUEST['id_seance'] ;

}
$_REQUEST['distance'] = preg_replace("#,#", '.', $_REQUEST['distance']);
$_REQUEST['comments'] = preg_replace("#'#", '.', $_REQUEST['comments']);
$requete2="INSERT INTO effectue VALUES ('', ".$id.", '".$_REQUEST['date']."', ".$_SESSION['auth']['id'].", ".$_REQUEST['duree'].", ".$_REQUEST['difficulte']." , ".$_REQUEST['fcmoy'].", '".$_REQUEST['comments']."', ".$_REQUEST['distance'].", ".$_REQUEST['z1'].", ".$_REQUEST['z2'].", ".$_REQUEST['z3'].", ".$_REQUEST['z4'].", ".$_REQUEST['z5'].", ".$_REQUEST['charge'].")";
// echo $requete2;
mysql_query($requete2);	

echo "<script language='Javascript'>";
echo "<!--\n";
echo "alert ('Entrainement ajout\351 !');\n";
echo "location.href='/sportraining/calendrier/".date("Y/m/d")."';\n";
echo " -->\n";
echo "</script>\n";


?>


