<div class="w3-container w3-center w3-serif">
<span class="w3-text-teal w3-margin w3-xlarge">Website Builder</span><br>
<span class="w3-text-small w3-serif">Please choose a theme to use</span>

<!--
<?php
echo form_open('prewebsettings/search_themes/'.$this->uri->segment(3));

?>
<input type="search" name="search_theme" class="w3-padding" placeholder="Search themes...">
<input type="submit" name="submit" value="Search Theme" class="w3-button w3-theme">
</form>-->
	<br>
	<div>
<?php
if(!empty($themes))
{

foreach ($themes as $theme) {

$theme_images = json_decode($theme['theme_images'],true);
echo '<div style="display: inline-block;" class="w3-container w3-margin">';
echo '<span class="w3-label">'.ucfirst($theme['name']).'</span><br>';
echo '<img class="" width="240" height="300" src="'.base_url('assets/themes/'.$theme['theme_id']."/theme_images/".$theme_images[0]).'"/><br>';
echo '<a href="'.site_url('prewebsettings_action/theme_details/'.$theme['name']."/".$this->uri->segment(3)).'" class="w3-button w3-white w3-border w3-margin">View Details<a>
';
//echo '<a href="'.site_url('webdemo/theme_demo/').'" class="w3-button w3-white w3-border w3-margin">Demo<a>';

echo	'<div class="w3-grey w3-padding">
		Price: Free
	</div>
	</div>';
}

}else{


	echo "No Available themes yet!";
}

?>



</div>
</div>