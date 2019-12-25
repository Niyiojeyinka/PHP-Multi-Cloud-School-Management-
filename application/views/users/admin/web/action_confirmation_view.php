<div class="w3-center w3-row w3-center">
	<div class="w3-col l9">
<div class="w3-margin w3-adding">

	<span>Do you really want to perform this Action?</span><br>
<a class="w3-button w3-margin w3-theme w3-hover-white w3-border w3-border-theme w3-hover-text-teal" style="text-decoration: none;" href="<?php if(isset($_SERVER['HTTP_REFERER']))
      {
        echo $_SERVER['HTTP_REFERER'];
      } ?>">
  <i class="fa fa-long-arrow-left"></i>Cancel</a>
  <a class="w3-button w3-margin w3-red w3-hover-white w3-border w3-border-red w3-hover-text-red" style="text-decoration: none;" href="<?= site_url('webfunction/delete_item/'.$address_id.'/'.$item_type.'/'.$id) ?>">
  <i class="fa fa-trash"></i> Delete</a>
 
</div>
</div>
</div>