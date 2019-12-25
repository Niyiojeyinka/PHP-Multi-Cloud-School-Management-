<div>
<center>
	<hr>
<b class='w3-text-theme w3-large'>Upgrade Account</b>


<div class="w3-padding-jumbo">
	<?= form_open('dashboard/upgrade_account')?>
	<?=isset($_SESSION['action_status_report'])?$_SESSION['action_status_report']:"" ?>
	
<hr>

	<div class="">
<input type="radio" name="domain" value="com" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-blue w3-margin"><strong>.com</strong></span> Package

<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN15,000</strong></del></span>
		<span class="w3-large w3-text-red w3-margin"><strong>NGN10,000</strong></span>
	</div>
<hr>
	<div class="">
<input type="radio" name="domain" value="net" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-blue-gray w3-margin"><strong>.net</strong></span> Package

<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN15,000</strong></del></span>
		<span class="w3-large w3-text-red w3-margin"><strong>NGN10,000</strong></span>
	</div>
<hr>
	<div class="">
<input type="radio" name="domain" value="org" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-teal w3-margin"><strong>.org</strong></span> Package

<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN15,000</strong></del></span>
		<span class="w3-large w3-text-red w3-margin"><strong>NGN10,000</strong></span>
	</div>
<hr>
<div class="">
	<input type="radio" name="domain" value="com.ng" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-red w3-margin"><strong>.com.ng</strong></span> Package
<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN10,000</strong></del></span>

		<span class="w3-large w3-text-red w3-margin"><strong>NGN5,000</strong></span>
	</div>
<hr>

<div class="">
	<input type="radio" name="domain" value="org.ng" class="w3-radio w3-xlarge"/>

		<span class="w3-xxlarge j w3-text-indigo w3-margin"><strong>.org.ng</strong></span> Package
<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN10,000</strong></del></span>

		<span class="w3-large w3-text-red w3-margin"><strong>NGN5,000</strong></span>
	</div>
<hr>
<div class="">
	<input type="radio" name="domain" value="sch.ng" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-purple w3-margin"><strong>.sch.ng</strong></span> Package

<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN10,000</strong></del></span>
		<span class="w3-large w3-text-red w3-margin"><strong>NGN5,000</strong></span>
	</div>
<hr>

<div class="">
	<input type="radio" name="domain" value="ng" class="w3-radio w3-xlarge w3-blue"/>

		<span class="w3-xxlarge j w3-text-green w3-margin"><strong>.ng</strong></span> Package
<span class="w3-large w3-text-gray w3-margin"><del><strong>NGN25,000</strong></del></span>
		<span class="w3-large w3-text-red w3-margin"><strong>NGN20,000</strong></span>
	</div>
<hr>
</div>
<input type="submit" name="submit" class="w3-btn w3-theme  w3-border w3-border-teal w3-hover-white w3-hover-text-theme w3-margin">
 </form>

<br>
NOTE :Pricing includes Our software Licence Fee
<br><br>

</center>
</form>
</div>