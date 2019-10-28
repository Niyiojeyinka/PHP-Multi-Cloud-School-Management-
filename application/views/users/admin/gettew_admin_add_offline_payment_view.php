<div class="w3-container w3-center">


  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Add Offline Payment</span><br>
  <hr>
  <?= isset($_SESSION['action_status_report'])?$_SESSION['action_status_report']:'' ?>

<div class="">
  <?= form_open('gettew_Dashboard/add_offline_payment') ?>

<span class="w3-label">Student ID</span><br>
<input type="text" name="student_id" placeholder="Student ID" class="w3-padding w3-margin"/><br>


<span class="w3-label">Amount Paid</span><br>
<input type="text" name="amount" placeholder="Amount Paid" class="w3-padding w3-margin"/><br>

<!-----session settings--->
<!---\
THERE IS OPTION TO WHEATHER 
TO USE CURRENT SESSION OR CHOOSE SESSION

	SELECT TERM AND SESSION HERE
	---><br>

<span class="w3-label">Session and Term:</span><br>

<input onClick="hideIt()" type="radio" name="det" class="w3-radio" value="current" /> Use Current Session & Term<br>


<input  onClick="showIt()" type="radio" name="det" class="w3-radio" value="set" /> Set Session & Term

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
<!---session settings end -->

<span class="w3-text-red">NOTE</span> <span>Please note that unlike online payment ,offline payment is not withdrawable.Adding Offline Payment is just for recording Purpose Only </span>
    <br>
    <input type="submit" name="submit" value="Add Offline Payment" class="w3-button w3-margin w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>
</form>
</div>

</div>
