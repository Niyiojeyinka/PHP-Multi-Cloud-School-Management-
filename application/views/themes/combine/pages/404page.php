<!DOCTYPE html>
<html>
<title>Page Not Found</title>
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

</style>
<body class="w3-center">
	<div class="w3-padding-jumbo w3-center">
	<i class="w3-jumbo fa fa-exclamation-triangle w3-text-red"></i><br>
	<h1>ERROR 404</h1>
	<br>
	<h1>Oops, Page not Found</h1>
	<h6>Note you can always go back to our HomePage by clicking the back below</h6><br>
	<a class="w3-btn w3-green" href="<?=site_url('') ?>">Go Back</a>
</div>
</body></html>
