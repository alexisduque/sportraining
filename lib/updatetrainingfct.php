
<?php
date_default_timezone_set('UTC');
session_start();
include("lib/conf.site");
include("lib/fonctions.php");


$_REQUEST['distance'] = preg_replace("#,#", '.', $_REQUEST['distance']);
$_REQUEST['comments'] = preg_replace("#'#", '.', $_REQUEST['comments']);
$requete2="UPDATE effectue SET Duree =".$_REQUEST['duree'].", Difficulte =".$_REQUEST['difficulte'].", Fcmoy=".$_REQUEST['fcmoy'].", Comments='".$_REQUEST['comments']."', distance=".$_REQUEST['distance']." WHERE effectue.id=".$_REQUEST['id']."" ;
//echo $requete2; 
mysql_query($requete2);	

echo "<script language='Javascript'>";
echo "<!--\n";
echo "alert ('Entrainement modifi\351 !');\n";
echo "location.href='/sportraining/calendrier/".date("Y/m/d")."';\n";
echo " -->\n";
echo "</script>\n";


?>


