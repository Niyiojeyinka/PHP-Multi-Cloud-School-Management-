<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="<?php //echo $description; ?>">
<meta name="keywords" content="<?php
/*foreach ($keywords as $keyw)
{
echo $keyw.',';
}*/
?>">
<meta name="author" content="<?php //echo $author;?>">
<meta name="robots" content="noindex, nofollow">

<title><?php //echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!---editor dependency plus jquery-->  
  <link rel="stylesheet"  href="<?php echo base_url('assets/bootstrap3.3.5/css/bootstrap.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>">
		</script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap3.3.5/js/bootstrap.js'); ?>">
		</script>
<link rel="stylesheet"  href="<?php echo base_url('assets/dist/summernote.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/dist/summernote.js'); ?>">

</script>

<link rel="stylesheet"  href="<?php echo base_url('assets/css/w3.css'); ?>">
<style>
a {
text-decoration:none;
}
@media screen and (min-width:400px){
#menuc {
width:50%;
}
#imgmedia {
display:inline-block;
width:40%;
height:50%;
}
}
</style>
<noscript>Pls turn on JavaScript!</noscript>
</head>
<body class="">

<div style="height:2%;width:100%;padding:1%;" class="w3-bar w3-black w3-text-white">
<div style="height:auto;width:20%;padding:;display:inline" class="w3-bar w3-black w3-text-white">

</div>


<div style="display:inline">
Total Number of Schools :   Total Number of Students : Total Number of Parents :
<br><br>
</div>

</div>


<div class=""><!--container div-->
