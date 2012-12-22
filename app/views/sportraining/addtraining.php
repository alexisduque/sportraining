<?php

if(!isset($_SESSION['auth']))
{
echo "<script language='Javascript'>";
echo "<!--\n";
echo "alert ('Vous devez vous connecter !');\n";;
echo "location.href='/sportraining/connexion';\n";
echo "// -->\n";
echo "</script>\n";
}

include("lib/conf.site");


link_to_js("calendar");
echo '<style type="text/css" media="screen">';
link_to_css("calendar");
echo '</style>';


?>
<script src="/static/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="/static/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="/static/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="/static/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<div class='entry'>

	<br> <!--sauter une ligne-->
		<div class="entry-title">
		<a href="#">Nouvel entrainement</a>
		<br>
		<br>

		</div>
     <form id ="choix" method="post">
	  <label>
	    <input type="radio" name="new_existe" value="1" id="new_exist_0" onclick="submit(this)" <?php if (isset($_POST['new_existe']) && ($_POST['new_existe'] == 1)) echo 'checked="checked"'?> />
      Nouvelle seance</label>
	  <br />
	  <label>
	    <input name="new_existe" type="radio" id="new_exist_1" onclick="submit(this)" value="2" <?php if (!isset($_POST['new_existe']) || ($_POST['new_existe'] == 2)) echo 'checked="checked"'?> />
	    Seance existante</label>
	</p>
    </form>      
<?php

if ( (isset ($_POST['new_existe'])) && ($_POST['new_existe']== 1)) $new = 1 ;
else if ( (isset ($_POST['new_existe'])) && ($_POST['new_existe']==2)) $new = 2 ;
else $new=2 ;

if ($new == 2)
{
	include("lib/training.php");
}
else
{
	include("lib/training_tot.php");
}
?>
	
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("duree", "real", {validateOn:["change"]});
var z2 = new Spry.Widget.ValidationTextField("z2", "integer", {validateOn:["change"]});
var z1 = new Spry.Widget.ValidationTextField("z1", "integer", {validateOn:["change"]});
var z3 = new Spry.Widget.ValidationTextField("z3", "integer", {validateOn:["change"]});
var z4 = new Spry.Widget.ValidationTextField("z4", "integer", {validateOn:["change"]});
var z5 = new Spry.Widget.ValidationTextField("z5", "integer", {validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("comments");
var sprytextfield3 = new Spry.Widget.ValidationTextField("distance", "real", {validateOn:["change"], isRequired:false});

</script>
