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



<form id="add" action="/sportraining/addtrainingfct" method="post">  

    <p>Contenu : <br />
      <span id="sprytextarea1">
      <textarea name="contenu"><?php echo htmlspecialchars($_SESSION['training']['Contenu']);?></textarea>
      <span class="textareaRequiredMsg">Une valeur est requise.</span></span><br />

		Date : (format: aaaa-mm-jj) <br />
		      <input type="text" readonly name="date"  <?php if (isset($date_url_sql))echo 'value="'.$date_url_sql->format('Y/m/d').'"' ; else echo "value=\"2012/06/01\" onClick=\"displayCalendar(this,'yyyy/mm/dd', this)\" ";?>/>
		<br />
<br />
		Duree : <br />
    <span id="duree">
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
    <span id="fcmoy">
    <input type="text" name="fcmoy"/>
    <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
<br />
		Comments : <br />
		<span id="comments">
		<textarea name="comments"></textarea>
	<span class="textareaRequiredMsg">Une valeur est requise.</span></span></p>
    <p>Distance :<br />
     <span id="distance">
    <input type="text" name="distance" id="distance"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
      <br />
      <input type="submit" value="Valider" />
    </p>
</form>
<div class="comments"></div>
		</div>



	
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("duree", "real", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("fcmoy", "integer", {validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("comments");
var sprytextfield3 = new Spry.Widget.ValidationTextField("distance", "real", {validateOn:["change"], isRequired:false});

</script>
