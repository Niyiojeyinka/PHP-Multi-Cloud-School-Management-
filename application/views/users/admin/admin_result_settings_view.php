<div class="w3-container w3-center"><br>
<hr>
<span class="w3-text-teal w3-xlarge">Result Settings</span>
<?= form_open_multipart('Dashboard/result_settings') ?>
<hr>
USE ACCESS CARD:Students will have to buy a card from the school to check their result.<br>
<select onclick="this.value=='paid'?document.getElementById('selling_price').style.display ='block':document.getElementById('selling_price').style.display ='none';" class="w3-padding w3-margin" name="access_type">
  <?php
  $paid_value="";
  $free_value = "";
if ($school['result_access'] == 'free') {
  $free_value ="selected";
}else{
  $paid_value = 'selected';
}

  ?>
  <option value='free'<?=$free_value ?>>FREE</option>
  <option value='paid'<?=$paid_value ?>>USE ACCESS CARD</option>
  
</select>
<br>
<div style="display: none;" id="selling_price">
<span class="w3-label">Selling Price(NGN)(in case of Online Payment )</span><br>

<input type="text" name="amount" class="w3-padding" value="<?=$school['result_access_price'] ?>" placeholder="Selling Price"><br></div>
<span class="w3-label">Position Setting</span><br>
Show Position On Result Of 

<br>
<div style="width:max-width:80%" class="w3-container w3-center">
  <table class="w3-table w3-striped w3-serif">
      <?php
  if(!empty($levels))
    {


echo "<b><tr>";
echo "<td>Choose</td>";
echo "<td>Level Name</td>";
echo "<td>Level Short Name</td>";

echo "</tr></b>";



    foreach($levels as $level)
    {
echo "<tr>";
?>
<td><input type="checkbox" name="level[]" class="w3-checkbox" value="<?=$level['level'] ?>"  <?=in_array($level['level'], json_decode($school['show_position'],true))? "checked" :""?>/></td>

<?php
//echo "<td>".$level['level']."</td>";
echo "<td>".$level['level_name']."</td>";
echo "<td>".$level['level_shortname']."</td>";

echo "</tr>";



    }
  echo "</table>";
}else{


  echo "No Level Records";
}

?>

  </table>
  

</div>
<input id="submitbtn" type="submit" class="w3-button w3-theme w3-margin w3-hover-white w3-hover-text-teal w3-border w3-border-teal" name="submit"
value="Save Settings"/><br><br>

</form>



</i></i></div>