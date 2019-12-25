<div style="<?php 
if(!$this->agent->is_mobile())
{
echo "height:100vh;";
}

 ?> overflow-y: scroll;" class="w3-white w3-col m10 l10">
<div style="background-color:rgb(95, 95, 95);position: ;" class="w3-bar w3-padding w3-cell-row">
    <b class="w3-cell w3-left w3-margin-left w3-text-white">
      <a class="w3-button" href="<?php if(isset($_SERVER['HTTP_REFERER']))
      {
        echo $_SERVER['HTTP_REFERER'];
      } ?>">
  <i class="fa fa-long-arrow-left"></i>Back</a></b>


    <div class="w3-right w3-small"> 
   
              <a href="<?php //echo base_url('assets/images/
  //profiles/'.$user_details['profile_img']); ?>" class="w3-bar-item
   w3-margin-left w3-margin-right w3-text-white w3-btn w3-theme w3-right">
  <i class="fa fa-info"></i> Help</a>
  <form style="display: inline-block;" action="<?= site_url("dashboard/process_nav_search") ?>" method="post">
  <!--<input type="search" name="search" class="w3-padding" placeholder="Search"/>-->
  <select name="context" class="w3-padding">
    <option selected disabled>Select Context</option>
    <option value="Staff">Staff</option>
        <option value="Students">Student</option>

  </select>
  <button type="submit" class="w3-padding w3-btn w3-teal" name="Search">
  <i class="fa fa-search"></i></button>
</form>
      </div>

</div>
