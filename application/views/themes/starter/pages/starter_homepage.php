<!DOCTYPE html>
<html>
<title><?= $title ?></title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="<?php echo getFaviconLink(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="<?= themeAssetsBaseUrl($theme_id,"/css/w3.css") ?>"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
<link rel="stylesheet"  href="<?php echo base_url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css'); ?>"/>
<?= headMetaDetails() ?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
a {
  text-decoration: none;
}
</style>
<body>
<?php

$theme_data = json_decode($school_web['theme_data'],true);


?>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?>" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
<?php
foreach (inbuiltMenus() as $menu) {
?>
<a href="<?= $menu['link']?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?= $menu['title'] ?></a>
<?php
}

?>
  </div>
<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
  <!-- Navbar on small screens -->
  <?php
foreach (inbuiltMenus() as $menu) {
?>
    <a href="<?= $menu['link']?>" class="w3-bar-item w3-button w3-padding-large"><?= $menu['title'] ?></a>

<?php
}

?>
  
  
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-<?php
if(isset($theme_data['primary_color']) && !empty($theme_data['primary_color']))
{
echo $theme_data['primary_color'];
}else{
  //theme default color
 echo 'blue';
}

      ?> w3-center" style="padding:128px 16px">
  <span class="w3-margin w3-xxlarge w3-serif"><?= strtoupper($school_web['name']) ?></span><br>
  
  <a href="<?= signInLink() ?>" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Sign In</a>
</header>
<?php initLiveEdit(); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">

       <?php setPageContents("h1","w3-text-grey",$theme_data['first_line'],'first_line','text'); ?>


<?php setPageContents("h5","w3-padding-32",$theme_data['about_us'],'about_us','longtext'); ?>
   

      
    <?php setPageContents("p","w3-text-grey",$theme_data['our_mission'],'our_mission','longtext',true); ?>
    </div>

    <div class="w3-third w3-center">
     
      <img src="<?php
if(isset($theme_data['top_image']) && !empty($theme_data['top_image']))
{
echo mediaBaseUrl($theme_data['top_image']);
}else{
  //theme default image
 echo themeAssetsBaseUrl($theme_id,"/pupils.jpg");
}

      ?>" class="w3-image w3-card w3-margin-right"/><?php imageUpload('top_image');?>
    </div>
  </div>
</div>


<!-- Second Grid -->
<div class="w3-light-grey  w3-container">
  <div class="">
    <div class="w3-third w3-left w3-padding">
      <img src="<?php
if(isset($theme_data['second_image']) && !empty($theme_data['second_image']))
{
echo mediaBaseUrl($theme_data['second_image']);
}else{
  //theme default image
 echo themeAssetsBaseUrl($theme_id,"/students.jpeg");
}

      ?>" class="w3-image w3-margin-right" style="width: 100%;height:100%;"/>
      <?php imageUpload('second_image');?>
    </div>

    <div class="w3-twothird w3-padding">
      

<?php setPageContents("h1","w3-padding-32",$theme_data['headeline_one'],'headeline_one','text'); ?>
   
    <?php setPageContents("h5","w3-padding-32",$theme_data['data_one'],'data_one','longtext'); ?>

      
          <?php setPageContents("p","w3-text-grey",$theme_data['data_two'],'data_two','longtext'); ?>

    </div>
  </div>
</div>

<div class="w3-container w3-<?php
if(isset($theme_data['front_middle_bar_color']) && !empty($theme_data['front_middle_bar_color']))
{
echo $theme_data['front_middle_bar_color'];
}else{
  //theme default color
 echo 'black';
}

      ?> w3-center w3-opacity w3-padding-64">
      <center>
        <?php setPageContents("h1","w3-margin w3-xlarge",$theme_data['qoute'],'qoute','longtext'); ?>
</center>
</div>
<?php setPageContents("p","w3-text-grey",$theme_data['address'],'address','longtext'); ?>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center">  
  <?php setPageContents("p","w3-text-grey",$theme_data['footer_word'],'footer_word','text'); ?>
   <?php setPageContents("p","w3-text-grey",$theme_data['another'],'another','text'); ?>
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

</body>
</html>
