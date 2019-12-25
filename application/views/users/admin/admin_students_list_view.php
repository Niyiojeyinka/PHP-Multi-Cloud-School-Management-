<?php
if ($this->uri->segment(1) =="staff") {
  $controller = "staff";
}else{
    $controller = "dashboard";

}


?><!--

<div class="w3-center">
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
</div>

--><div class="w3-container w3-center">
<br>
	<span class="w3-center w3-text-blue-grey
	w3-xlarge"> Students List</span>
	<br>
<div>
	


  <div class="">
    <?= form_open($controller.'/search_students') ?>
    <span class="w3-label">Search</span>

    <input style="" class='w3-center w3-padding-top w3-padding-bottom
    w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
    type='search' name='search' value="<?= set_value(
      'firstname') ?>" placeholder='Search by Reg No,LastName' required></input>

<input type="submit" name="submit" value="Search" class="w3-button w3-teal"/>
</form></div>


<br>

<div  class="w3-margin-top w3-margin-bottom" style="display: inline-block;"><?php

if(!empty($items))
{

foreach ($items as $item) {

//edit this later


?>
<a href='<?= site_url($controller.'/student_details/'.$item['student_id'])?>'>
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
</div></a>

<?php
 
echo "";
}


echo "<div>".$pagination."</div>";



}else{

echo "No Students found";


}

?>
</div>


</div>


</div>