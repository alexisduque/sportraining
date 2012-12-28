<html>
    <head>
         <link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css">
    </head>
    <body>

<?php
session_start();
//deconnexion
unset ($_SESSION['auth']);

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>';

echo '<script src="/static/bootstrap/js/bootstrap.min.js"></script>';


echo '<script src="/static/bootbox.min.js"></script>';

echo '<script type="text/javascript">';


//echo "<!--\n";
//echo "alert ('Vous \352tes d\351sormais deconnect\351');\n";
//
//echo "// -->\n";


echo '$(document).ready(function(e){';

echo 'bootbox.alert("Vous \352tes d\351sormais deconnect\351 !", function(e){location.href="/sportraining/index";});';

echo '});';
echo "</script>\n";

?>
    </body>
</html>
	
