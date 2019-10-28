<div class="w3-container w3-padding w3-center">
<form>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> 

   <!--test <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
   Click the Button Below to Pay<br>
    <button class="w3-button w3-teal w3-margin w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-small" type="button" onClick="payWithRave()">Pay NGN<?=$amount ?></button>
</form>

<script>
    const API_publicKey = "FLWPUBK-138f8c0788df44adebd30c9d23971361-X";//live
    
    //const API_publicKey = "FLWPUBK-d4bc12d79e9a779c85e8825f87451df9-X";//test

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?= $user['email'] ?>",
            customer_firstname: "<?= $user['firstname'] ?>",
            customer_lastname: "<?= $user['lastname'] ?>",
            amount: <?= $amount_to_pay ?>,
            customer_phone: "<?= $user['phone'] ?>",
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
          window.location.assign('<?=site_url('Gettew_dashboard/confirm_pay_payment') ?>')
        } else {
            // redirect to a failure page.
          window.location.assign('<?=site_url('Gettew_dashboard/fund_account') ?>')

        }

        x.close(); // use this to close the modal immediately after payment.
    }
        });
    }
</script>


<!--card ends here-->


</div>