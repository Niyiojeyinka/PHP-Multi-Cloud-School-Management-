<!--

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
	w3-xlarge">Search Students</span>
	<br>
<div>
	


  <div class="">
    <?= form_open('Gettew_Dashboard/search_students') ?>
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
<a href='<?= site_url('Gettew_Dashboard/student_details/'.$item['student_id'])?>'>
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
 /*
echo "<div class='w3-container w3-border w3-padding w3-margin'>";
 echo "<a href='".site_url('Gettew_Dashboard/student_details/'.$item['student_id'])."'>";
echo $item['firstname']." ".$item['lastname']." <br>";
echo "</a>";
echo "<span class='w3-small'>Last Seen:";
echo " ".date( "F j, Y, g:i a",$item["lastlog"]);
echo "</span><br>";
echo "<div class='w3-text-blue'><a href='".site_url('admin/send_msg/'.$item['id'])."'>Send Parent SMS</a>   <a href='".site_url('admin/email/'.$item['id'])."'>Email</a>  <a href='".site_url('admin/suspend/'.$item['id'])."'>Send Parent Email</a></div>";
echo "</div>";
*/
echo "";
}


echo "<div>".$pagination."</div>";



}else{

echo "No Student with Given Name";


}

?>
</div>


</div>


</div>