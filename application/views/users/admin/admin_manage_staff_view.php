<div class="w3-container w3-center">


  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Manage Staff</span><br>
  <hr>
  <a href="<?= site_url('dashboard/view_staff_list') ?>" class="w3-button w3-theme  w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-center">View Staff List</a><br>
  <hr>

  <div class="">
    <?= form_open('Dashboard/search_staff') ?>
    <span class="w3-label">Search</span>

    <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
    type='search' name='firstname' value="<?= set_value(
      'firstname') ?>" placeholder='Search Staff' required></input>

<input type="submit" name="submit" value="Search" class="w3-button  w3-theme  w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>
</form></div>

<span class="w3-text-red"><?=validation_errors() ?></span>
<?=  isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:""?>
  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">Add New Staff</span><br>
  
  <hr>
  


<div class="">
  <?= form_open_multipart('Dashboard/manage_staff') ?>

  <div class="w3-center">
  <img style="width:128px;height:128px" src="<?= base_url(
    'assets/images/profiles/test.png') ?>" class=""/><br>
  <span class="w3-label">Profile Image</span><br>
  <input style="" class='w3-center w3-margin-top' style='width:50%'
   type='file'  name='profileimage'  />
 </div><br>



  <div class="w3-third">
  <span class="w3-label">FirstName</span><br>
  <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
  type='text' name='firstname' value="<?= set_value(
    'firstname') ?>" placeholder='FirstName' required></input><br>

    <span class="w3-label">Staff Mobile Number</span><br>
    <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
    type='text' name='phone' value="<?= set_value(
      'phone') ?>" placeholder='Staff Mobile Number' required></input>

</div>
<div class="w3-third">

  <span class="w3-label">LastName</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
  type='text' name='lastname' value="<?= set_value(
    'lastname') ?>" placeholder='LastName' required></input><br>

    <span class="w3-label">Staff Email</span><br>

    <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
    type='text' name='email' value="<?= set_value(
      'email') ?>" placeholder='Staff Email' required></input>


</div>

<div class="w3-third">

  <span class="w3-label">Date Of Birth</span><br>

  <input style="" class='w3-center w3-padding
  w3-margin-bottom w3-margin-top w3-light-grey'
  type='text' name='dob' value="<?= set_value(
    'dob') ?>" placeholder='26-07-1997' required></input>
<br>


<span class="w3-label">Password</span><br>

<input style="" class='w3-center w3-padding-top w3-padding-bottom
w3-margin-bottom w3-margin-top w3-teal' style='width:50%'
type='text' name='password' value="staffpass"  readonly></input>


</div>



    <select class="w3-center w3-padding-top w3-padding-bottom
    w3-margin-bottom w3-margin-top w3-light-grey" name="staff_type">
    <option disabled selected>Staff Type</option>
      <option value="Academics">Academics Staff</option>
      <option value="Non-academics">Non-Academics Staff</option>
    </select><br>
<span>The default password is <span class="w3-text-red">staffpass</span> He/She is advised to  change his/her password on first login</span>
    <br>
    <input type="submit" name="submit" value="Add Staff" class="w3-button w3-margin w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>

</div>

</div>
