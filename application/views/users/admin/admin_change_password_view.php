<div class="w3-container w3-center"><br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Change Account Password</span><br>
<?= isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:'' ?>
<span class="w3-text-red"><?=validation_errors() ?></span>

  <hr>
<?= form_open("dashboard/change_password") ?>
<span class="w3-label">Current Password</span><br>
<input type="Password" name="current_password" class="w3-padding w3-margin" placeholder="Current Password"/>
<br>

<span class="w3-label">New Password</span><br>
<input type="Password" name="new_password" class="w3-padding w3-margin" placeholder="New Password"/>
<br>


<span class="w3-label">Confirm Password</span><br>
<input type="Password" name="confirm_password" class="w3-padding w3-margin" placeholder="Confirm Password"/>
<br>
<input type="submit" name="submit" value="Change Password" class="w3-btn w3-teal w3-hover-text-teal w3-hover-white w3-border w3-margin w3-border-teal w3-center">

</form>



</div>