<div style="background-image: url(<?= base_url('assets/images/carryingcard.png')
 ?>); background-size: 100% 100%;" class="w3-container">


 <div class="w3-container w3-card-8 w3-center">

 <br>
 <span class="w3-text-teal w3-xlarge">Contact Us</span>

 <span class="w3-text-pink">

 <?php echo validation_errors(); ?></span><br>
 <span class="w3-text-pink">
 </span><br><span class="w3-text-green">
 <?php
    if( isset($_SESSION['action_status_report']))
    {
     echo $_SESSION['action_status_report'];

    }
     ?>
 </span><br> <?php echo form_open('page/contact_us'); ?>
 <h5 class="w3-label">Name</h5>
  <input type="text" class="w3-border w3-border-teal w3-padding w3-round"
   name="name" value="<?php echo set_value("name"); ?>"  required/> <br>


 <h5 class="w3-label">Email</h5>
  <input   type="text" class="w3-border w3-border-teal w3-padding w3-round"
   name="email" value="<?php echo set_value("email"); ?>"  required/> <br>
<!--
 <h5 class="w3-label">Message Title</h5>
  <input  type="text" class="w3-border w3-border-teal w3-padding w3-round"
  name="title" value="<?php echo set_value("title"); ?>"  required/> <br>--->



 <h5 class="w3-label"><b>Message</b></h5>
  <textarea  style="max-width:90%"  cols="35" rows="15" class="w3-border w3-border-teal w3-padding w3-round" name="message"
  required> <?php echo set_value("message"); ?></textarea> <br>

  <b><input type="submit" class="w3-btn w3-border w3-teal" name="submit" value="Send"/></b>
   <br>
   <br>




 </div>

 <!-- Footer start here -->
 <footer class="w3-container w3-padding-32 w3-center w3-xlarge">
   <div class="w3-section">
     <i class="fa fa-facebook-official w3-hover-opacity"></i>
     <i class="fa fa-twitter w3-hover-opacity"></i>
     <i class="fa fa-github w3-hover-opacity"></i>
     <i class="fa fa-android w3-hover-opacity"></i>
     <i class="fa fa-windows w3-hover-opacity"></i>
     <i class="fa fa-apple w3-hover-opacity"></i>
     <i class="fa fa-globe w3-hover-opacity"></i>

      </div>
               <span class="w3-xlarge w3-margin-left w3-padding"><b>Gettew</b></span>
 		<p class="w3-small">Copyright © Gettew - All rights reserved,  <a href="http://Gettew.com">Gettew.com</a></p>

 </footer>


 </body>
 </html>



</div>
