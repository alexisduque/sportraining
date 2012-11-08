<script src="/static/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="/static/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="/static/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="/static/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="/static/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="/static/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
		<div class="entry">
			<br>
			<div class="entry-title">
			  <a href="#">Nouvel Utilisateur</a>
			  <br><br />
			</div>
	

			<form name="formulaire" action="adduserfct" method="post">

              <p>Nom  : <br>
                <span id="sprytextfield1">
                <input type="text" name="nom" />
                <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br>
                Prenom : <br>
                <span id="prenom">
                <input type="text" name="prenom"
/>
                <span class="textfieldRequiredMsg">Une valeur est requise.</span></span><br />
  Age : <br />
  <span id="age">
  <input type="text" name="age"
/>
  <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
FcMax : <br />
<span id="sprytextfield3">
<input type="text" name="fcmax"
/>
<span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
Identifiant : <br />
<span id="identifiantr">
<input type="text" name="user"
/>
<span class="textfieldRequiredMsg">Une valeur est requise.</span></span><br />
Mot de passe : <br />
<span id="password">
<input type="password" name="password" id="password"
/>
<span class="passwordRequiredMsg">Une valeur est requise.</span></span><br />
Verification : <br />
<span id="confirm">
<input type="password" name="password2"
/>
<span class="confirmRequiredMsg">Une valeur est requise.</span><span class="confirmInvalidMsg">Les valeurs ne correspondent pas.</span></span><br />
                <br />
                <input type="submit" value="Valider" />
              </p>
</form>
<div class="comments"></div>
		
		</div>
	
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("age", "integer", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("identifiantr", "none", {validateOn:["change"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("password", {validateOn:["change"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("confirm", "password", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("prenom");
</script>
