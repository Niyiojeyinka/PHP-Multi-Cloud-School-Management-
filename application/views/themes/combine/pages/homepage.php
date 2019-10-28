<!DOCTYPE html>
<html>
<title><?= $title ?></title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="<?php echo getFaviconLink(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="<?= themeAssetsBaseUrl($theme_id,"/css/w3.css") ?>"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
<link rel="stylesheet"  href="<?php echo base_url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css'); ?>"/>
<?= headMetaDetails() ?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}

</style>

    <style type="text/css">
.mySlides {display:none;}

    a {

        text-decoration:none;
      }
@media screen and (max-width:600px)
{
  .give_margin{

    margin-top:60px;
  }
  .hide_on_mobile {

    display:none;
  }
}
@media screen and (min-width:600px)
{
  .call_div {
    //margin-right: 120px;
  }
.hide_on_desktop {

display:none;
}

}
    </style>

<body class="w3-serif w3-center">
  <?php

$theme_data = json_decode($school_web['theme_data'],true);


?>
  <?php initLiveEdit(); ?>

<header>
  <div class="w3-bar w3-padding-large w3-cell-row w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-row">
    <div class="w3-half">
    <span class="w3-margin"><i class="fa fa-map-marker w3-margin-right w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?>"></i><?php setPageContents("span","",$theme_data['address'],'address','text'); ?></span>

    <span class=""><i class="fa fa-envelope w3-margin-right w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?>"></i><?php setPageContents("span","",$theme_data['email'],'email','text'); ?></span>
  </div>
  <div class="w3-half"><span class="w3-right w3-margin-right"><?php setPageContents("span","",$theme_data['opening_hours'],'opening_hours','text'); ?></span></div>
  </div>


  <div class="w3-container w3-bar w3-border-bottom w3-border-lightgray w3-card w3-xxlarge w3-cell-row">
    <div class="w3-left w3-margin-left">
    <a href="<?= base_url() ?>">
      <img style="max-width: 60px;" class='w3-image w3-margin-left w3-bar-item' src="<?php
if(isset($theme_data['logo']) && !empty($theme_data['logo']))
{
echo mediaBaseUrl($theme_data['logo']);
}else{
  //theme default image
 echo themeAssetsBaseUrl($theme_id,"/comb.png");
}

      ?>"/>
    </a><?php imageUpload('logo');?><span class="w3-xxlarge w3-margin w3-text-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?>"><?php setPageContents("strong","",$theme_data['school_name'],'school_name','text'); ?></span>
</div>
      <div  class="w3-right w3-small" id="call_div">
<i class="fa fa-phone w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-margin-right w3-jumbo"></i><div style="display: inline-block;" class="w3-margin-right"><?php setPageContents("span","w3-text-gray w3-large",$theme_data['speak'],'speak','text'); ?><br><span class="w3-text-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-large"><?php setPageContents("strong","",$theme_data['phone'],'phone','text'); ?></span></div>
  </div>
</div>

  <div class="w3-bar w3-padding-large w3-cell-row w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-row">

        <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-round-jumbo" id="mlink" href="/">Home</a>
<?php
foreach (inbuiltMenus() as $menu) {
?>
<a href="<?= $menu['link']?>" class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-round-jumbo" id="mlink"><?= $menu['title'] ?></a>
<?php
}

?>
  </div>
</header>
<section style="background-image: url('<?php
if(isset($theme_data['slider_bg']) && !empty($theme_data['slider_bg']))
{
echo mediaBaseUrl($theme_data['slider_bg']);
}else{
  //theme default image
 echo themeAssetsBaseUrl($theme_id,"/slider1.jpg");
}

      ?>');" class="w3-padding-jumbo ">
      <?php imageUpload('slider_bg');?>
  <div class="w3-row">
  <div class="w3-half">
  <span class="w3-jumbo w3-text-white"><?php setPageContents("strong","",$theme_data['hype_text'],'hype_text','text'); ?></span><br>
  <?php setPageContents("span","w3-large w3-text-white",$theme_data['hype_text_tagline'],'hype_text_tagline','text'); ?>
</div>
  <div class="w3-half w3-padding-large">
  </div>
</div>

  <br><br>
</section>
<section style="margin-top: -60px" class="w3-container w3-center">
  <center>
<div style="max-width: 80%" class="w3-container w3-card-16 w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-row w3-margin"> 

<div class="w3-third w3-padding"><span class="w3-xxlarge w3-text-white"><?php setPageContents("strong","",$theme_data['hype_two'],'hype_two','text'); ?></span></div>
<div class="w3-twothird w3-padding">
  <div class="w3-row w3-margin-top">
<div  style="display: inline-block;" class="w3-container w3-<?php
if(isset($theme_data['icon_one_color']) && !empty($theme_data['icon_one_color']))
{
echo $theme_data['icon_one_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-text-<?php
if(isset($theme_data['icon_one_text_color']) && !empty($theme_data['icon_one_text_color']))
{
echo $theme_data['icon_one_text_color'];
}else{
  //theme default color
 echo 'white';
}

      ?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?php
if(isset($theme_data['icon_one']) && !empty($theme_data['icon_one']))
{
echo $theme_data['icon_one'];
}else{
  //theme default icon
 echo 'fa-book';
}

      ?> w3-xxxlarge"></i>
      <?php setPageContents("h4","",$theme_data['icon_one_text'],'icon_one_text','text'); ?>
      </div>
    <div  style="display: inline-block;" class="w3-container w3-<?php
if(isset($theme_data['icon_two_color']) && !empty($theme_data['icon_two_color']))
{
echo $theme_data['icon_two_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-text-<?php
if(isset($theme_data['icon_two_text_color']) && !empty($theme_data['icon_two_text_color']))
{
echo $theme_data['icon_two_text_color'];
}else{
  //theme default color
 echo 'white';
}

      ?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?php
if(isset($theme_data['icon_two']) && !empty($theme_data['icon_two']))
{
echo $theme_data['icon_two'];
}else{
  //theme default icon
 echo 'fa-book';
}

      ?> w3-xxxlarge"></i>
      <?php setPageContents("h4","",$theme_data['icon_two_text'],'icon_two_text','text'); ?>
      </div>
    
<div  style="display: inline-block;" class="w3-container w3-<?php
if(isset($theme_data['icon_three_color']) && !empty($theme_data['icon_three_color']))
{
echo $theme_data['icon_three_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-text-<?php
if(isset($theme_data['icon_three_text_color']) && !empty($theme_data['icon_three_text_color']))
{
echo $theme_data['icon_three_text_color'];
}else{
  //theme default color
 echo 'white';
}

      ?> w3-padding-32 w3-margin w3-round-xlarge">
        <i class="fa <?php
if(isset($theme_data['icon_three']) && !empty($theme_data['icon_three']))
{
echo $theme_data['icon_three'];
}else{
  //theme default icon
 echo 'fa-book';
}

      ?> w3-xxxlarge"></i>
      <?php setPageContents("h4","",$theme_data['icon_three_text'],'icon_three_text','text'); ?>
      </div>
    

</div>
</div>

    </div></center>
  </section>
<section class="w3-row w3-padding">
  
<div class="w3-half w3-padding">
  <div class="w3-container">
    <!--about us -->
  <span class="w3-border-bottom w3-bottombar w3-border-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-xlarge"><?php setPageContents("strong","",$theme_data['about_us_text'],'about_us_text','text'); ?></span><br>
  <div class="w3-padding w3-margin w3-justify w3-text-gray"><span style="letter-spacing: 0.7;" class="w3-large">
<?php setPageContents("span","w3-padding-32",$theme_data['about_us_contents'],'about_us_contents','longtext'); ?></span></div>
</div>
<div class="w3-container">
    <!--our mission -->
  <span class="w3-border-bottom w3-bottombar w3-border-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-xlarge "><?php setPageContents("strong","",$theme_data['our_mission_text'],'our_mission_text','text'); ?></span><br>
  <div class="w3-padding w3-margin w3-justify w3-text-gray"><span style="letter-spacing: 0.7;" class="w3-large">
<?php setPageContents("span","w3-padding-32",$theme_data['our_mission_contents'],'our_mission_contents','longtext'); ?></span></div>
</div>

</div>
<div class="w3-half w3-padding">
  <div class="w3-container w3-card-4 w3-padding-jumbo w3-margin"><br>
<span style="letter-spacing: 1.2px;" class="w3-xlarge"><?php setPageContents("strong","",$theme_data['upcoming_events'],'upcoming_events','text'); ?></span>

<?php
if (!empty(getLatestEvents(3))) {
  foreach (getLatestEvents(3) as $event) {
  
?>

<div>
  <i class="w3-xlarge fa fa-calendar-check-o w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-margin"></i><span class="w3-large w3-text-gray"><?=$event['event_time'] ?></span><br>
  <span class="w3-large"><?=$event['title'] ?></span><br>
    <span class="w3-margin-right"><i class="w3-xlarge fa fa-clock-o w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-margin"></i><span class="w3-text-gray"><?=$event['duration'] ?></span></span>
<span class="w3-margin-left"><i class="w3-xlarge fa fa-map-marker w3-text-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-margin"></i><span class="w3-large w3-text-gray"><?=$event['location'] ?></span></span>


    <br>

  <hr>
</div>
<?php
}
}else{
  echo "<br>No Event Yet";
}
?>
    
  </div>


</div>


</section>
<section class="w3-center"><!--image slider section------>
<center>
<div class="w3-content w3-display-container w3-margin w3-center">


<?php
if (!empty(getSliders())) {
  foreach (getSliders() as $slider) {
  
?>
<div class="w3-display-container mySlides">
  <img src="<?= mediaBaseUrl($slider['slug'])?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
   <?=$slider['title'] ?>
  </div>
</div>
<?php
}}else{
?>


<div class="w3-display-container mySlides">
  <img src="<?=themeAssetsBaseUrl($theme_id,"slider2.jpg") ?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
   End of the year party
  </div>
</div>



<div class="w3-display-container mySlides">
  <img src="<?=themeAssetsBaseUrl($theme_id,"slider3.jpg") ?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
   InterHouse Sport
  </div>
</div>


<div class="w3-display-container mySlides">
  <img src="<?=themeAssetsBaseUrl($theme_id,"slider4.jpg") ?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
   Cultural Day
  </div>
</div>


<?php

}
?>


<a class="w3-btn w3-display-left w3-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}
 ?>" onclick="plusDivs(-1)">&#10094;</a>
<a class="w3-btn w3-display-right w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?>" onclick="plusDivs(1)">&#10095;</a>

</div>

  </center>
</section>
<section class="w3-center"><!--blog post section------>
    <span class="w3-border-bottom w3-bottombar w3-border-<?php
if(isset($theme_data['secondary_color']) && !empty($theme_data['secondary_color']))
{
echo $theme_data['secondary_color'];
}else{
  //theme default color
 echo 'red';
}

      ?> w3-xxlarge">
<?php setPageContents("strong","w3-padding-32",$theme_data['our_blog_text'],'our_blog_text','text'); ?></span><br>



<?php
if (!empty(getLatestPosts(3))) {
  foreach (getLatestPosts(3) as $blog) {
  
?>


    <a href="/blog/<?=$blog['slug']?>">
  <div style="" class="w3-container w3-car w3-row w3-margin">
      <div class="w3-col s12 m4 l3">
        <!---feature image here-->
        <img class="w3-image" style="max-width: 250px;height: 200px" src="<?= getFirstImageLink($blog['text'])?>"/>
      </div>
      <div class="w3-col s12 m8 l9">
        <!---article details-->
  <span class="w3-xlarge"><?=$blog['title'] ?></span><br>
<div class="w3-margin w3-justify w3-text-gray"><span style="letter-spacing: 0.7;" class="w3-large"><?= get_blog_excerpt(strip_tags($blog['text']),300) ?>.....</span></div>


      </div>
      

    </div></a>
<?php
}}else{
echo "No Blog Post Found";
}?>
  


</section>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-light-gray">  
  

  <?= footerDetails() ?>
 <?php closeLiveEdit() ?>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</body>
</html>

