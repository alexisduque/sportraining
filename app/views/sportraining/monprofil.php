 <?
session_start();
if(!isset($_SESSION['auth']))
{
header("Location: /sportraining/connexion");
}

?>		<div class="entry">
			<br>
			<div class="entry-title"><a href="#">R&eacute;sum&eacute;</a></div>
			<p>
			<?php
// Connexion à la base de données

    
 $requete = "SELECT Nom,Prenom FROM user WHERE `user`='".$_SESSION["sportraining"]["login"]."'";

 sql($requete)

?>
<div class="comments"></div>
		
		</div>
	
