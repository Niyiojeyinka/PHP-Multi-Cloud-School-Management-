<div style="background-image: url(<?= base_url('assets/images/student.jpeg')
 ?>); background-size: 100% 100%;" class="w3-container w3-padding-xlarge">


  <div class=""><br><br>

    <form class='w3-center w3-margin-top' method='POST' action='<?php echo site_url('login'); ?>'>
 <h4 class='w3-text-teal'><b>Sign In</b></h4>

 <div class='w3-text-red'><?php echo validation_errors();
 if(isset($_SESSION['err_msg']))
 {

  echo $_SESSION['err_msg'];

 }
  ?></div>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-phone
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='tel' name='phone' placeholder='Phone Number'/>
 </div>

 <br>

 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-unlock-alt
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='password' name='password' placeholder='Password'/>
 </div>



 <input class='w3-center w3-button w3-teal w3-margin-top w3-margin-bottom w3-hover-opacity' type='submit' name='submit' value='Sign In'/>


</form>

 </div>

 <center>
    <div class="w3-text- w3-small w3-margin-bottom w3-margin-bottom">Don't have account yet? <span class="w3-text-theme"><?php
 echo "<a href='";
 echo site_url('register');
 echo "'>Create New Account Here</a>";

      ?></span></div>
 </center>

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
      <span class="w3-xlarge w3-margin-left w3-padding w3-border w3-border-black w3-round-large"><b>Gettew</b></span>
 		<p class="w3-small">Copyright © Gettew - All rights reserved,  <a href="http://Pryper.com">Gettew.com</a></p>

 </footer>

</div>


 </body>
 </html>
