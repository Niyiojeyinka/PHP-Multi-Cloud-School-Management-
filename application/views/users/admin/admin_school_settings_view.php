<div class="w3-container w3-center">
<hr>
  <span class="w3-text-theme w3-xlarge w3-center">School Settings & Structure</span><br>
  <hr>
<?php
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];
}

?>
<span class="w3-tiny">Need help? check our <a class="w3-text-theme" href="<?= site_url('docs/admin/school_settings') ?>">documentation</a></span><br>

  <span class="w3-text-theme w3-medium w3-center">School Level System</span><br>
  <hr>
  <div class="w3-container w3-center">
  	<?= form_open("dashboard/set_level_details") ?>
<div class="w3-container w3-quarter">

<?php

echo "<span class='w3-label w3-small'>Education Level(Class)</span><BR><select class='w3-padding w3-border' name='level'>";
for ($i=1; $i < 21; $i++) { 
//print out forms 
	$arr = array(
'level' => $i,
'school_id'=> $school_id
	);
	if(empty($this->schools_model->get_level($arr))){
 echo "<option class='w3-dropdown' value='".$i."'>Education Level ".$i."</option>";

	}



}
echo "</select>";

?>
	</div>
<div class="w3-container w3-quarter">
<span class='w3-label w3-small'>Class Name</span><br>
<input type="text" name="class_name" class="w3-padding w3-border"/>
	</div>
	<div class="w3-container w3-quarter">
<span class='w3-label w3-small'>Class Short Name</span><br>
<input type="text" name="class_short_name" class="w3-padding w3-border"/>
	</div>
<br>
	<div class="w3-container w3-quarter">
		<input type="submit" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal" name="submit" ="" value="Add Class" />
</form>
	</div>

	</div>
<!--list levels-->
<a href="#division" class="w3-text-theme">Go Down <i class='fa fa-arrow-down'></i></a><br>
<div style="width:max-width:80%" class="w3-container w3-center">
	<table class="w3-table w3-striped w3-serif">
			<?php
	if(!empty($levels))
		{


echo "<b><tr>";
echo "<td>Level</td>";
echo "<td>Level Name</td>";
echo "<td>Level Short Name</td>";

echo "</tr></b>";



		foreach($levels as $level)
		{
echo "<tr>";
echo "<td>".$level['level']."</td>";
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


<hr>
  <span class="w3-text-theme w3-medium w3-center">School Period</span><br>
  <hr>


<?= form_open("dashboard/set_term_details") ?>

<div id="division" class="w3-container">
		
<span class="w3-text-theme w3-medium w3-center">No of Division that make a SESSION</span><br>
<?php

echo "<span class='w3-label w3-small'>Section Details</span><BR><select class='w3-padding w3-border' name='division' id='divi' onChange='show_box()'>";
for ($i=1; $i < 5; $i++) { 
//print out forms 

 echo "<option class='w3-dropdown' value='".$i."'> Division ".$i."</option>";

}
echo "</select>";

?>
	</div>
<br>
<div id="idiv">
<span class="w3-label w3-small">Section Division Name 1</span><br><input type="text" name="name_1" class="w3-padding"/><br>

	</div>
<script type="text/javascript">
	function show_box()
	{
	var hold= document.getElementById('divi').value;
	var idiv = document.getElementById('idiv');
idiv.innerHTML= null;
	for (var i =  1; i < Number(hold)+1; i++) {
//alert(hold);
    idiv.innerHTML += '<span class="w3-label w3-small">Section Division Name '+i+'</span><br><input type="text" name="name_'+i+'" class="w3-padding"/><br>';

	}
}
</script>

<input type="submit" name="submit" value="Add Division" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin"/><br>

	
</form>

<table class="w3-table w3-striped w3-serif">
			<?php
	if(!empty($schl_sec_div))
		{


echo "<b><tr>";
echo "<td>Division</td>";
echo "<td>Division Name</td>";

echo "</tr></b>";


$arr =array('First Division','Second Division','Third Division','Fourth Division',);
$i = 0;
		foreach($schl_sec_div
 as $divi)
		{
echo "<tr>";
echo "<td>".$arr[$i]."</td>";
echo "<td>".$divi."</td>";

echo "</tr>";
			$i++;



		}
	echo "</table>";
}else{


	echo "No Division Records";
}

?>

	</table>
	

	


<hr>
  <span class="w3-text-theme w3-medium w3-center">FEE Options</span><br>
<?= form_open("dashboard/set_fee_option")?>

<select name="fee_option" class="w3-padding">

	<?php
	$term ='';
	$sessional= '';
if ($school['fee_option'] == "term") {
	$term = "selected";
}else{
	$sessional = "selected";
}

	?>
	
   <option value="term" <?=$term ?>>Per Term/Division</option>
   <option value="sessional"  <?=$sessional ?>>SESSIONAL</option>
</select>
<input type="submit" name="submit" value="Save Fee Options" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin w3-small">
</form>



  <hr>
<br>
<div class="w3-center" id="options">
  <?= form_open("dashboard/set_student_option")?>
  <span class="w3-label">Student Options <br><span class="w3-tiny">Each separated by comma ',' e.g science,art</span></span><br>
  <input type="text" name="options" class="w3-padding" value="<?= empty($options) ? "Science,Art,Commercial":$options ?>" />
  	<br>
  	<input type="submit" name="submit" value="Save Options" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin">

  </form></div>
</div>