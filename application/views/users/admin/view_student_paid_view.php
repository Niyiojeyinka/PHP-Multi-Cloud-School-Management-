<div class="w3-container w3-center w3-white">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center"><b class="w3-text-teal">Amount Paid</b></span><br>
<?php
if(isset($_SESSION['action_status_report']))
{

  echo "<hr>".$_SESSION['action_status_report'];
}
if(validation_errors() != NULL)
{
echo '<hr><i class="w3-text-red">'.validation_errors().'</i>';
}
?>
<hr>




  <?php
  $paid_total_fee=0;
if (!empty($payments)) {
  ?>
  <div style="height: 400px;overflow-y: scroll;" class="w3-responsive">
  <table style="max-width: 60%;" class="w3-table w3-striped w3-center w3-margin w3-small">
<tr class="w3-text-teal"><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Amount(NGN)</b></td><td><b>Method</b></td><td><b>Date</b></td></tr>
<div class="">

  <?php
  foreach ($payments as $fee) {
    
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
  echo "No Payments Found";
}

  ?>
</div>

</div>
<hr>