<div class="w3-container w3-center">
<hr>
  <span class="w3-text-theme w3-xlarge w3-center w3-serif">Change Term</span><br>
  <hr>
<?php
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];
}

?><br>
<span class="w3-text-red"><?=validation_errors()?></span><br>
<span class="w3-tiny">Need help? check our <a class="w3-text-theme" href="<?= site_url('docs/admin/change_term') ?>">documentation</a></span><br>
<br>
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
<?= form_open("gettew_dashboard/change_term") ?>

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

<br>
<input type="submit" class="w3-button w3-theme w3-hover-white w3-hover-text-theme w3-border w3-border-teal w3-margin" name="submit" ="" value="Change Term" />


</form>




	</div>

