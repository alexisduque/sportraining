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
		<a href="#">Modifier entrainement</a>
		<br>
		<br>
		
		</div>



<form id="add" action="/sportraining/updatetrainingfct" method="post">  

		Duree : <br />
    <span id="duree2">
    <input type="text" name="duree"/>
    <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
<br />
		Difficulte : <br />
		<label for="difficulte"></label>
		<select name="difficulte" id="difficulte">
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		  <option>5</option>
		  <option>6</option>
		  <option>7</option>
		  <option>8</option>
		  <option>9</option>
		  <option>10</option>
    </select>
		<br />
<br />
		Fcmoy : <br />
    <span id="fcmoy2">
    <input type="text" name="fcmoy"/>
    <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
<br />
		Comments : <br />
		<span id="comments2">
		<textarea name="comments"></textarea>
	<span class="textareaRequiredMsg">Une valeur est requise.</span></span></p>
    <p>Distance :<br />
     <span id="distance2">
    <input type="text" name="distance" id="distance"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
      <br />
      <input type="submit" value="Valider" />
    </p>
  <input type="hidden" name="id" value="<?php echo $SESSION['id']; ?>" />
</form>

<div class="comments"></div>
		</div>



	
<script type="text/javascript">
var sprytextfield12 = new Spry.Widget.ValidationTextField("duree2", "real", {validateOn:["change"]});
var sprytextfield22 = new Spry.Widget.ValidationTextField("fcmoy2", "integer", {validateOn:["change"]});
var sprytextarea12 = new Spry.Widget.ValidationTextarea("comments2");
var sprytextfield32 = new Spry.Widget.ValidationTextField("distance2", "real", {validateOn:["change"], isRequired:false});

</script>
