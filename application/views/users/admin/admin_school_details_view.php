<div class="w3-container w3-center"><br>
<hr>
<span class="w3-text-teal w3-xlarge">School Details</span>
<?= form_open_multipart('gettew_Dashboard/edit_school_details') ?>
<hr>
<div class="w3-center">
<img style="width:128px;height:128px" src="<?php 
if($school['profile_img'] == NULL)
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$school['profile_img']);

}
?>" class=""/>
</div><br>
<span class="w3-label">School Logo</span><br>
<input style="" class='w3-center w3-margin-top' style='width:50%'
 type='file' name='schoollogo'  />

<hr>
<div class="w3-container input-grid-container">
<div class="w3-quarter">
  <span class="w3-label">School Name</span>
  <input style="" class='w3-center w3-padding-top w3-padding-bottom
  w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
  type='text' name='schoolname' value="<?= $school['name'] ?>" placeholder="School Name" readonly/>

</div>
<div class="w3-quarter">
  <span class="w3-label">School Address</span>

  <input style="" class='w3-center w3-padding-top w3-padding-bottom
   w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
  type='text' name='schooladdress' value="<?= $school['address'] ?>" placeholder="School Address" readonly/>

</div>
<div class="w3-quarter">
  <span class="w3-label">School Mobile Number</span>

  <input style="" class='w3-center w3-padding-top w3-padding-bottom
  w3-margin-bottom w3-margin-top' style='width:50%'
  type='tel' name='schoolphone' value="<?= $school['phone'] ?>" placeholder='School Mobile Number' required/>

</div>
<div class="w3-quarter">
  <span class="w3-label">School Email</span>

  <input style="" class='w3-center w3-padding-top w3-padding-bottom
   w3-margin-bottom w3-margin-top' style='width:50%'
  type='text' name='schoolemail' value="<?= $school['email'] ?>" placeholder='School Email' required/>

</div></div>

<input id="submitbtn" type="submit" class="w3-button w3-theme" name="submit"
value="Update Data"/><br><br>
</form>
<i class="w3-small w3-text-grey">NOTE:Those in grey colour can only be change by sending a message to us using the Contact Us Link<i>


</i></i></div>