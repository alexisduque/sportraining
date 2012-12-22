<?php
/*
 * calendrier.php
 * 
 * Copyright 2012 ClÃ©ment <Clément@CLÉMENT-PC>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>

<?php
	include("lib/conf.site");
?>
<!-- Lien au fichier CSS spécifique du calendrier -->

<style type="text/css" media="screen">
	<?php link_to_css("calendrier");
	?>
</style>



<!-- Vérification qu'une session existe et que l'utilisateur est connecté -->

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

<!-- Connexion à la base de données-->

<?php
include("lib/conf.site");

?>

<script type="text/JavaScript" src="/static/javascript/jquery.js" ></script>
<script type="text/JavaScript">
	$(document).ready(function() {
		
		$('.entrainement').hide()
		<?php
		$_SESSION['nb']; 

		if (isset($_POST['sport']) || isset($_POST['new_existe']))
			echo " $('#entrainement".($_SESSION['nb']+2)."').show(); " ;
			else echo "$('.entrainement:first').show();"
		?>
		var current = 1;
		$('#detail a').click(function(){
			
			var entrainement = $(this).attr('id').replace('entrainementLink','');
			if (entrainement != current){
				$('#entrainement'+current).slideUp();
				$('#entrainement'+entrainement).slideDown();
				
				current = entrainement;
			}
			return false;
		});
	}); 
</script>






<div id="calendar">
	<?php 
	include ('lib/datee.php');

	$year = $params[0];
	$month = $params[1];
	$day = $params[2];
	$date = new Datee();
	$dates = $date->getAllDay($year,$month);
	$date_url_sql = new DateTime($year.'-'.$month.'-'.$day);
	?>

	<?php $dates = $dates[$year]; ?>
	<?php foreach($dates as $m=>$days): ?>
		<table>
			
			<caption style = "position = relative; margin-bottom = 30px;">
				<h3>
				<a href="/sportraining/calendrier/<?php if($month == 01){echo $year-1;}else{echo $year;} ?>/<?php if($month == 01){echo 12;}else{$date_url_sql->modify('-1 month');echo $date_url_sql->format('m');}  ?>/01"> <img src="/static/images/previousButton.png" style="position : relative; top : 9px; margin-right : 8px;" > </a>				
				<?php $mo = $date->months[$m-1];
				 echo ("$mo $year "); ?>
				<a href="/sportraining/calendrier/<?php if($month == 12){echo $year+1;}else{echo $year;} ?>/<?php if($month == 12){echo "01";}else{$date_url_sql->modify('+2 month'); echo $date_url_sql->format('m');}  ?>/01">  <img src="/static/images/nextButton.png" style="position : relative; top : 9px; margin-left : 8px;" > </a>
				</h3>
			</caption>
			
			<thead>
				<tr>
					<?php foreach($date->days as $d): ?>
						<th>
							<?php echo ("$d");?>
						</th>
					<?php endforeach ?>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<?php $end = end($days); foreach($days as $d=>$w): ?>
					
						<?php $date_url_sql->setDate($year,$m,$d);?>
						<?php $req = "SELECT Sport, Duree FROM effectue INNER JOIN seances ON effectue.Seance_Id = seances.Id WHERE Date LIKE  \"".$date_url_sql->format('Y-m-d')."\" AND User_id =" . $_SESSION['auth']['id']."";
				
				
						$request = mysql_query($req); ?>
						
						<?php if($d==1): ?>
							<td colspan="<?php echo $w-1; ?>"class="padding"></td>
						<?php endif; ?>
						
						<td <?php if($d==$day){echo "class=current";}?>>
						<?php $date_url_sql->setDate($year,$m,$d); ?>
						<a href ='/sportraining/calendrier/<?php echo $date_url_sql->format('Y/m/d'); ?>' ><div class="relative">
							<ul><?php   
							
							while (($request != FALSE) && ($donnees = mysql_fetch_assoc($request))){
								echo '<li>- '. htmlspecialchars($donnees['Sport']). ' ' .htmlspecialchars($donnees['Duree'].'\'') .'</li>' ;}
							?>
							</ul>
							<div class="daynumber"><?php echo ("$d"); ?></div>
							</div>
						</a>	
						</td>
						
						<?php if($w==7): ?>
							</tr><tr>
						<?php endif; ?>
					<?php endforeach ?>
					
					<?php if($end!=7): ?>
						<td colspan="<?php echo 7-$end; ?>" class="padding"></td>
					<?php endif; ?>
					
					
				</tr>
			</tbody>

		</table>
	<?php endforeach ?>
	</div>


<div id= "detail" >
	
	<?php $date_url_sql->setDate($year,$month,$day);
	$req = 'SELECT Date, Duree, Difficulte , FCmoy , Comments, Sport, Contenu, Filiere, Distance, z1, z2, z3, z4, z5, charge, effectue.id FROM effectue INNER JOIN seances ON effectue.Seance_Id = seances.Id INNER JOIN type ON type.Id = seances.Type WHERE Date LIKE  "'.$date_url_sql->format('Y-m-d').'" AND User_id =' . $_SESSION['auth']['id'].'';

		$_SESSION['nb'] = num($req);
		
		$compteur=1;
		$request = mysql_query($req);
		while (($request != FALSE) && ($donnees = mysql_fetch_assoc($request))){
		$_SESSION[$compteur]['training'] = $donnees;
		echo '<div  class="entrainement" id="entrainement'.$compteur.'" >'; 
		echo '<h2> Entrainement '.$compteur.' du '.$date_url_sql->format('l jS F Y').'</h2>';
		
	?>
		
		<table>
			<tr>
				<td>
					<script>document.write(current);</script>
					<h4><?php echo htmlspecialchars($donnees['Sport']);$SESSION['id'] = $donnees['id'] ; ?></h4>
					
				</td>	
				<td>
					<h4><?php echo htmlspecialchars($donnees['Filiere']);?></h4>
				</td>
			</tr>
			<tr>
				<td>
					<h5><?php echo htmlspecialchars($donnees['Contenu']);?></h5>
				</td>
                
			</tr>
			<tr>
				<td>
					<h4><?php echo htmlspecialchars($donnees['Duree']).' minutes';?></h4>
				</td>
				<td>
					 <h4> <?php echo htmlspecialchars($donnees['Distance']).' km';?></h4>
				</td>
			</tr>
			<tr>
				<td>
					 <h5>FC moy : <?php echo htmlspecialchars($donnees['FCmoy']);?></h5>
				</td>
				<td>
					 <h5>Diff : <?php echo htmlspecialchars($donnees['Difficulte']);?></h5>
				</td>
			</tr>
						<tr>
				<td>
					 <h4>Z1 : <?php echo htmlspecialchars($donnees['z1']);?></h4>
				</td>
				<td>
					 <h4>Z2 : <?php echo htmlspecialchars($donnees['z2']);?></h4>
				</td>
			</tr>
						<tr>
				<td>
					 <h4>Z3 : <?php echo htmlspecialchars($donnees['z3']);?></h4>
				</td>
				<td>
					 <h4>Z4 : <?php echo htmlspecialchars($donnees['z4']);?></h4>
				</td>
			</tr>
						<tr>
				<td>
					 <h4>Z5 : <?php echo htmlspecialchars($donnees['z5']);?></h4>
				</td>
				<td>
					 <h5>Charge : <?php echo htmlspecialchars($donnees['charge']);?></h5>
				</td>
			</tr>
			
			
			<tr>
				<td>
					<h5><?php echo htmlspecialchars($donnees['Comments']);?></h5>
				</td>
			</tr>
			<tr>
				<td>
					<?php 
					echo '<a id = "entrainementLink'.($_SESSION['nb']+3).'" ><img src="/static/images/calendar_edit.png" style="position : relative; top : 5px;" > Modifier l\'entrainement </a>';
					?>
				</td>
			</tr>
		</table>
		<?php
		if ($compteur!=1 and $compteur != $_SESSION['nb']+1) :
			echo '<a id = "entrainementLink'.($compteur-1).'" ><img src="/static/images/previousButton.png" style="position : relative; top : 9px; margin-right : 8px;" > Entrainement Précedent </a>';
			//	if ($compteur != 1 and $) : $_SESSION['i']=($compteur); endif;
			endif;
		if ($compteur != ($_SESSION['nb']) and ($_SESSION['nb']+1)) :
			echo '<a id = "entrainementLink'. ($compteur+1).'" style="position = relative; margin-left = 10px;"> Entrainement Suivant<img src="/static/images/nextButton.png" style="position : relative; top : 9px; margin-left : 8px;"></a>';
			$_SESSION['nbr']=$compteur;
			endif;
		
		echo '<br /><a id = "entrainementLink'.($_SESSION['nb']+2).'" ><img src="/static/images/add.png" style="position : relative; top : 5px;" > Ajouter un Nouvel Entrainement le '.$date_url_sql->format('l jS F Y').' </a>';
		
		echo '</div>';
		
		$compteur = $compteur + 1;
		}
		if ($_SESSION['nb'] == 0) :
			echo '<div class="entrainement" id="entrainement'.($_SESSION['nb']+1).'"><a id = "entrainementLink'.($_SESSION['nb']+2).'" ><img src="/static/images/addButton.png" style="position : relative; top : 5px;" > Ajouter un Nouvel Entrainement le '.$date_url_sql->format('l jS F Y').' </a></div>';
			endif;
			
		echo '<div  class="entrainement" id="entrainement'.($_SESSION['nb']+2).'" >';
		include ('app/views/sportraining/addtraining.php');
	?>
	</div>

		<?php 		
			echo '<div  class="entrainement" id="entrainement'.($_SESSION['nb']+3).'" >';
			
			include ('app/views/sportraining/updatetraining.php');
		?>
	</div>

</div>
