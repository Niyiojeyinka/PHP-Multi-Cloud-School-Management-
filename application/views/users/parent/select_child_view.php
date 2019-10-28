<div class="w3-container w3-center"> 
<div>
	<h4 class="w3-xlarge w3-text-teal">Select Beneficiary</h4>
<br>
<?php
if (!empty($children)) {

foreach ($children as $item) {
	?>
<a href='<?= site_url('parents/pay_fees/'.$item['student_id'])?>'>
<div class="w3-card-4 w3-margin w3-padding-large" style="width: 300px;height:auto;display: inline-block;">

<img style="width:128px;height:128px" src="<?php 
if(empty($item['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$item['profile_img']);

}
?>" class="w3-circle"/><br><br>
<span class="w3-text-theme w3-large w3-margin"><?=ucfirst($item['firstname']." ".$item['middlename']." ".$item['lastname']) ?></span>
<br>
<?php
switch ($this->uri->segment(2)) {
	case 'pay_fees':
		$text = 'Pay Fees';
		$slug = "pay_fees";
		break;
case 'manage_payments':
		$text = 'View Payments';
	    $slug = "manage_payments";

		break;
	case 'check_results':
		$text = 'Check Results';
		$slug = "check_results";

		break;
		
}


?>

<a class="w3-button w3-border w3-border-teal w3-text-teal w3-hover-teal w3-hover-text-white" href='<?= site_url('parents/'.$slug.'/'.$item['student_id'])?>'><?=$text ?></a>
</div></a>

	<?php
}
}else{

	echo "No child Found";
}

?>
</div>



</div>