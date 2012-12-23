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

<script type="text/javascript">
	function maj2(value) {	
		if (isNaN(parseFloat(value)) == false) { 
			var charge = document.update.z1.value *1.25 +document.update.z2.value*2+document.update.z3.value*3+document.update.z4.value*4.5+document.update.z5.value*7;
		} else var charge = 0;
		
		document.update.charge.value=charge;
		
	}
	maj2();	
</script> 

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



<form id="update" action="/sportraining/updatetrainingfct" method="post">  
<table width="100%">
	<tr>
	<td>
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
      </td>
      <td>
            <table>
      <tr>
	 <td align="center">
       <p>Z1<br />
     <span id="z12">
    <input type="z1" size="3px" name="z1" id="z1" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      <td align="center">
       <p>Z2<br />
     <span id="z22">
    <input type="text" size="3px" name="z2" id="z2" value ="0" onChange="maj2(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      </tr>
      <tr>
		 <td align="center">
       <p>Z3<br />
     <span id="z32">
    <input type="text" size="3px" name="z3" id="z3" value ="0" onChange="maj2(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
     <td align="center">
       <p>Z4<br />
     <span id="z42">
    <input type="text" size="3px" name="z4" id="z4" value ="0" onChange="maj2(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      </tr>
      <tr>
		  <td align="center">
       <p>Z5<br />
     <span id="z52">
    <input type="text" size="3px" name="z5" id="z5" value ="0" onChange="maj2(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
      </td>
      <td align="center">
		   <p>Charge<br />
    <input type="text" size="3px" name="charge" id="charge" readonly="readonly"/>
	</td>
	</tr>
	</td>
	</tr>
	</table>
      
      </TD>
      </tr>
      </table>	
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
var z22 = new Spry.Widget.ValidationTextField("z22", "integer", {validateOn:["change"]});
var z12 = new Spry.Widget.ValidationTextField("z12", "integer", {validateOn:["change"]});
var z32 = new Spry.Widget.ValidationTextField("z32", "integer", {validateOn:["change"]});
var z42 = new Spry.Widget.ValidationTextField("z42", "integer", {validateOn:["change"]});
var z52 = new Spry.Widget.ValidationTextField("z52", "integer", {validateOn:["change"]});
</script>

