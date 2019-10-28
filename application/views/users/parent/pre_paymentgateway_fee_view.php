<div class="w3-container w3-center"> 
<div class="w3-center">
	<h3 class="w3-xlarge w3-text-teal">FEES</h3>
<br>

<h4 class="w3-xlarge w3-text-teal"><?=$school['name'] ?></h4>
<br>

<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>

<div class="w3-container w3-center">
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span>
       <span class="">Class</span>
<br>
     <span class="w3-large w3-text-theme "><?=$child_level['level_name'] ?></span>
    <center>
     <table style="max-width: 60%;" class="w3-table w3-striped w3-center">
<tr class="w3-text-teal"><td><b>FEE TITLE</b></td><td><b>Amount(NGN)</b></td></tr>
<div class="">
	<?php
	$total_fee=0;
if (!empty($payable_fees)) {
	foreach ($payable_fees as $fee) {
		
echo "<tr><td>".$fee['fee_title']."</td><td>".$fee['amount']."</td></tr>";

		$total_fee = $total_fee+$fee['amount'];
	}
echo "<tr><td><b>Total</b></td><td><b>".$total_fee.".00</b></td></tr>";
?>
<?php

}else{
	echo "School is yet to set fee for this SESSION/TERM please contact the school to set fee";
}

	?>
	

</table></center>

<form>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> 

   <!--test <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
    <button class="w3-button w3-teal w3-margin w3-hover-white w3-hover-text-teal w3-border w3-border-teal" type="button" onClick="payWithRave()">Pay NGN<?=$amount_to_pay." Out Of NGN".$this->input->post('total_amount') ?></button>
</form>

<script>
    const API_publicKey = "FLWPUBK-138f8c0788df44adebd30c9d23971361-X";//live
    
    //const API_publicKey = "FLWPUBK-d4bc12d79e9a779c85e8825f87451df9-X";//test

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?= $school['email'] ?>",
            customer_firstname: "<?= $child['firstname'] ?>",
            customer_lastname: "<?= $child['lastname'] ?>",
            amount: <?= $total_fee ?>,
            customer_phone: "<?= $parent['phone'] ?>",
            currency: "<?='NGN'//$currency_code ?>",
            txref: "<?php 
    echo $ref;
     ?>",
    onclose: function() {},
    callback: function(response) {
        var txref = response.tx.txRef; // collect txRef returned and pass to a          server page to complete status check.
        console.log("This is the response returned after a charge", response);
        if (
            response.tx.chargeResponseCode == "00" ||
            response.tx.chargeResponseCode == "0"
        ) {
            // redirect to a success page
          window.location.assign('<?=site_url('parents/confirm_pay_payment') ?>')
        } else {
            // redirect to a failure page.
          window.location.assign('<?=site_url('parents') ?>')

        }

        x.close(); // use this to close the modal immediately after payment.
    }
        });
    }
</script>

</div>

</div>






</div>



</div>