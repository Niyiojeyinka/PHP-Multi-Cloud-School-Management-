<style type="text/css">
@media screen and (min-width: 600px){
	#floatdiv {
		max-width: 60%;
		padding:64px 64px 64px 64px; 
	}
	#parentdiv {
		padding : 128px 64px 64px 64px;
}
}
@media screen and (max-width: 600px){
	#floatdiv {
		max-width: 90%;
		padding: 32px;
}
	#parentdiv {
		padding-top: 64px;
}
}

</style>
<div style="background-image: url('<?=base_url('assets/images/profiles/bgg.png') ?>');" class="w3-container  w3-center" id="parentdiv" >

	<center>
<div id="floatdiv" class="w3-card-8  w3-white">
	



<div class="w3-container w3-center"> 
	<h3 class="w3-xlarge w3-text-teal">FEES</h3>
<br>
<h4 class="w3-xlarge w3-text-teal"><?=$school['name'] ?></h4>
<br>

    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>
<br>
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span><br>
       <span class="">Class</span>
<br>
     <span class="w3-large w3-text-theme "><?=$child_level['level_name'] ?></span>
    <center>






   <b class="w3-text-teal">Amount Paid</b><br>
   
  <?php
  $paid_total_fee=0;
if (!empty($paid_fees)) {
  ?>
  <div class="w3-responsive">
  <table style="max-width: 60%;" class="w3-table w3-striped w3-center w3-margin w3-small">
<tr class="w3-text-teal"><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Amount(NGN)</b></td><td><b>Method</b></td><td><b>Date</b></td></tr>
<div class="">

  <?php
  foreach ($paid_fees as $fee) {
    
echo "<tr><td>".$fee['session']."</td><td>".$fee['term']."</td><td>".$fee['amount']."</td><td>".$fee['method']."</td><td>".date('F,j Y,g:ia',$fee['time'])."</td></tr>";

    $paid_total_fee = $paid_total_fee+$fee['amount'];
  }
echo "<tr><td><b>Total</b></td><td><b>".$paid_total_fee.".00</b></td></tr>";

echo "
</table></div>";

//echo "<span class='w3-text-teal'>Outstanding FEE</span> = NGN".($payable_total_fee-$paid_total_fee);
?>
<?php

}else{
  echo "You've not pay any FEE";
}

  ?>
  







     <table style="max-width: 60%;" class="w3-table w3-striped w3-center">
<tr class="w3-text-teal"><td><b>FEE TITLE</b></td><td><b>Amount(NGN)</b></td></tr>
<div class="">
	<?php
	$total_fee=0;
if (!empty($payable_fees)) {
	foreach ($payable_fees as $fee) {
		
echo "<tr><td>".$fee['fee_title']."</td><td>".$fee['amount']."</td></tr>";

		$total_fee = $total_fee+$fee['amount'];
	}
echo "<tr><td>Total</td><td>".$total_fee.".00</td></tr>";
echo "<tr><td><b>Outstanding Total</b></td><td><b>".$total_fee.".00 - ".$paid_total_fee." = <br>".($total_fee-$paid_total_fee)."</b></td></tr>";

?>

<?php

}else{
	echo "School is yet to set fee for this SESSION/TERM please contact the school to set fee";
}

	?>
	

</table></center>

<?= form_open('idcard/pre_paymentgateway_fee')?>

<select name="how" onchange="showDiv(this.value)" class="w3-padding w3-margin">
	<option value="part">PAY PART OF THE FEE</option>
	<option value="full" selected>PAY FULL FEE</option>

</select>
<div id="inputDiv" class="w3-container" style="display: none;">
	<span class="w3-label">Amount You Want To Pay</span><br>
	<input type="text" name="amount" placeholder="Amount(NGN)" class="w3-padding w3-margin"/>
</div>
<script type="text/javascript">
	
function showDiv(value) {
	if (value == "part") {

       document.getElementById('inputDiv').style.display= 'block';
	}else{

       document.getElementById('inputDiv').style.display= 'none';
	}
}


</script><br><input type="hidden" name="student_id" value="<?= $this->uri->segment(3)?>"/>
<input type="hidden" name="total_amount" value="<?= ($total_fee-$paid_total_fee)?>"/>
<input type="submit" name="submit" value="Continue" class="w3-button w3-teal w3-hover-text-teal w3-hover-white w3-border w3-border-teal w3-margin"/>
</form>

</div>





<!--card ends here-->
</div>




</div>

</div>	
</center>












<!-- Footer start here -->
<footer class="w3-container w3-padding-32 w3-center w3-xlarge">
  <div class="w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-github w3-hover-opacity"></i>
    <i class="fa fa-android w3-hover-opacity"></i>
    <i class="fa fa-windows w3-hover-opacity"></i>
    <i class="fa fa-apple w3-hover-opacity"></i>
    <i class="fa fa-globe w3-hover-opacity"></i>

     </div>
              <span class="w3-xlarge w3-margin-left w3-padding w3-border w3-border-black w3-round-large"><b>Gettew</b></span>
		<p class="w3-small w3-margin-top">Copyright © Gettew - All rights reserved,  <a style="text-decoration: none;" href="http://Gettew.com">Gettew.com</a></p>

</footer>
</div>



</body>
</html>

