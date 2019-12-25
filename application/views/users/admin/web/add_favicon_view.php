<div class="w3-container w3-center w3-row">
	<br>
<b class="w3-xlarge w3-text-theme">Add Favicon</b><br>

<?php

echo form_open_multipart('webfunction/change_favicon/'.$this->uri->segment(3));

?>
<span ="w3-text-red"><?php
echo validation_errors(); ?>
</span>
<?php
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];

}
?>
<br>
<span class="">Favicon size can be 60X60,30X30</span>
<center>
  <br>
<input type="file" name="favicon" class="w3-padding"/>
</center>
<br>
<input type="submit" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-round-large w3-margin" value="Change Favicon" name="submit"></input><br>
</form>
<br>

</div>

