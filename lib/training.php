
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
      <input type="text" readonly name="date"  <?php if (isset($date_url_sql))echo 'value="'.$date_url_sql->format('Y/m/d').'"' ; else echo "value=\"".date("Y/m/d")."	\" onClick=\"displayCalendar(this,'yyyy/mm/dd', this)\" ";?>/>
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
<table width ="100%">
	
	<tr>
		<td width="50%">
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
      </td>
		<td valign="top" 		align="center">
      <table>
      <tr>
	 <td align="center">
       <p>Z1<br />
     <span id="z1">
    <input type="z1" size="3px" name="z1" id="z1" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      <td align="center">
       <p>Z2<br />
     <span id="z2">
    <input type="text" size="3px" name="z2" id="z2" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      </tr>
      <tr>
		 <td align="center">
       <p>Z3<br />
     <span id="z3">
    <input type="text" size="3px" name="z3" id="z3" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
     <td align="center">
       <p>Z4<br />
     <span id="z4">
    <input type="text" size="3px" name="z4" id="z4" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />

      </td>
      </tr>
      <tr>
		  <td align="center">
       <p>Z5<br />
     <span id="z5">
    <input type="text" size="3px" name="z5" id="z5" value ="0" onChange="maj(this.value)"/>
<span class="textfieldInvalidFormatMsg">Format non valide.</span></span><br />
      </td>
      <td align="center">
		   <p>Charge<br />
    <input type="text" size="3px" name="charge" id="charge" readonly="readonly"/>
	</td>
	</tr>
	</td>
	</tr>
	</table>
</table>

   <?php if (isset($id)) echo '<input type="submit" value="Valider" />'; ?>
    </p>
</form>	
<div class="comments"></div>
		</div>

<script type="text/javascript">
	function maj(value) {	
		if (isNaN(parseFloat(value)) == false) { 
			var charge = document.add.z1.value *1.25 +document.add.z2.value*2+document.add.z3.value*3+document.add.z4.value*4.5+document.add.z5.value*7;
		} else var charge = 0;
		
		document.add.charge.value=charge;
		
	}
	maj();	
</script> 
