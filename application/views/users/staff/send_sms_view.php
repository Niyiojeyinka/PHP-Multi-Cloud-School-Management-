<div class="w3-container w3-center">

  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Send an SMS</span><br>
  <hr>


<br><center>
  <div style="max-width: 70%;">Please Note that before your SMS can be Sent,your school head Admin /Director must approve it in his/her Dashboard <br>
<i class="fa fa-close w3-text-red"></i> --> Disapproved
<i class="fa fa-check w3-text-green"></i> --> Approved
<i class="fa fa-circle w3-text-yellow"></i> --> Pending<br>
 </div></center>
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
   </span><br> <?php echo form_open("dashboard_cont/send_sms/".empty($this->uri->segment(3))?"":$this->uri->segment(3)."/".$this->uri->segment(4)); ?>

   <h5 class="w3-label"><b>Message</b></h5><i class="w3-small">160 Max characters
   </i><br>
    <textarea  style="max-width:90%"  cols="35" rows="15" class="w3-border w3-border-teal w3-padding" name="message"
    required> <?php echo set_value("message"); ?></textarea> <br>

    <b><input type="submit" class="w3-btn w3-border w3-teal" name="submit" value="Send An SMS"/></b>
     <br>
     <br>






</div>
