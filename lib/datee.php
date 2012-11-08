<?php

class Datee{
	
	var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
	var $months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
	
	function getAllDay($year,$month){
		$r = array();
		$date = new DateTime($year.'-'.$month.'-01');
		while ($date->format('m') == $month){
			$y = $date->format('Y');
			$m = $date->format('n');
			$d = $date->format('j'); 
			$w = $date->format('N');
			$r [$y][$m][$d] = $w;
			$date->modify("+1 day");
		}
		return $r;
	}

}

?>
