
<div class="w3-container w3-center w3-white">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center">Staff Details</span><br>
<?php
if(isset($_SESSION['action_status_report']))
{

  echo "<hr>".$_SESSION['action_status_report'];
}
if(validation_errors() != NULL)
{
echo '<hr><i class="w3-text-red">'.validation_errors().'</i>';
}
?>
<hr>
<div class="w3-container w3-margin w3-card w3-padding-xlarge">



<div class="w3-center w3-padding-xlarge">
<img style="width:128px;height:128px" src="<?php 
if(empty($staff['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$staff['profile_img']);

}
?>" class="w3-circle"/>
</div><br>

<div class="w3-serif w3-large w3-text-theme"><?= ucfirst($staff['firstname'])."  ".ucfirst($staff['lastname']) ?></div>
<br>
<div class="w3-container">

<div class="w3-half w3-san-serif">
	<div class="w3-large">
		
<span class="w3-margin-right"><b>First Name</b></span>
	<span class="w3-margin-left"><?= $staff['firstname'] ?></span><br>
<br>

<span class="w3-margin"><b>Surname</b></span>
	<span class="w3-margin"><?= $staff['lastname'] ?> </span><br><br><span class="w3-margin"><b>Gender</b></span>
	<span class="w3-margin"><?= $staff['gender'] ?> </span>
	<br><br>

</div>


</div>
<div class="w3-half w3-san-serif">
	<div class="">
			

<span class=""><b>staff ID</b></span>
	<span class=""><b class="w3-text-theme"><?= $staff['staff_id'] ?></b> </span>

<br><br>
<span class=""><b>Date Of Birth</b></span>
	<span class=""><b class=""><?= $staff['dob'] ?></b> </span>
<br><br>


<span class=""><b>Complexion</b></span>
	<span class=""><i class=""><?= $staff['complexion'] ?></i> </span>
</div>



</div>


</div>

<a href="<?=site_url("dashboard_cont/send_sms/staff/".$this->uri->segment(3)) ?>" class="w3-btn w3-green">Send SMS</a>
<a href="<?=site_url('webfunction/confirm_delete/na/staff/'.$this->uri->segment(3)) ?>" class="w3-btn w3-red">Delete <i class="w3-text-white fa fa-trash"></i></a>

</div>




</div>