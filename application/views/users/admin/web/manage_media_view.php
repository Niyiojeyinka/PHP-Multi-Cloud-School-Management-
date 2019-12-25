<div class="w3-center w3-row">
	<br>
<b class="w3-xxlarge w3-text-theme w3-margin">Media</b>
<br>
<?php
if(!empty($items))
{
	foreach ($items as $item) {
         	
         	?>
    <div  class="w3-margin-top w3-margin-bottom" style="display: inline-block;">
    	<div style="width: 300px;height:200px;">
<img style="width: 300px;height:200px;" class="w3-card-4" src="<?=base_url("assets/media/".$item['link']) ?>"/>
<div class="w3-large w3-padding"><?=$item['name'] ?></div>
<!--this invisible box hold the image link-->
<div id="img<?=$item['id'] ?>" style="display: none;"><?=base_url('assets/media/'.$item['link']) ?></div>





<span class="w3-padding-top w3-padding-bottom w3-border w3-border-teal">
<a href='<?= site_url('webfunction/confirm_delete/'.$this->uri->segment(3).'/media/'.$item['id']) ?>'><span class="w3-padding w3-border-left w3-border-teal"><i class="fa fa-trash  w3-text-red"></i></span></a>

<button onclick="copyToClipboard(document.getElementById('img<?=$item['id'] ?>').innerHTML)" class="w3-white w3-padding w3-border w3-border-teal"><i class="fa fa-copy w3-text-green"></i><i class="w3-tiny">Copy</i></button>
</span>



</div></div>
         	<?php
	}


	
	echo "<br>".$pagination;
}



?><br>
</div>
</div>

<script type="text/javascript">
function copyToClipboard(secretInfo) {
    var $body = document.getElementsByTagName('body')[0];

	var $tempInput = document.createElement('INPUT');
	$body.appendChild($tempInput);
	$tempInput.setAttribute('value', secretInfo)
	$tempInput.select();
	document.execCommand('copy');
	$body.removeChild($tempInput);
	alert("copied");
	}



</script>

