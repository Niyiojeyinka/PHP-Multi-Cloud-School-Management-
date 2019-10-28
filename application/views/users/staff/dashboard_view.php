<div class="w3-container w3-center">
	<div class="w3-row">

<div class="w3-large">
	<?=isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:"" ?>
</div>

<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>

<div class="">
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span>


</div>
<span class="w3-small">if SESSION /TERM is incorrect please inform the Admin/Director to change it accordingly</span>
<br>
<br>
<span class="w3-large w3-text-theme">UPDATE PERSONAL DETAILS</span><br>

			<?= form_open_multipart("staff/process_profile_image") ?>
<div>
	

  <div class="w3-center w3-margin">
  <img style="width:128px;height:128px" src="<?php 
if(empty($staff['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$staff['profile_img']);

}
?>" class="w3-circle w3-margin" /><br>
  <span class="w3-label w3-margin">Profile Image</span><br>
  <input style="" class='w3-center w3-margin-top' style='width:50%'
   type='file'  name='profileimage'  />
 </div><br>
<input type="submit" name="submit" class="w3-button w3-teal w3-hover-text-teal w3-hover-white w3-border w3-border-teal w3-margin" value="U
pload Image">
</div>
</form>

Note :this maybe used for your IDCARD
</div>