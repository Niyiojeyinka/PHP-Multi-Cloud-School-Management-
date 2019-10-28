<div class="w3-padding-xlarge w3-margin-bottom w3-teal w3-center w3-top w3-border w3-border-white">
<span class="w3-xlarge"><b> <span class='w3-small'>Parents' Dashboard</span></b></span>

<a class="w3-button w3-left w3-white w3-text-teal w3-margin w3-small" href="<?= base_url('parents') ?>">
  <i class="fa fa-home"></i>Home</a>

<a class="w3-button w3-white w3-text-teal w3-margin w3-small" href="<?php if(isset($_SERVER['HTTP_REFERER']))
      {
        echo $_SERVER['HTTP_REFERER'];
      } ?>">
  <i class="fa fa-long-arrow-left"></i>Back</a>
</div><br><br><br><br>
 
	