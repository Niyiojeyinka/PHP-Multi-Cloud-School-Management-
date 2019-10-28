<div class="w3-container w3-center"> 
<div class="w3-center">
	<h3 class="w3-xlarge w3-text-teal">FEES</h3>
<br>

<h4 class="w3-xlarge w3-text-teal"><?=$school['name'] ?></h4>
<br>

<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>

<div class="w3-container w3-center">
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span><br>
       <span class="">Class</span>
<br>
     <span class="w3-large w3-text-theme "><?=$child_level['level_name'] ?></span>
    <center>

  <div class="w3-third">
     <b class="w3-text-teal">Amount Payable</b><br>
     <table style="max-width: 60%;" class="w3-table w3-striped w3-center w3-margin">
<tr class="w3-text-teal"><td><b>FEE TITLE</b></td><td><b>Amount(NGN)</b></td></tr>
<div class="">
	<?php
	$payable_total_fee=0;
if (!empty($payable_fees)) {
	foreach ($payable_fees as $fee) {
		
echo "<tr><td>".$fee['fee_title']."</td><td>".$fee['amount']."</td></tr>";

		$payable_total_fee = $payable_total_fee+$fee['amount'];
	}
echo "<tr><td><b>Total</b></td><td><b>".$payable_total_fee.".00</b></td></tr>";
?>
<?php

}else{
	echo "School is yet to set fee for this SESSION/TERM please contact the school to set fee";
}

	?>
	

</table>

</div>



      <div class="w3-twothird">
        <b class="w3-text-teal">Amount Paid</b><br>
   
  <?php
  $paid_total_fee=0;
if (!empty($paid_fees)) {
  ?>
  <table style="max-width: 60%;" class="w3-table w3-striped w3-center w3-margin">
<tr class="w3-text-teal"><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Amount(NGN)</b></td><td><b>Method</b></td><td><b>Date</b></td></tr>
<div class="">

  <?php
  foreach ($paid_fees as $fee) {
    
echo "<tr><td>".$fee['session']."</td><td>".$fee['term']."</td><td>".$fee['amount']."</td><td>".$fee['method']."</td><td>".date('F,j Y,g:ia',$fee['time'])."</td></tr>";

    $paid_total_fee = $paid_total_fee+$fee['amount'];
  }
echo "<tr><td><b>Total</b></td><td><b>".$paid_total_fee.".00</b></td></tr>";

echo "
</table>";
echo "<span class='w3-text-teal'>Outstanding FEE</span> = NGN".($payable_total_fee-$paid_total_fee);
?>
<?php

}else{
  echo "You've not pay any FEE";
}

  ?>
  


</div>
</center>


  
</div>

</div>

 
<a href="<?=site_url('parents/view_payment_history/'.$this->uri->segment(3)) ?>" class="w3-button w3-teal w3-margin w3-hover-text-teal w3-hover-white w3-border w3-border-teal">View Payments History</a>




</div>



</div>