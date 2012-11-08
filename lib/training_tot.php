<form id="add" action="/sportraining/addtrainingfct" method="post">  

 <?php     
$rep_sport = mysql_query('SELECT Sport FROM sport');
echo'<select name="sport" size="1" id="sport">';     
    while ($sport = mysql_fetch_array($rep_sport))
    {
    ?>     
    <option value="<?php echo $sport['Sport']; ?>"><?php echo $sport['Sport']; ?></option>     
    <p>
	  <?php
    }    
    echo'</select>';
?></p>
    <p>Type : <br />
      <?php     
$rep_type = mysql_query('SELECT Filiere FROM type');
echo'<select name="type" size="1" id="type">';     
    while ($type = mysql_fetch_array($rep_type))
    {
    ?>
      <option value="<?php echo $type['Filiere']; ?>"><?php echo $type['Filiere']; ?></option>
      <?php
    }    
    echo'</select>';
?>
    </p>
    <p>Contenu : <br />
      <span id="sprytextarea1">
      <textarea name="contenu"></textarea>
      <span class="textareaRequiredMsg">Une valeur est requise.</span></span><br />

		Date : (format: aaaa-mm-jj) <br />
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
      <input type="submit" value="Valider" />
    </p>
</form>
<div class="comments"></div>
		</div>
