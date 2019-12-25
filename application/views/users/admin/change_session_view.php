<div class="w3-container w3-center">
<hr>
  <span class="w3-text-theme w3-xlarge w3-center">Change Session</span><br>
  <hr>
<?php
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];
}

?><br>
<span class="w3-text-red"><?=validation_errors()?></span><br>
<span class="w3-tiny">Need help? check our <a class="w3-text-theme" href="<?= site_url('docs/admin/change_session') ?>">documentation</a></span><br>
<br>
<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>
<?= form_open("dashboard/change_session") ?>

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

<br>
<input type="submit" class="w3-button w3-theme w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" name="submit" ="" value="Change Session" />


</form>




	</div>

