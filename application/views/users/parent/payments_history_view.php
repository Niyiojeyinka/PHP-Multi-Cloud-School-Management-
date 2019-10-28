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



      <div class="w3-container">
        <b class="w3-text-teal">Payment Attempts</b><br>
   
  <?php
  
if (!empty($paid_fees)) {
  ?>
  <table  style="max-width: 60%;height: 400px;overflow-y: scroll;" class="w3-table w3-striped w3-center w3-margin">
<tr class="w3-text-teal"><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Amount(NGN)</b></td><td><b>Method</b></td><td><b>Status</b></td><td><b>Date</b></td></tr>

  <?php
  foreach ($paid_fees as $fee) {
    
echo "<tr><td>".$fee['session']."</td><td>".$fee['term']."</td><td>".$fee['amount']."</td><td>".$fee['method']."</td><td>".$fee['status']."</td><td>".date('F,j Y,g:ia',$fee['time'])."</td></tr>";

    
  }

echo "
</table>";

?>
<?php

}else{
  echo "You've not pay any FEE";
}

  ?>
  


</div>
</center>

<form>
   

</div>

</div>






</div>



</div>