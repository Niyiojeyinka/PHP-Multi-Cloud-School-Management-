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
<div class="w3-container">	


<form>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> 

   <!--test <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
   Click the Button Below to Pay<br>
    <button class="w3-button w3-teal w3-margin w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-small" type="button" onClick="payWithRave()">Pay NGN<?=$amount_to_pay." Out Of NGN".$this->input->post('total_amount') ?></button>
</form>
</div>
<script>
    const API_publicKey = "FLWPUBK-138f8c0788df44adebd30c9d23971361-X";//live
    
    //const API_publicKey = "FLWPUBK-d4bc12d79e9a779c85e8825f87451df9-X";//test

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?= $school['email'] ?>",
            customer_firstname: "<?= $child['firstname'] ?>",
            customer_lastname: "<?= $child['lastname'] ?>",
            amount: <?= $amount_to_pay ?>,
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
          window.location.assign('<?=site_url('idcard/confirm_pay_payment/'.$this->input->post('student_id')) ?>')
        } else {
            // redirect to a failure page.
          window.location.assign('<?=site_url('idcard/pay_fees/'.$this->input->post('student_id')) ?>')

        }

        x.close(); // use this to close the modal immediately after payment.
    }
        });
    }
</script>


<!--card ends here-->
</div>




</div>

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

