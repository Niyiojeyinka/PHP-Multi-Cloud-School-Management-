<div class="w3-container w3-center">

  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Confirm SMS</span><br>
  <hr>
 <span class="w3-large"> You are Sending an SMS to <span class="w3-text-theme"><?=count($_SESSION['receivers']) ?></span> Contacts 
<br>
Each SMS Cost NGN3 Only<br>
Total Cost</span><br>
 <span class="w3-xlarge w3-text-theme">NGN<?= 3 * count($_SESSION['receivers']) ?></span>
<br>
 Your Current Account balance is 
 <br>
 <span class="w3-xlarge w3-text-theme">NGN<?=$school['account_balance'] ?></span>


 <!--if total cost less than account bal go to deposit page-->
<?=form_open("dashboard_cont/process_sms") ?>
<button name="action" value="cancel" class="w3-button w3-red w3-hover-white w3-border w3-border-red w3-hover-text-red w3-margin">Cancel</button>

<button name="action" value="send" class="w3-button w3-teal w3-hover-white w3-border w3-border-teal w3-hover-text-teal w3-margin">Send</button>
</form>


<hr>



</div>
