<?php
session_start();
//deconnexion
unset ($_SESSION['auth']);

echo "<script language='Javascript'>";
//echo "bootstrap_alert = function() {}bootstrap_alert.warning = function(message) { $(\"#alert_placeholder').html('<div class=\"alert\"><a class=\"close\" data-dismiss=\"alert\">×</a><span>'+message+'</span></div>')}$('#clickme').on('click', function() {  bootstrap_alert.warning('Your text goes here');});"

echo "<!--\n";
echo "alert ('Vous \352tes d\351sormais deconnect\351');\n";;
echo "location.href='/sportraining/index';\n";
echo "// -->\n";
echo "</script>\n";

?>
	
