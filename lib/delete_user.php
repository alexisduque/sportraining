<?php

session_start();

include("lib/conf.site");
include("lib/fonctions.php");


if (isset($_SESSION['auth']))
{

$requete = "DELETE FROM effectu\351 WHERE effectu\351.User_Id = ".$_SESSION['auth']['id']."; DELETE FROM user WHERE user.id = ".$_SESSION['auth']['id']."";

mysql_query($requete);

unset($_SESSION['auth']);
 
echo "<script language='Javascript'>";	
echo "<!--\n";
echo "alert ('Compte supprim\351');\n";;
echo "location.href='/sportraining/index';\n";
echo "// -->\n";
echo "</script>\n";

}

else echo 'error' ;

?>
