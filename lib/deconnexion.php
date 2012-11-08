<?php
session_start();
//deconnexion
unset ($_SESSION['auth']);

echo "<script language='Javascript'>";
echo "<!--\n";
echo "alert ('Vous \352tes d\351sormais deconnect\351');\n";;
echo "location.href='/sportraining/index';\n";
echo "// -->\n";
echo "</script>\n";

?>
	
