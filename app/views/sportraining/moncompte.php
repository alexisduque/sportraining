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
?>

		<div class="entry">
			<br>
			<div class="entry-title"><a href="#">Mon compte</a></div>
			<p>
			<?php

    // Récupération des 10 derniers messages
    $reponse = mysql_query('SELECT Prenom, Nom, Age, Fcmax, User FROM user WHERE id =' . $_SESSION['auth']['id'] . '');
    
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = mysql_fetch_array($reponse))
    {
        echo '<p><strong> Prenom : ' . htmlspecialchars($donnees['Prenom']) . '<br> Nom :  '. htmlspecialchars($donnees['Nom']) . '<br> Age : '. htmlspecialchars($donnees['Age']) .'<br> Pseudo :  '. htmlspecialchars($donnees['User']) .'<br> FcMax : '. htmlspecialchars($donnees['Fcmax']) . '</strong> </p>';
    }
    

?>	
</div>
<div class="error">
<p><A HREF="/sportraining/delete_user" onclick="return(confirm('Voulez vous supprimer votre compte ?'));"> Supprimer le compte</A>

</div>
<div class="comments">
		
		</div>
	
