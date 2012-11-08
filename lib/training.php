
<b>Choix de la seance</b><br />
<br />

<form method="POST" id="seance" onsubmit="$sub=true">    
<p>

<?php 
    
	$rep_sport = mysql_query('SELECT Sport FROM sport');
	if (isset ($_POST['sport'])) $sport = $_POST['sport'] ;
	else $sport = "Course";
	if (isset ($_POST['type'])) $filiere = $_POST['type'] ;
	else $filiere = "Recuperation";

	echo '<select name="sport" size="1" id="sport" onChange="submit(form)">' ; 

 	while ($sports = mysql_fetch_assoc($rep_sport))
    {

    	if (isset($_POST['sport']) && ($_POST['sport'] == $sports['Sport'])) $selected = 'selected'; else  $selected = '';
    	echo'<option value="'.$sports['Sport'].'"; '.$selected.'>'.$sports['Sport'].'</option>';     

    }    
    echo'</select>';
	    
	$rep_type = mysql_query('SELECT Filiere, id FROM type');
	echo'<select name="type" size="1" id="type" onChange="submit(form)">';    
    while ($type = mysql_fetch_assoc($rep_type))
    {
 		if (isset($_POST['type']) && ($_POST['type'] == $type['Filiere'])) $selected = 'selected'; else  $selected = '';
   		 echo'<option value="'. $type['Filiere'].'"; '.$selected.'>'. $type['Filiere'].'</option>';     

    }    
    echo'</select>';
	
	$rep_contenu = mysql_query('SELECT Contenu FROM seances JOIN type WHERE seances.Sport=\''.$sport.'\' AND type.Filiere =\''.$filiere.'\' AND seances.Type = type.id') ;
	echo'<select name="contenu" size="1" id="contenu">';     
	echo'<option value=""  selected></option>'; 
    while ($contenu = mysql_fetch_assoc($rep_contenu))
    {
		if (isset($_POST['contenu']) && ($_POST['contenu'] == $contenu['Contenu'])) $selected = 'selected'; else  $selected = '';
   		echo'<option value="'. $contenu['Contenu'].'"; '.$selected.'>'. $contenu['Contenu'].'</option>';     
    }    
    echo'</select>';
	
?>

<input type="submit" name="ok" id="ok" value="Valider" />

</form>

<form id="add" action="/sportraining/addtrainingfct" method="post" >
<p>
    <input name="id_seance" type="text" value = "<?php if (isset($_POST['contenu'])) { $requete3= 'SELECT id FROM seances WHERE Contenu = "' .$_POST['contenu']. '"'; $result = mysql_fetch_array(mysql_query($requete3)); $id = $result['id']; echo $id;} ?>" size="3" maxlength="2" readonly="readonly"'"/>
      
    <br />
      
      <br>Date : (format: aaaa-mm-jj) <br />
      <input type="text" readonly name="date"  <?php if (isset($date_url_sql))echo 'value="'.$date_url_sql->format('Y/m/d').'"' ; else echo "value=\"2012/06/01\" onClick=\"displayCalendar(this,'yyyy/mm/dd', this)\" ";?>/>
      <br />
  <br />
      Duree : <br />
      <span id="duree">
      <input type="text" name="duree"/>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
  <br />
      Difficulte : <br />
      <label for="difficulte"></label>
      <select name="difficulte" id="difficulte">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      <br />
  <br />
      Fcmoy : <br />
      <span id="fcmoy">
      <input type="text" name="fcmoy"/>
      <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
  <br />
      Comments : <br />
      <span id="comments">
      <textarea name="comments"></textarea>
  <span class="textareaRequiredMsg">Une valeur est requise.</span></span></p>
  <p>Distance :<br />
<span id="distance">
    <input type="text" name="distance" id="distance"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
      <br />
    <?php if (isset($id)) echo '<input type="submit" value="Valider" />'; ?>
  </p>
    </p>
</form>
<div class="comments"></div>
		</div>
