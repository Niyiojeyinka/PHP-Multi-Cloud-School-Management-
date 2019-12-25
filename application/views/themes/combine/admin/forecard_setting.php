<div class="w3-container w3-center">
	<br>
	<span class="w3-xlarge w3-text-teal w3-margin">Theme Homepage ForeCard Settings</span><br>

<br>

<div class="w3-row">
	<div class="w3-third">
		
<?php
		echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current First Box Design</span>';
echo "<br>";
echo "<br><br>";
?>
<div  style="display: inline-block;" class="w3-container w3-<?=getData("icon_one_color")?> w3-text-<?=getData("icon_one_text_color")?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?=getData("icon_one")?> w3-xxxlarge"></i>
      <h4><?=getData("icon_one_text")?></h4>
      </div>

<form method="post" action="<?php echo current_url();?>">
	<span class="w3-medium w3-text-teal w3-margin">Background Color</span><br>
<?php
  getColorsOptions("first_bg_color");
?>
<br>
	<span class="w3-medium w3-text-teal w3-margin">Icons</span><br>

<?php
  getIconsOptions("first_icon");
?>
	<br>
<input type="text" name="first_icon_text" value="<?=getData("icon_one_text") ?>" class="w3-padding"/>

<br>

<?php
if(isset($_POST['first_bg_color']))
{

 setData("icon_one_color",$_POST['first_bg_color']);

}
if(isset($_POST['first_icon']))
{

 setData("icon_one",$_POST['first_icon']);

}
if(isset($_POST['first_icon_text']))
{

 setData("icon_one_text",$_POST['first_icon_text']);

}
?>


	</div>
	<div class="w3-third">
				
<?php
		echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current second Box Design</span>';
echo "<br>";
echo "<br><br>";
?>
<div  style="display: inline-block;" class="w3-container w3-<?=getData("icon_two_color")?> w3-text-<?=getData("icon_two_text_color")?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?=getData("icon_two")?> w3-xxxlarge"></i>
      <h4><?=getData("icon_two_text")?></h4>
      </div>
<br>
	<span class="w3-medium w3-text-teal w3-margin">Background Color</span><br>
<?php
  getColorsOptions("second_bg_color");
?>
<br>
	<span class="w3-medium w3-text-teal w3-margin">Icons</span><br>

<?php
  getIconsOptions("second_icon");
?>
	<br>
<input type="text" name="second_icon_text" value="<?=getData("icon_two_text") ?>" class="w3-padding"/>

<br>

<?php
if(isset($_POST['second_bg_color']))
{

 setData("icon_two_color",$_POST['second_bg_color']);

}
if(isset($_POST['second_icon']))
{

 setData("icon_two",$_POST['second_icon']);

}
if(isset($_POST['second_icon_text']))
{

 setData("icon_two_text",$_POST['second_icon_text']);

}
?>

	</div>
	<div class="w3-third"></div>

		
<?php
		echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current third Box Design</span>';
echo "<br>";
echo "<br><br>";
?>
<div  style="display: inline-block;" class="w3-container w3-<?=getData("icon_three_color")?> w3-text-<?=getData("icon_three_text_color")?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?=getData("icon_three")?> w3-xxxlarge"></i>
      <h4><?=getData("icon_three_text")?></h4>
      </div>
<br>
	<span class="w3-medium w3-text-teal w3-margin">Background Color</span><br>
<?php
  getColorsOptions("third_bg_color");
?>
<br>
	<span class="w3-medium w3-text-teal w3-margin">Icons</span><br>

<?php
  getIconsOptions("third_icon");
?>
	<br>
<input type="text" name="third_icon_text" value="<?=getData("icon_three_text") ?>" class="w3-padding"/>

<br>

<?php
if(isset($_POST['third_bg_color']))
{

 setData("icon_three_color",$_POST['third_bg_color']);

}
if(isset($_POST['third_icon']))
{

 setData("icon_three",$_POST['third_icon']);

}
if(isset($_POST['third_icon_text']))
{

 setData("icon_three_text",$_POST['third_icon_text']);

}
?>

</div>	

<input type="submit" class="w3-button w3-teal w3-hover-white w3-border w3-border-teal w3-hover-text-teal w3-margin" name="submit" value="Update" />
</form>
<?php
 echo '<br><a class="w3-button" href="'.site_url('prewebsettings_action/theme_settings/'.$this->uri->segment(3)).'/edit_home">  <i  style="margin-right:3%" class="fa fa-eye w3-text-teal w3-large w3-center"></i>View</a>';
?>




</div>
