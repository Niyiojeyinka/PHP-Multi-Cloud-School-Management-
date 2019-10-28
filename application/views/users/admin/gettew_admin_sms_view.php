<?php
if ($this->uri->segment(1) =="staff") {
  $controller = "staff";
}else{
    $controller = "gettew_dashboard_cont";

}


?><div class="w3-container w3-center">

  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Send an SMS</span><br>
  <hr>



   <span class="w3-text-pink">

   <?php echo validation_errors()."<br>"; ?></span>
   <span class="w3-text-pink">
   </span><br><span class="w3-text-green">
   <?php
      if( isset($_SESSION['action_status_report']))
      {
       echo $_SESSION['action_status_report'];

      }
       ?>
   </span><br> <?php echo form_open($controller."/send_sms/".empty($this->uri->segment(3))?"":$this->uri->segment(3)."/".$this->uri->segment(4)); ?>
   <h5 class="w3-label">Sender Name(<span class="w3-tiny">Max 10 characters</span>)</h5>
    <input  style="max-width:90%" type="text" id="cinput" class="w3-border w3-border-teal w3-padding"
     name="name" value="School Name" size="25" required/> <br>
    
<?php
if(empty($this->uri->segment(3)))
{


?>



     <h5 class="w3-label">Receiver(s)</h5>

         <select class="w3-center w3-padding-top w3-padding-bottom
         w3-margin-bottom w3-margin-top w3-light-grey" onchange="showClassSelect(this.value)" name="receiver_type">
           <option value="Parents">Parents/Guardians</option>
          <option value="All_staff">All Staff</option>
           <option value="Academics">Academics Staff</option>
           <option value="Non-academics">Non-Academics Staff</option>
           <option value="parent_of">Parents Of Students In:</option>
           <option value="specify">Specify Number</option>

         </select>
         
<?php

}
?>
<div style="display: none;" id="class_level" class="w3-center" >
  
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
</div>
<div id="specify_div" class="" style="display: none;">
  <span class="w3-label">Phone Number</span><br>
<input type="text" name="phone" class="w3-padding">
</div>
<script type="text/javascript">
  function showClassSelect(value){
    if (value == "parent_of" )
    {
      //show the div
      document.getElementById('class_level').style.display ="block";
document.getElementById('specify_div').style.display ="none";

    }else if(value == "specify") {

   //show the div
      document.getElementById('specify_div').style.display ="block";
      document.getElementById('class_level').style.display ="none";

    }else{
      //hide
       document.getElementById('class_level').style.display ="none";
      document.getElementById('specify_div').style.display ="none";

    }

  }


</script>
   <h5 class="w3-label"><b>Message</b></h5><i class="w3-small">160 Max characters
   </i><br>
    <textarea  style="max-width:90%"  cols="35" rows="15" class="w3-border w3-border-teal w3-padding" name="message"
    required> <?php echo set_value("message"); ?></textarea> <br>

    <b><input type="submit" class="w3-btn w3-border w3-teal" name="submit" value="Send An SMS"/></b>
     <br>
     <br>






</div>
