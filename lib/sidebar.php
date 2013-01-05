<?php
include("lib/conf.site");
include("lib/fonctions.php");
$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
$dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
?>

<?php 		$reponse = mysql_query('SELECT user.user , SUM(effectue.Distance) AS maxdisttot FROM `effectue` INNER JOIN user WHERE effectue.User_Id = user.id GROUP BY User_Id ORDER BY MAX(Distance) DESC'); ?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
		
		<ul>
			<center><li>Nous sommes le <?php echo $dateDuJour?><br></li></center>
			<li><?php echo ('L\'utilisateur qui a realise le plus de distance est '.htmlspecialchars($donnees['user']). ' avec ' .htmlspecialchars($donnees['maxdisttot']).' kilometres') ; ?></li>

<?php 		
			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Distance) AS maxdistmonth FROM `effectue` INNER JOIN user WHERE effectue.User_Id = user.id AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Distance) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?> 
			<li><?php echo ('L\'utilisateur qui a realise le plus de distance ce mois-ci est '.htmlspecialchars($donnees['user']). ' avec ' .htmlspecialchars($donnees['maxdistmonth']).' kilometres') ;?></li>			
<?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureenatation FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Natation" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
		<li><?php echo ('Le nageur du mois est '.htmlspecialchars($donnees['user']). ' qui a pass� ' .htmlspecialchars($donnees['maxdureenatation']).' minutes dans l\'eau') ;?></li>
<?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureecyclisme FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Cyclisme" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
			<li><?php echo ('Notre champion cycliste du mois de '.date('F').' est '.htmlspecialchars($donnees['user']). ' qui a pass� ' .htmlspecialchars($donnees['maxdureecyclisme']).' minutes sur sa selle, il doit avoir sacr�ment mal au cul!') ;?></li>
<?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureecourse FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Course" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
			<li><?php echo (htmlspecialchars($donnees['user']). ' est celui qui a us� le plus ces chaussures en '.date('F').' avec ' .htmlspecialchars($donnees['maxdureecourse']).' minutes de course � pied') ;?></li>
				

		</ul>
