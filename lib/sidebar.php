<?php
include("lib/conf.site");
include("lib/fonctions.php");
?>

<?php 		$reponse = mysql_query('SELECT user.user , SUM(effectue.Distance) AS maxdisttot FROM `effectue` INNER JOIN user WHERE effectue.User_Id = user.id GROUP BY User_Id ORDER BY MAX(Distance) DESC'); ?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
		
		<ul><p>
			<li>Nous sommes le <?php echo date('l jS F Y');?></li>
			<li><?php echo ('L\'utilisateur qui a r�alis� le plus de distance est '.htmlspecialchars($donnees['user']). ' avec ' .htmlspecialchars($donnees['maxdisttot']).' kilometres') ; ?></li>
			</p>
<p><br><?php 		
			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Distance) AS maxdistmonth FROM `effectue` INNER JOIN user WHERE effectue.User_Id = user.id AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Distance) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?> 
			<li><?php echo ('L\'utilisateur qui a r�alis� le plus de distance ce mois-�i est '.htmlspecialchars($donnees['user']). ' avec ' .htmlspecialchars($donnees['maxdistmonth']).' kilometres') ;?></li>			
</p><p><?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureenatation FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Natation" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
</p><p>	<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
		<li><?php echo ('Le nageur du mois est '.htmlspecialchars($donnees['user']). ' qui a pass� ' .htmlspecialchars($donnees['maxdureenatation']).' minutes dans l\'eau') ;?></li>
</p><p><?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureecyclisme FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Cyclisme" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
</p><p><?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
			<li><?php echo ('Notre champion cycliste du mois de '.date('F').' est '.htmlspecialchars($donnees['user']). ' qui a pass� ' .htmlspecialchars($donnees['maxdureecyclisme']).' minutes sur sa selle, il doit avoir sacr�ment mal au cul!') ;?></li>
</p><p>	<?php 		

			$reponse = mysql_query ('SELECT user.user , SUM(effectue.Duree) AS maxdureecourse FROM `effectue` JOIN user ON effectue.User_Id = user.id JOIN seances ON effectue.Seance_Id = seances.id AND seances.Sport LIKE "Course" AND MONTH(Date) LIKE '.date("m").' GROUP BY User_Id ORDER BY MAX(Duree) DESC');?>
<?php		if ($reponse != False) $donnees = mysql_fetch_array($reponse); ?>
			<li><?php echo (htmlspecialchars($donnees['user']). ' est celui qui a us� le plus ces chaussures en '.date('F').' avec ' .htmlspecialchars($donnees['maxdureecourse']).' minutes de course � pied') ;?></li>
		</p>				

		</ul>
