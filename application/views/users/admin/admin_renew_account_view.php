c<div>
<center>
	<hr>
<b class='w3-text-theme w3-large'>Package Renewal</b>

<div class="w3-padding-jumbo">
	<?= form_open('dashboard/renew_account')?>
	<?=isset($_SESSION['action_status_report'])?$_SESSION['action_status_report']:"" ?>
	
<hr>

	<div class="">
		<span class="w3-xxlarge j w3-text-blue w3-margin"><strong>.<?=$package_obj['title'] ?></strong></span> Package

<span class="w3-large w3-text-gray w3-margin"><strong>NGN<?=$package_obj['normal_price'] ?></strong></span>
		
	</div>
<hr>
	
<input type="submit" value="Renew" name="submit" class="w3-btn w3-theme  w3-border w3-border-teal w3-hover-white w3-hover-text-theme w3-margin">
 </form>

<br>
NOTE :Pricing includes Our software Licence Fee
<br><br>

</center>
</form>
</div>