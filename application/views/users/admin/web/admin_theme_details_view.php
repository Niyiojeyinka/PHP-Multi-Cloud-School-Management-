<div class="w3-container w3-center">
	
<span class="w3-xxxlarge  w3-serif w3-text-theme"><?= ucfirst($theme['name']) ?></span><br>


<a class="w3-button w3-theme w3-large w3-margin" href="<?= site_url("prewebsettings_action/install_theme/".$theme['theme_id']."/".$this->uri->segment(4)) ?>">Install</a>



<div class="w3-margin">
	<span class="w3-xlarge  w3-serif w3-text-theme">Descriptions</span><br>


<div class="w3-container">
	<div class="w3-container w3-tiny w3-margin w3-padding"><?= $theme['short_desc'] ?></div>
<div class="w3-container w3-small"><?= $theme['description'] ?></div>

</div>




	<span class="w3-xlarge  w3-serif w3-text-theme">ScreenShots</span><br>
<div class="w3-display-container w3-center">
<?php
    $theme_images = json_decode($theme['theme_images'],true);

for ($i=0; $i < count($theme_images); $i++) { 
echo '<img class="w3-image slider_image" style="" src="'. base_url('assets/themes/'.$theme['theme_id']."/theme_images/".$theme_images[$i]).'"/>';


}
?>



<button class="w3-button w3-xxlarge w3-label w3-display-left" onclick="clickAction(-1)">&#10094;</button>
<button class="w3-button w3-xxlarge w3-label w3-display-right" onclick="clickAction(+1)">&#10095;</button>
</div>
<script type="text/javascript">
	

	var slideIndex = 1;
imageShow(slideIndex);

function clickAction(n) {
    imageShow(slideIndex += n);
}

function imageShow(n) {
    var slider = document.getElementsByClassName("slider_image");
    if (n > slider.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = slider.length} ;
    var i;

    for (i = 0; i < slider.length; i++) {
        slider[i].style.display = "none"; 
    }
    slider[slideIndex-1].style.display = "block"; 
}
</script>
</div>

<a class="w3-button w3-theme w3-large w3-margin" href="<?= site_url("prewebsettings_action/install_theme/".$theme['theme_id']."/".$this->uri->segment(4)) ?>">Install</a>

</div>