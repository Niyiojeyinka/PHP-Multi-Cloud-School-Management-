<?php
if ($this->uri->segment(1) =="staff") {
  $action_slug = "staff/result_manager";
}else{
   $action_slug = "gettew_resultmanager/index";

}


?><div class="w3-container w3-center">
<b class="w3-xlarge w3-text-theme w3-margin">Upload Result</b><br><br>
<?= form_open_multipart($action_slug) 
?>
<div class="w3-large">
	<?=isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:"" ?>
</div>

<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>

<div class="">
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span>


</div>
<div><br><br>
<span class="w3-text-theme">Subject</span><br>
<select name="subject" class="w3-padding">
	<option disabled selected>Choose Subject</option>
<?php
foreach($added_subjects as $subject) {
	?>
<option value="<?=$subject['title'] ?>"><?=$subject['title'] ?></option>

	<?php
}
?>
</select><br>
<!---\
THERE IS OPTION TO WHEATHER 
TO USE CURRENT SESSION OR CHOOSE SESSION

	SELECT TERM AND SESSION HERE
	---><br>

<span class="w3-label">Session and Term:</span><br>

<input onClick="hideIt()" type="radio" name="result_det" class="w3-radio" value="current" /> Use Current Session & Term<br>


<input  onClick="showIt()" type="radio" name="result_det" class="w3-radio" value="set" /> Set Session & Term

<br>
<div id="divi" style="display: none;">
	
<select class="w3-padding w3-margin" name="session">
	<option disabled selected>Choose Session</option>
<?php 
for ($i=1997; $i< 2060 ; $i++) { 
?>
<option value="<?= $i.' / '.($i+1)?>"><?=$i ?> / <?=$i+1 ?></option>

<?php
}



?>

	
</select>

<select class="w3-padding w3-margin" name="term">
	<option disabled selected>Choose term/division</option>
<?php 
if (!empty($schl_sec_div)) {

foreach ($schl_sec_div as $term) {
	?>
<option value="<?=$term ?>"><?=$term ?></option>


	<?php


	}
	
}else{
	echo "No terms set Please set this <a class='w3-text-theme' href='".site_url('gettew_dashboard/school_settings')."'>Here</a>";
}


?>


	
</select>

</div>
<script type="text/javascript">
function showIt(){
		document.querySelector("#divi").style.display ="block";
}
function hideIt(){
		document.querySelector("#divi").style.display ="none";
}
</script>

<br>
<span class="w3-text-theme">Result File</span>
<br>
<input type="file" name="result_file" class="w3-padding"/><br>
<input type="submit" name="submit" value="Upload Result" class="w3-btn w3-theme  w3-border w3-border-teal w3-hover-white w3-hover-text-theme w3-margin"/>
<br>
<span>
Download Result Upload Example /Template below<br>
<span class="w3-text-red"><b>NOTE</b></span>: Please do not delete the first row and Please delete the second row i.e data in row two</span><br>
<a class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin w3-hover-large" href="<?=base_url("assets/media/students_result_example.csv")  ?>">Download Now</a>
</form>


</div>