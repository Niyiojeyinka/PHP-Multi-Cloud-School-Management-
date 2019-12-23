<div class="w3-container w3-center">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center">School Account Balances</span><br>
<hr>
<div class="w3-container w3-responsive w3-margin">
	<table class="w3-table w3-striped">
		<tr><td>Main Balance</td><td>Fee Balance</td><td>Pending Balance</td><td>Total Amount Processed</td></tr>
		<tr><td>NGN<?=$school['account_balance'] ?></td><td>NGN<?=$school['fee_balance'] ?></td><td>NGN<?=$school['pending_balance'] ?></td><td>NGN<?=$school['total_fee_processed'] ?></td></tr>
	</table>
<div class="w3-small w3-margin">Main Balance--amount you deposit on Gettew<br>
Fee Balance --amount you collected online through Gettew Payment Facility<br>
Pending Balance --Amount ready to be withdrawn but yet to be processed<br>
Total Amount Processed --Total Amount you've been able to withdrawn on Gettew
</div>	 

</div>
<hr>

	<!--chart here-->
  <div class="w3-container w3-row">
	<div class="w3-half">
<span class="w3-text-teal"><b>Payments Type Chart</b></span>
<!--- pie start here-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Volume'],
          ['Offline Payments',     <?=$count_offline_payments ?>],
          ['Online Payments',      <?=$count_online_payments ?>]
        
        ]);

        var options = {
          title: 'Payments Type Chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  <div id="piechart" style="width: 900px; height: 500px;"></div>
<!--pie ends here-->
</div>


<div class="w3-half">
<!--second half -->	
<span class="w3-text-teal w3-large">Recents Payments</span>

 
  <?php
if (!empty($payments)) {
  ?>
  <div class="w3-responsive">
  <table style="max-width: 60%;" class="w3-table w3-striped w3-center w3-margin w3-small">
<tr class="w3-text-teal"><td><b>Payer</b></td><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Amount(NGN)</b></td><td><b>Method</b></td><td><b>Date</b></td></tr>
<div class="">

  <?php
  foreach ($payments as $fee) {
    
echo "<tr><td><i class='w3-text-teal'><a href='".site_url('gettew_dashboard/student_details/'.$fee['student_id'])."'>".get_student_fullname($fee['student_id'])."</a></i></td><td>".$fee['session']."</td><td>".$fee['term']."</td><td>".$fee['amount']."</td><td>".$fee['method']."</td><td>".date('F,j Y,g:ia',$fee['time'])."</td></tr>";

  }

echo "
</table></div>";

echo $pagination;
//echo "<span class='w3-text-teal'>Outstanding FEE</span> = NGN".($payable_total_fee-$paid_total_fee);
?>
<?php

}else{
  echo "No Payment yet";
}

  ?>
  




</div>
</div>
<div>
	<span class="w3-text-theme w3-medium w3-center">Confirm Payment</span><hr>
  <?= form_open('gettew_dashboard/confirm_student_payment') ?>
  <input type="text" name="student_id" class="w3-padding" placeholder="Student Id" /><br>
  
<!---\
THERE IS OPTION TO WHEATHER 
TO USE CURRENT SESSION OR CHOOSE SESSION

	SELECT TERM AND SESSION HERE
	---><br>
<span class="w3-label">Session and Term:</span><br>
<input onClick="hideIt()" type="radio" name="time_frame" class="w3-radio" value="current" /> For Current Session & Term<br>
<input  onClick="showIt()" type="radio" name="time_frame" class="w3-radio" value="set" /> Set Session & Term
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
<option value="<?=$term ?>"><?=$term ?></option>	<?php


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
<input type="submit" name="submit" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin">


</form>
</div>

</div>