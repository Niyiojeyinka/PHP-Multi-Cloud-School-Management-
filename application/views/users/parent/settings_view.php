<div class="w3-container w3-center">
 


	<br><center><b class="w3-xlarge w3-margin w3-text-teal">Account Settings</b></center>
	
	<span class="w3-text-red"><?= validation_errors() ?></span>
		<span class="w3-text-green"><?php 
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];
}


		 ?></span>

<div class="w3-half">
	<?= form_open('staff/change_phone') ?>

	<span class="w3-text-teal"><b>Change Phone Number</b></span><br>

	
<span class="w3-small w3-text-teal">Current Password</span><br>
	<input type="password" name="current_password"  class="w3-padding" placeholder="Current Password"  required/><br><br>

<span class="w3-small w3-text-teal">New Phone Number(070xxxxxxxxx)</span><br>
	<input type="text" name="new_phone" class="w3-padding" placeholder="New Phone" required/><br><br>
	<!--<span class="w3-small w3-text-teal">Confirm Phone</span><br>
	<input type="phone" name="confirm_phone" class="w3-padding" placeholder="Confirm Phone" required/>--><br><br>
	<input type="submit" name="submit" value="Change Phone" class="w3-btn w3-teal">
</form>
</div>
<div class="w3-half">
		<?= form_open('staff/change_password') ?>
<span class="w3-text-teal"><b>Change Password</b></span><br>

<span class="w3-small w3-text-teal">Current Password</span><br>
	<input type="password" name="current_password"  class="w3-padding" placeholder="Current Password" required/><br><br>

<span class="w3-small w3-text-teal">New Password</span><br>
	<input type="password" name="new_password"  class="w3-padding" placeholder="New Password" required/><br><br>

<span class="w3-small w3-text-teal">Confirm Password</span><br>
	<input type="password" name="confirm_password"  class="w3-padding" placeholder="Confirm Password" required/><br><br>
	<input type="submit" name="submit" value="Change Password" class="w3-btn w3-teal">
</form>
</b>
</div>

</div><br>