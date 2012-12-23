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
	<div class="entry-title"><a href="#">Mes Statistiques</a></div>
	<p>
				

<div class="comments"></div>
		
</div>

<?php 
	link_to_css("style");
	link_to_js("corresp_mois_jour");
?>
<?php

	if (!isset($_POST['ordonnee']) && !isset($_POST['regroup']) && !isset($_POST['sport']) && !isset($_POST['annee']) && !isset($_POST['mois']) && !isset($_POST['jour']) && !isset($_POST['mois1']) && !isset($_POST['annee1'])) {
		$_POST['ordonnee'] ="Charge";
		$_POST['regroup']= "Semaine";
		$_POST['sport'] = "%";
		$_POST['annee'] = "2012";
		$_POST['mois'] = "10";
		$_POST['jour'] = "01";
		$_POST['mois1'] = "12";
		$_POST['annee1'] = "2012";
		$_POST['jour1'] = "31";
	$date_min = date("2012-10-01");
	$date_max = date("2013-12-31");
		$abscisse = 'Date';
	$ordonnee = $_POST['ordonnee'];
	$sport = $_POST['sport'];
	$regroup = $_POST['regroup'];
	}
?>

<form  method="post" id="form1" action="stats">



<p>
	<label>Sport : </label>
	<select name="sport" id="sport">
		<?php
		$request = "SELECT Sport FROM sport";
		$reponse = mysql_query($request);
		echo mysql_error();
		while ($donnees = mysql_fetch_assoc($reponse)){
			?>
			<option value="<?php echo $donnees['Sport']; ?>"><?php echo $donnees['Sport']; ?></option>
			<?php
		}
		?>
			<option value="%">Tous</option>
	</select>
</p>





		<p>
			<label>Min : </label>
			
			<label>Annee : </label>
			<select name="annee" id="annee" onchange="corresp_mois_jour(document.getElementById('mois').value,this.value)">
				
				<?php
				
				$req_MAX_MIN_date = "SELECT MAX(Date), MIN(Date) FROM effectue WHERE User_Id =". $_SESSION['auth']['id'] ."";
				$reponse = mysql_query($req_MAX_MIN_date);
		
				while ($donnees = mysql_fetch_assoc($reponse)){
					
					$min = strtotime($donnees['MIN(Date)']);
					$max = strtotime($donnees['MAX(Date)']);
					$y1 = date('Y',$min);
					$y2 = date('Y',$max);
					
					for ($i=$y1;$i<=$y2;$i++) {
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
                        
					}	
				} 
		
			?>	
	
			</select>

<label>Mois : </label>

	<select name="mois" id="mois" onchange="corresp_mois_jour(this.value,document.getElementById('annee').value)">
	
	<?php
	$months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
	for ($i=0;$i<=11;$i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $months[$i]; ?></option>
                        <?php
                        
    }	
?>

</select>

<label>Jour : </label>
<select name="jour" id="jour">
	
	<?php
	for ($i=1;$i<=31;$i++) {
		?>
		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php
	}
	?>

</select>
	<br>
	<br>
	<label>Max : </label>
	<label>Annee : </label>
	<select name="annee1" id="annee1" onchange="corresp_mois1_jour1(document.getElementById('mois1').value,this.value)">
		
			<?php

		$req_MAX_MIN_date = "SELECT MAX(Date), MIN(Date) FROM effectue WHERE User_Id =". $_SESSION['auth']['id'] ."";
		$reponse = mysql_query($req_MAX_MIN_date);
		while ($donnees = mysql_fetch_assoc($reponse)){
								
			$min = strtotime($donnees['MIN(Date)']);
			$max = strtotime($donnees['MAX(Date)']);
			$y1 = date('Y',$min);
			$y2 = date('Y',$max);
		
			for ($i=$y1;$i<=$y2;$i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        
                }	
		}
		
?>	
	
	
</select>
<label>Mois : </label>
	<select name="mois1" id="mois1" onchange="corresp_mois1_jour1(this.value,document.getElementById('annee1').value)">
		<?php
	$months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
	
	for ($i=0;$i<=11;$i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $months[$i]; ?></option>
                        <?php
                        
                }	
			
?>
	
	</select>
	
	<label>Jour : </label>
	<select name="jour1" id="jour1">
	<?php
		
		for ($i=1;$i<=31;$i++) {
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
			
		}
	?>

	</select>

</p>
<p>
	<label>Ordonnee : </label>
	<select name="ordonnee" id="ordonnee">
		<option value="Fcmoy">Fcmoy</option> 
		<option value="Difficulte">Difficulte</option>
		<option value="Duree">Duree</option>
		<option value="Distance">Distance</option>
		<option value="Charge">Charge</option>

	</select>
</p>

<p>
	<label>Regroupe par : </label>
	<select name="regroup" id="regroup">
		<option value="Jour">Jour</option> 
		<option value="Semaine">Semaine</option> 
		<option value="Mois">Mois</option>
		<option value="Annee">Annee</option>

	</select>
</p>



<p>
<input type="submit" name="envoi" id="envoi" value="Envoyer"  />
</p>
<?php
$months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
if (isset($_POST['annee']) && isset($_POST['annee1']) && isset($_POST['mois']) && isset($_POST['mois1']) && isset($_POST['jour']) && isset($_POST['jour1'])){
$a1= $_POST['annee'];
$a2= $_POST['annee1'];
$m1= $_POST['mois'] + 1;
$m2= $_POST['mois1'] + 1;
$j1= $_POST['jour'];
$j2= $_POST['jour1'];
$date_min = date("$a1-$m1-$j1");
$date_max = date("$a2-$m2-$j2");

if (strcmp($date_max, $date_min)<0) {
                
                ?>
                
                <script> 
                
                alert("Impossible: votre date minimum est superieur a votre date maximum");
                
                </script>
                
                <?php


	return 0;
}
}
?>

<?php
include ("static/jpgraph-3.5.0b1/src/jpgraph.php");
include ("static/jpgraph-3.5.0b1/src/jpgraph_bar.php");

$tableaudate = array();
$tableaufcmoy = array();
if(file_exists("/graph.png")){
unlink("/graph.png");
}


if (isset($_POST['ordonnee']) && isset($_POST['regroup']) && isset($_POST['sport']) && isset($_POST['annee']) && isset($_POST['mois']) && isset($_POST['jour']) && isset($_POST['mois1']) &&isset($_POST['annee1']) && isset($_POST['jour1']) && isset($date_max) && isset($date_min)){
	$abscisse = 'Date';
	$ordonnee = $_POST['ordonnee'];
	$sport = $_POST['sport'];
	$regroup = $_POST['regroup'];
	
		
		if ($regroup == 'Jour'){
		$request = "SELECT $abscisse, $ordonnee FROM effectue,seances WHERE effectue.User_Id =". $_SESSION['auth']['id'] ." AND effectue.Seance_Id = seances.id AND seances.Sport LIKE '$sport' AND effectue.Date>= '$date_min' and effectue.Date<='$date_max' ORDER BY Date ";
		}
		if ($regroup == 'Mois'){		
		$request = "SELECT extract(year_month FROM $abscisse) AS $abscisse, AVG($ordonnee) AS $ordonnee  FROM effectue,seances WHERE effectue.User_Id =". $_SESSION['auth']['id'] ." AND effectue.Seance_Id = seances.id AND seances.Sport LIKE '$sport' AND effectue.Date>= '$date_min' and effectue.Date<='$date_max' GROUP BY MONTH(Date), YEAR(Date) ";
		}
		if ($regroup == 'Annee'){
			$request = "SELECT YEAR($abscisse) AS $abscisse, AVG($ordonnee) AS $ordonnee  FROM effectue,seances WHERE effectue.User_Id =". $_SESSION['auth']['id'] ." AND effectue.Seance_Id = seances.id AND seances.Sport LIKE '$sport' AND effectue.Date>= '$date_min' and effectue.Date<='$date_max' GROUP BY YEAR(Date) ";
		}
		if ($regroup == 'Semaine'){
			$request = "SELECT ((YEAR($abscisse)*100) + WEEK($abscisse)) AS $abscisse, AVG($ordonnee) AS $ordonnee  FROM effectue,seances WHERE effectue.User_Id =". $_SESSION['auth']['id'] ." AND effectue.Seance_Id = seances.id AND seances.Sport LIKE '$sport' AND effectue.Date>= '$date_min' and effectue.Date<='$date_max' GROUP BY WEEK(DATE),YEAR(Date) ORDER BY ((YEAR($abscisse)*100) + WEEK($abscisse)) ";
		}
		
		
		$reponse = mysql_query($request);
		while ($donnees = mysql_fetch_assoc($reponse)){
					
			$tableauabscisse[] = $donnees[$abscisse];
			$tableauordonnee[] = $donnees[$ordonnee];
			
		}
		if(empty($tableauordonnee)){
			
			?>
                
                <script> 
                
                alert("Impossible: il n'y a aucune valeur entre ces deux dates");
                
                </script>
                
                <?php


			return 0;
		}



		
		// Construction du conteneur
		// Spécification largeur et hauteur
		$graph = new Graph(700,300);

		// Réprésentation linéaire
		$graph->SetScale("textlin");
		
		// Ajouter une ombre au conteneur
		$graph->SetShadow();

		// Fixer les marges
		$graph->img->SetMargin(40,30,25,40);

		// Création du graphique histogramme
		$bplot = new BarPlot($tableauordonnee);

		// Spécification des couleurs des barres
		$bplot->SetFillColor(array('red', 'green', 'blue'));
		// Une ombre pour chaque barre
		$bplot->SetShadow();

		// Afficher les valeurs pour chaque barre
		$bplot->value->Show();
		// Fixer l'aspect de la police
		$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
		// Modifier le rendu de chaque valeur
		$bplot->value->SetFormat('%d ');

		// Ajouter les barres au conteneur
		$graph->Add($bplot);

		// Le titre	
		$graph->title->Set("$ordonnee = f($abscisse)");
		$graph->title->SetFont(FF_FONT1,FS_BOLD);

		// Titre pour l'axe horizontal(axe x) et vertical (axe y)
		$graph->xaxis->title->Set("$abscisse");
		$graph->yaxis->title->Set("$ordonnee");

		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

		// Légende pour l'axe horizontal
		$graph->xaxis->SetTickLabels($tableauabscisse);

		// Afficher le graphique
		$graph->Stroke("graph.png");
		echo "<img src='/graph.png' />";
	}
	else{
		echo "la selection n'est pas encore effectue";
	}

?>

</form>

