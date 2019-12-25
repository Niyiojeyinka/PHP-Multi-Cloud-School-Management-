
<div class="w3-container w3-center w3-white">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center">CBT Software Request</span><br>
<?php
if(isset($_SESSION['action_status_report']))
{

  echo "<hr>".$_SESSION['action_status_report'];
}
?><i class="w3-text-red"><?=validation_errors()?></i>
<hr>
<?= form_open("dashboard/cbt_application_form") ?>

<span class="w3-label">Address</span><br>
<input type="text" name="address" class="w3-padding w3-margin" />
<br>
<span class="w3-label">Mobile Number</span><br>
<input type="text" name="phone" class="w3-padding w3-margin" />
<br>
<span class="w3-label">Estimated Number Of Students</span><br>
<select class="w3-padding" name="plan" onclick="showPriceDiv(this.value)">
	<option disabled selected>Number of Students</option>
		<option value="500">less than 500</option>
		<option value="1000">less than 1000</option>

		<option value="unlimited">Unlimited Plan</option>

</select><br>
<script type="text/javascript">
	function showPriceDiv(value) {
		if (value =="500") {
document.getElementById('product_details_div_1').style.display = "block";
		}else if(value =="1000"){
document.getElementById('product_details_div_2').style.display = "block";
		}else if(value =="unlimited"){
document.getElementById('product_details_div_3').style.display = "block";
		}
	}


</script>
<!--10k,20k,65k-->
    
    <div class="w3-margin" id="product_details_div_1" style="display: none;">
    	Unlimited Questions<br>
    	FREE Setup<br>
    	Inbuilt Calculator<br>
    	Bulk Question Upload<br>
    	Suitable for Students Less than 500<br>
    	<span class="w3-padding w3-margin-top w3-tag w3-red w3-round-jumbo">NGN20,000</span>
    	


    </div>
     <div class="w3-margin" id="product_details_div_2" style="display: none;">
    	Unlimited Questions<br>
    	FREE Setup<br>
         Inbuilt Calculator<br>
    	Bulk Question Upload<br>
    	Suitable for Students Less than 1,000<br>
    	<span class="w3-padding w3-margin-top w3-tag w3-red w3-round-jumbo">NGN40,000</span>
    	


    </div> <div class="w3-margin" id="product_details_div_3" style="display: none;">
    	Unlimited Questions<br>
    	FREE Setup<br>
    	 Inbuilt Calculator<br>
    	Bulk Question Upload<br>
    	Suitable for Unlimited Number of Students<br>
    	<span class="w3-padding w3-margin-top w3-tag w3-red w3-round-jumbo">NGN80,000</span>
    	


    </div>
<input type="submit" name="submit" value="Request" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin">
</form>
<hr>



</div>