
<div class="w3-container w3-center">
	<br>
	<span class="w3-xlarge w3-text-teal w3-margin">Theme Color Settings</span><br>

<br>

	<span class="w3-medium w3-text-teal w3-margin">Primary Color</span><br>

<form method="post" action="<?php echo current_url();?>">
<?php
  getColorsOptions("color");
?>




<br>
<input type="submit" class="w3-button w3-teal w3-margin" name="submit" value="Change Primary Color" />
</form>
<?php
if(isset($_POST['color']))
{

 setData("primary_color",$_POST['color']);

}

echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current Primary Color</span>';
echo "<br>";
echo "<br><br><span class='w3-padding w3-tag w3-xlarge w3-".getData("primary_color")."'></span><br>";


?>

	<span class="w3-medium w3-text-teal w3-margin">Secondary Color</span><br>

<form method="post" action="<?php echo current_url();?>">
<?php
  getColorsOptions("color_sec");
?>




<br>
<input type="submit" class="w3-button w3-teal w3-margin" name="submit" value="Change Secondary Color" />
</form>
<?php
if(isset($_POST['color_sec']))
{

 setData("secondary_color",$_POST['color_sec']);

}

echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current Secondary Color</span>';
echo "<br>";
echo "<br><br><span class='w3-padding w3-tag w3-xlarge w3-".getData("secondary_color")."'></span><br>";


?>


<?php
 echo '<br><a class="w3-button" href="'.site_url('gettew_prewebsettings_action/theme_settings/'.$this->uri->segment(3)).'/edit_home">  <i  style="margin-right:3%" class="fa fa-eye w3-text-teal w3-large w3-center"></i>View</a>';
?>




</div>
