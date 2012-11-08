	
		<div class="entry">
			<br>
			<div class="entry-title"><a href="#">Veuillez vous identifier</a></div>
			<p>
            </p>
            
<form action="auth">
<table border="0" width="70%">
<tr>
<td>Nom d'utilisateur : </td>
<td><input type="text" name="login"/></td>
</tr>
<tr>
<td>Mot de passe : </td>
<td><input type="password" name="password"
/></td>
</tr>
</table>
<br>
<input type="submit" value="Valider" />
</form>
<br>
<div class="error">
<?php

if (isset ($_SESSION['error']) )
	{
		echo " Erreur de connexion " ;
		unset ($_SESSION['error']);	
	}
?>
</div>	
<div class="comments"></div>
</div>

