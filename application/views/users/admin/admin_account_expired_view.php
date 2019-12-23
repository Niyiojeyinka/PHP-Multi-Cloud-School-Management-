<div class="w3-container w3-padding">
<center>
	<i class="fa fa-exclamation-circle w3-jumbo w3-text-red"></i><br>
<span class="w3-text-red w3-large">SOFTWARE ACCESS & DOMAIN EXPIRED</span>
	<br>
	<div style="max-width: 80%;" class="w3-text-teal w3-padding-jumbo"><strong>Hey,Your Account  Software Access and Domain has Expired on <?=date("F j Y,g:ia",$school['license_expire']) ?> </strong><br>
<span>Your Website will not be accessible until successful renewal</span>
<br>
<span>Your staff wont be able to login to their account</span><br>
<span>Your student Digital ID Card Function is now Limited</span><br>
<span>Result Module has been deactivated for all users</span>
<br>Please fund your account and click on the link below to upgrade/renew your license. Thank you!

	</div>
<a href="<?=site_url('gettew_dashboard/upgrade_account') ?>" class='w3-button w3-green w3-hover-text-green w3-hover-white w3-border w3-border-green w3-margin'><i class="fa fa-chevron-up"></i> Upgrade Account Now</a>


</center>

</div>