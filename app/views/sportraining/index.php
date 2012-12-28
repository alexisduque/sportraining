		<div class="entry">
			<br>
			<div class="entry-title"><a href="#">R&eacute;sum&eacute;</a></div>
			<br>
			<p>
			Bienvenue sur Sportraining le site de suivi et de planification de votre entrainement
			<?php
	include("lib/conf.site");
    $reponse = mysql_query('SELECT Count(*) FROM user ');

  
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = mysql_fetch_array($reponse))
    {
        echo '<p><strong>' . htmlspecialchars($donnees[0]) . '</strong> personnes utilisent Sportraining. Rejoignez nous ! </p>';
    }
    

?>	

		<h2>Qu'est ce que Sportraining?</h2>
		<br>
		<h3> Avec Sportraining vous pourrez sauvegardez les donn&eacute;es de vos entrainements. Telles que : le sport, la distance, la dur&eacute;e et le contenu de votre s&eacute;ance d'entrainement.<br />
          <br />
  </h3>
		<p><img src="/static/images/entrainement_resume.png"></p>
  <h3> Le calendrier vous permet d'avoir une vue d'ensemble de votre entrainement<br />
    <br />
</h3>
		<img src="/static/images/calendrier_resume.png"><br />
		<br />
		<h3> Gr&acirc;ce &agrave; la partie Statistiques, vous pouvez analysez vos donn&eacute;es, jour par jour,semaine par semaine, mois par mois et m&ecirc;me d'une ann&eacute;e sur l'autre<br />
          <br />
  </h3>
		<img src="/static/images/graphique_resume.png">
<div class="comments"></div>
		
		</div>
	


