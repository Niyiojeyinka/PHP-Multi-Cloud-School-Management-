<div>
<center>
<b class='w3-text-theme'>Pay Online</b>
<br>
 <span>Note</span>:<span class='w3-small'>The minimum amount you can deposit is NGN100</span></center>
 
 <form method='POST' action='<?php echo site_url('dashboard/fund_account'); ?>'>

<div class='w3-row w3-center'>
    <i  style='margin-right:3%' class="fa fa-bank
     w3-large w3-text-theme w3-center w3-margin"></i>
     <input class='w3-center' type='number' min='100' name='amount' placeholder='Amount'/><span class="w3-text-theme">NGN</span>
</div>
<center>

<input class='w3-center w3-button w3-theme'
 type='submit' name='submit' value='Pay Online'/>
</center>
</form>

</div>