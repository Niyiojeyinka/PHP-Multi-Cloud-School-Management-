<div style="background-image: url(<?= base_url('assets/images/slider3.jpg')
 ?>); background-size: 100% 100%;margin-top:60px" class="w3-container">


  <div class=""><br>

    <form class='w3-center' method='POST' action='<?php echo
    site_url('register'); ?>'>
 <h4 class='w3-text-teal'><b>Registration</b></h4>

 <div class='w3-text-red'><?php echo validation_errors();
 if(isset($_SESSION['err_msg']))
 {

  echo $_SESSION['err_msg'];

 }
  ?></div>

   <div class='w3-row'>
       <i  style='margin-right:3%' class="fa fa-building-o
        w3-large w3-text-teal w3-center"></i>
        <input class='w3-center w3-padding' type='text' name='schoolname'
        value='<?= set_value('schoolname') ?>' placeholder='School Name'/>
   </div>


   <div class='w3-row'>
       <i  style='margin-right:3%' class="fa fa-map-marker
        w3-large w3-text-teal w3-center"></i>
        <input class='w3-center w3-padding' type='text' name='address'
          value='<?= set_value('address') ?>'  placeholder='School Address'/>
   </div>

   <br>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-user
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='text' name='firstname'
        value='<?= set_value('firstname') ?>' placeholder='Firstname'/>
 </div>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-user
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='text' name='lastname'
       value='<?= set_value('lastname') ?>'  placeholder='Lastname'/>
 </div>

 <br>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-envelope
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='email' name='email'
        value='<?= set_value('email') ?>'  placeholder='School Email Address'/>
 </div>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-phone
      w3-large w3-text-teal w3-center"></i>
      <input class='w3-center w3-padding' type='tel' name='phone'
       value='<?= set_value('phone') ?>' placeholder='School Phone Number'/>
 </div>

 <br>

 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-unlock-alt
      w3-large w3-text-teal w3-center"></i>
      <input id="password_box" class='w3-center w3-padding' type='password' name='password'
        value='<?= set_value('password') ?>'  placeholder='Password'/>
 </div>


 <div class='w3-row'>
     <i  style='margin-right:3%' class="fa fa-unlock-alt
      w3-large w3-text-teal w3-center"></i>
      <input id="password_box" class='w3-center w3-padding' type='password' name='cpassword'
        value='<?= set_value('cpassword') ?>' placeholder='Confirm Password'/>
 </div>
<!--<input type="checkbox" id="show_p" name="show_pass" value="checked" class=""/>Show Password<br>
--><script type="text/javascript">

$('document').ready(function(){
var type = $('#password_box').attr('type');
$('#show_p').change(function(){
if (type == "password")
{

  $('#password_box').attr('type','text');

}
else
{

  $('#password_box').attr('type','password');

}
//alert('reed');

}
);

});

</script>

 <input class='w3-center w3-button w3-teal w3-margin-top w3-margin-bottom'
  type='submit' name='submit' value='Register'/>


</form>
<div class="w3-text-red w3-center">* All Fields Are Required</div>
 </div>

    <center>
       <div class="w3-text- w3-small w3-margin-bottom w3-margin-bottom">Already have Account? <span class="w3-text-theme"><?php
    echo "<a href='";
    echo site_url('login');
    echo "'>Login Here</a>";

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
 		<p class="w3-small">Copyright © Gettew - All rights reserved,  <a href="http://Gettew.com">Gettew.com</a></p>

 </footer>
</div>

 </body>
 </html>



