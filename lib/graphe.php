<?php
include ("static/jpgraph-3.5.0b1/src/jpgraph.php");
include ("static/jpgraph-3.5.0b1/src/jpgraph_bar.php");

$tableaudate = array();
$tableaufcmoy = array();

		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='mysql2.000webhost.com';dbname='a9912771_sport', 'a9912771_admin', 'alexis30', $pdo_options);
		}
    
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
		$request = "SELECT Date, Fcmoy FROM effectu\351 WHERE User_Id =". $_SESSION['auth']['id'] ."";
		$reponse = mysql_query($request);
		
		while ($donnees = mysql_fetch_array($reponse-)){
			
			$tableaudate[] = $donnees['Date'];
			$tableaufcmoy[] = $donnees['Fcmoy'];
			
		}

		
		// Construction du conteneur
		// Spécification largeur et hauteur
		$graph = new Graph(400,250);

		// Réprésentation linéaire
		$graph->SetScale("textlin");
		
		// Ajouter une ombre au conteneur
		$graph->SetShadow();

		// Fixer les marges
		$graph->img->SetMargin(40,30,25,40);

		// Création du graphique histogramme
		$bplot = new BarPlot($tableaufcmoy);

		// Spécification des couleurs des barres
		$bplot->SetFillColor(array('red', 'green', 'blue'));
		// Une ombre pour chaque barre
		$bplot->SetShadow();

		// Afficher les valeurs pour chaque barre
		$bplot->value->Show();
		// Fixer l'aspect de la police
		$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
		// Modifier le rendu de chaque valeur
		$bplot->value->SetFormat('%d Fcmoy');

		// Ajouter les barres au conteneur
		$graph->Add($bplot);

		// Le titre
		$graph->title->Set("Graphique 'HISTOGRAMME' : ventes par années");
		$graph->title->SetFont(FF_FONT1,FS_BOLD);

		// Titre pour l'axe horizontal(axe x) et vertical (axe y)
		$graph->xaxis->title->Set("Date");
		$graph->yaxis->title->Set("Fcmoy");

		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

		// Légende pour l'axe horizontal
		$graph->xaxis->SetTickLabels($tableaudate);

		// Afficher le graphique
		$graph->Stroke("graph.png");
		echo "<img src='/graph.png' />";

?>
