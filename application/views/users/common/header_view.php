<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo base_url($web_favicon_slug); ?>" />
	<meta name="author" content="olaniyi ojeyinka">
	<meta name="description" content="<?php echo $description; ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />


	<meta property="og:description" content="<?php echo $description; ?>" />

	<meta property="og:url"content="<?php echo current_url(); ?>" />

	<meta property="og:title" content="<?php echo $title; ?>" />


	<meta property="og:image" content="<?php
	if(isset($social_image))
	{



}else{
	echo base_url($web_favicon_slug);


}



	?>
	" />

	<?php
	if(isset($noindex))
	{
	echo $noindex;

	}
	 ?>






	  <script type="text/javascript" src="jquery.js"></script>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/w3mobile.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/w3-theme-indigo.css'); ?>">
		<link rel="stylesheet"  href="<?php echo base_url('assets/css/w3.css'); ?>">
		<link rel="stylesheet"  href="<?php echo base_url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>">
		</script>

    <style>
    a {
text-decoration:none;
    	}


    </style>

</head>
<body>

	<header>
		<div style="" class="w3-bar w3-border w3-border-white w3-teal w3-padding-top w3-padding-bottom">
            <span class="w3-xlarge w3-margin-left w3-padding w3-border w3-border-white w3-round-large"><b><a href="<?= site_url() ?>">Pryper</a></b></span>

<div class="w3-right w3-small">


					<a class="w3-bar-item w3-margin-left" id="mlink" href="#">Platforms</a>
					<a class="w3-bar-item w3-margin-left" href="#">Pryper Jobs</a>
					<a class="w3-bar-item w3-margin-left" href="#">Pryper Pay</a>
					<a class="w3-bar-item w3-margin-left"  href="#">Our Blog</a>
					<a class="w3-bar-item w3-margin-left"  href="<?= site_url('contact_us') ?>" >Contact Us</a>
    <a class="w3-bar-item w3-margin-left w3-margin-right" href="#"><i class="fa fa-facebook"></i></a>

            </div>
      		</div>


	</header><!--  header ends here   -->
