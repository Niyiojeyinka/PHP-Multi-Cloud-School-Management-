<?php
if ($this->uri->segment(1) =="staff") {
  $controller = "staff";
}else{
    $controller = "gettew_dashboard_cont";

}


?>
<div class="w3-container w3-center w3-white">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center">Student Details</span><br>
<?php
if(isset($_SESSION['action_status_report']))
{

  echo "<hr>".$_SESSION['action_status_report'];
}

?><i class="w3-text-red"><?=validation_errors()?></i>
<hr>
<div class="w3-container w3-margin w3-card w3-padding-xlarge">
<div class="w3-col s12 m3 l3 w3-center">
	<div class="w3-margin-top w3-padding-top">
		<br>
<a href="<?=site_url("/idcard/check_pay_fees/".$student['student_id'])?>" class="w3-block w3-button w3-margin w3-teal w3-round-large w3-hover-white w3-border w3-border-teal w3-hover-text-teal">Check Payments Activities</a>

<a href="<?=site_url($controller."/send_sms/parent/".$student['parent_id']) ?>" class="w3-block w3-button w3-margin w3-teal w3-round-large w3-hover-white w3-border w3-border-teal w3-hover-text-teal">Send Parent SMS</a>
<!--<a href="<?=site_url("gettew_dashboard_cont/send_sms/staff/") ?>" class="w3-block w3-button w3-margin w3-teal w3-round-large w3-hover-white w3-border w3-border-teal w3-hover-text-teal">Send Teacher an SMS</a>-->



</div>
	
</div>


<div class="w3-col s12 m9 l9 w3-center">
<div class="w3-center w3-padding-xlarge">
<img style="width:128px;height:128px" src="<?php 
if(empty($student['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$student['profile_img']);

}
?>" class="w3-circle"/>
</div><br>

<div class="w3-serif w3-large w3-text-theme"><?= ucfirst($student['firstname'])."  ".ucfirst($student['lastname']) ?></div>
<br>
<div class="w3-container">

<div class="w3-half w3-san-serif">
	<div class="w3-large">
		
<span class="w3-margin-right"><b>First Name</b></span>
	<span class="w3-margin-left"><?= $student['firstname'] ?></span><br>
<br>
<span class="w3-margin-right"><b>Middle Name</b></span>
	<span class="w3-margin"><?= $student['middlename'] ?></span>		<br><br>
<span class="w3-margin"><b>Surname</b></span>
	<span class="w3-margin"><?= $student['lastname'] ?> </span><br><br><span class="w3-margin"><b>Gender</b></span>
	<span class="w3-margin"><?= $student['gender'] ?> </span>
	<br><br>

<span class=""><b>Complexion</b></span>
	<span class=""><i class=""><?= $student['complexion'] ?></i> </span>
</div>


</div>
<div class="w3-half w3-san-serif">
	<div class="">
			
<span class=""><b>Class</b></span>
	<span class=""><?= $student['class']['level_name'] ?> (<?= $student['class']['level_shortname'] ?>)</span><br>
<br>
<span class=""><b>Student ID</b></span>
	<span class=""><b class="w3-text-theme"><?= $student['student_id'] ?></b> </span>

<br><br>
<span class=""><b>Date Of Birth</b></span>
	<span class=""><b class=""><?= $student['dob'] ?></b> </span>
<br><br>
<span class=""><b>Admission Date</b></span>
	<span class=""><i class=""><?= $student['admission_date'] ?></i> </span>

	<br><br>

<span class=""><b>Genotype</b></span>
	<span class=""><i class=""><?= $student['genotype'] ?></i> </span>

	<br><br>

<span class=""><b>Blood group</b></span>
	<span class=""><i class=""><?= $student['blood_group'] ?></i> </span>
</div>



</div>
<a href="<?=site_url($controller.'/promote_student/'.$this->uri->segment(3)) ?>" class="w3-btn w3-green">Promote</a>
<a href="<?=site_url($controller.'/demote_student/'.$this->uri->segment(3)) ?>" class="w3-btn w3-red">Demote</a>


</div></div>
</div>




</div>