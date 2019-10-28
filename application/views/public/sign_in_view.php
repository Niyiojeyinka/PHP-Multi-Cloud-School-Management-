<style type="text/css">
@media screen and (min-width: 600px){
	#floatdiv {
		max-width: 60%;
		padding:64px 64px 64px 64px; 
	}
	#parentdiv {
		padding : 128px 64px 64px 64px;
}
}
@media screen and (max-width: 600px){
	#floatdiv {
		max-width: 90%;
		padding: 32px;
}
	#parentdiv {
		padding-top: 64px;
}
}

</style>
<div style="background-image: url('<?=base_url('assets/images/profiles/bgg.png') ?>');" class="w3-container  w3-center" id="parentdiv" >

	<center>
<div id="floatdiv" class="w3-card-8  w3-white">
<div class="w3-margin"><b class="w3-xlarge w3-text-teal w3-margin w3-serif">SIGN IN</b></div> <br>
<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=site_url('staff') ?>">Staff Login</a>
<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=site_url('parents') ?>">Parents Login</a>
<?php


if (ENVIRONMENT =='development') {
   $sign_in_link = 'http://gettew.dev/login';
}else{
   $sign_in_link = 'http://gettew.com/login';

}

?>
<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=$sign_in_link ?>">Admin Login</a>
</div>	
</center>












<!-- Footer start here -->
<footer class="w3-container w3-padding-32 w3-center w3-xlarge">
  <div class="w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-github w3-hover-opacity"></i>
    <i class="fa fa-android w3-hover-opacity"></i>
    <i class="fa fa-windows w3-hover-opacity"></i>
    <i class="fa fa-apple w3-hover-opacity"></i>
    <i class="fa fa-globe w3-hover-opacity"></i>

     </div>
              <span class="w3-xlarge w3-margin-left w3-padding w3-border w3-border-black w3-round-large"><b>Gettew</b></span>
		<p class="w3-small w3-margin-top">Copyright © Gettew - All rights reserved,  <a style="text-decoration: none;" href="http://Gettew.com">Gettew.com</a></p>

</footer>
</div>



</body>
</html>

