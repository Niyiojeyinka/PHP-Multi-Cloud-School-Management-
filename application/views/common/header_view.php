<body class="w3-serif">

	<header class="w3-bar w3-border w3-border-white w3-card w3-padding-bottom w3-xxlarge w3-theme w3-cell-row w3-top">
		<a href="<?= base_url() ?>">
			<img style="max-width: 120px" class='w3-margin-left' src="<?= base_url('assets/images/logo.png') ?>"/>
		</a>

	    <div class="w3-right w3-small hide_on_mobile w3-margin-top" id="div_to_open">

        <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?=site_url('staff') ?>">Staff</a>

 <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?=site_url('parents') ?>">Parents</a>

          <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?=site_url('students') ?>">Students</a>
        
				<!--<a class="w3-bar-item w3-margin-left" id="mlink" href="#">Platforms</a>
				-->
			   <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?= site_url('pricing')?>">Pricing</a>

				   <a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?= base_url('contact_us') ?>">Contact Us</a>
				
				<a class="w3-bar-item w3-margin-left w3-padding w3-hover-white w3-hover-text-teal w3-round-jumbo" id="mlink" href="<?= "#"//base_url('') ?>">Terms And Conditions</a>
				
	        <a class="w3-bar-item w3-margin-left w3-margin-right" href="https://m.facebook.com/gettew"><i class="fa fa-facebook"></i></a>

			<i onClick="close_menu()" class="fa fa-times hide_on_desktop w3-right w3-margin-right w3-margin-top" id="cancel">
		<span class="w3-tiny">hide</span></i>

	             </div>

		<i onClick="open_menu()" class="fa fa-bars hide_on_desktop w3-right w3-margin-right w3-margin-top" id="bar_to_hide"></i>
		
	</header>
<script type="text/javascript">
function open_menu(){
 document.getElementById('div_to_open').style.display = "block";
 document.getElementById('bar_to_hide').style.display = "none";
 document.getElementById('cancel').style.display = "block";


}
function close_menu(){
 document.getElementById('div_to_open').style.display = "none";
 document.getElementById('bar_to_hide').style.display = "block";


}

</script>
<style type="text/css">
	a{
text-decoration: none;
}
</style>