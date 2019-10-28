<!DOCTYPE html>
<html>
<title><?= $title ?></title>
<meta charset="UTF-8">
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
  <span class="w3-jumbo w3-text-white">
<?php
$blog_post = getBlogPost(getPostSlug());
if (empty($blog_post)) {
   show_page("404");
}

?>
    
<strong><?=$blog_post['title'] ?></strong>

    </span><br>
    <span class="w3-large w3-text-white">Posted On <?=date("F j Y,g:ia",$blog_post['time']) ?></span>
 
</div>

  <div class="w3-half w3-padding-large">
  </div>
</div>

  <br><br>
</section>
<br><br>
<section class="w3-row">
  <!-- blog contents here-->
<div class="w3-twothird w3-large w3-padding-large">
  <?= $blog_post['text'] ?>
</div>
<div class="w3-third">
  
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

