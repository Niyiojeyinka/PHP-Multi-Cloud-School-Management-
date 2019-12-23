<?php
if ($this->uri->segment(1) =="staff") {
  $controller = "staff";
}else{
    $controller = "gettew_dashboard";

}


?>


<div class="w3-container w3-center">


  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Manage Students</span><br>
  

  <div class="">
    <?= form_open($controller.'/search_students') ?>
    <span class="w3-label">Search</span>

    <input style="" class='w3-center w3-padding-top w3-padding-bottom
    w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
    type='search' name='search' value="<?= set_value(
      'firstname') ?>" placeholder='Search by Reg No,LastName' required></input>

<input type="submit" name="submit" value="Search" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>
</form></div>
<hr>
  <a href="<?= site_url($controller.'/view_students_list') ?>" class="w3-button w3-theme  w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-center">View Student List</a><br>
 
  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">Add New Students</span><br>
 

  <hr>
  


<div class="">
  <?= form_open_multipart($controller.'/manage_students') ?>

  <div class="w3-center">
  <img style="width:128px;height:128px" src="<?= base_url(
    'assets/images/profiles/test.png') ?>" class="w3-circle"/><br>
    <?php

echo validation_errors();


    ?>
  <span class="w3-label">Profile Image</span><br>
  <input style="" class='w3-center w3-margin-top' style='width:50%'
   type='file' name='profileimage'  />
 </div><br>



  <div class="w3-third">
  <span class="w3-label">FirstName</span><br>
  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='firstname' value="<?= set_value(
    'firstname') ?>" placeholder='FirstName' required></input><br>

   
  <span class="w3-label">Date Of Birth</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='dob' value="<?= set_value(
    'dob') ?>" placeholder='26-07-1997' required></input>
<br>
   
<br>


  <span class="w3-label w3-margin">Student Default Password</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='student_password' value="depass" disabled></input>

</div>
<div class="w3-third">

  <span class="w3-label">Middle Name</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='middle_name' value="<?= set_value(
    'middle_name') ?>" placeholder='Middle Name' required></input><br>

     <span class="w3-label">Admission Date</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='admission_date' value="<?= set_value(
    'admission_date') ?>" placeholder='26-07-1997' required></input>
<br>

  <span class="w3-label">Student Home Address</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='student_address' value="<?= set_value(
    'student_address') ?>" placeholder='Student Home Address' required></input>
<br>

</div>

<div class="w3-third">

<span class="w3-label">Surname</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin w3-light-grey' style='width:50%'
  type='text' name='lastname' value="<?= set_value(
    'lastname') ?>" placeholder='Surname' required></input><br>
<!--here-->

<span class="w3-label">Parent/Guardian Mobile Number</span><br>

<input style="" class='w3-center w3-padding
w3-margin w3-light-grey' style='width:50%'
type='text' name='p_mobile_1' value="<?= set_value(
  'p_mobile_1') ?>" placeholder='Parent Mobile Number' required></input>

<br>

<!--class field here-->
   <span class="w3-label">Class/Level</span><br>
   <select class="w3-padding w3-margin" name="class_level">
    <option disabled selected>Please Select Class</option>
   <?php

foreach ($levels as $level) {

echo "<option value='".$level['level']."'>".$level['level_name']."</option>";

}
echo "</select>";

   ?>

<br>
</div></div>

</div>
<div class="w3-center">
  <br>

       <span class="w3-label">Option</span><br>
   <select class="w3-padding w3-margin" name="option">
    <option value="">Not Applicable</option>
   <?php

foreach ($options as $option) {
echo "<option value='".$option."'>".$option."</option>";
}
echo "</select>";

   ?>

<br><br>
<input type="radio" class="w3-radio" name="gender" value="Male"> Male
<input type="radio" class="w3-radio" name="gender" value="Female"> Female
</div>
<div class="w3-small w3-text-theme w3-center">The default password is <span class="w3-text-red">depass</span> Students Should be required to change their Password
<br>
The default password is <span class="w3-text-red">parentpass</span> Parents Should be required to change their Password.The parent phone number will  be required for parent to log in to the parent dashboard
<br>
    <input type="submit" name="submit" value="Add Student" class="w3-button w3-margin w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>
</div></form>

</div>

</div>
