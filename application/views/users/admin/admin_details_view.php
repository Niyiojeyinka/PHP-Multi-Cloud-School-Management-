<div class="w3-container w3-center w3-white">
<br>
<hr>
<span class="w3-text-theme w3-xlarge w3-center">Update Personal Data</span><br>
<?php
if(isset($_SESSION['action_status_report']))
{

  echo "<hr>".$_SESSION['action_status_report'];
}
if(validation_errors() != NULL)
{
echo '<hr><i class="w3-text-red">'.validation_errors().'</i>';
}
?>
<hr>

<div class="w3-center">
<img style="width:128px;height:128px" src="<?php 
if(empty($user['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$user['profile_img']);

}
?>" class="w3-circle"/>
</div><br>
<span class="w3-label">Profile Image</span><br>
 <a  onclick="document.getElementById('container0').style.display='block'"
      class="w3-button w3-text-theme" >Change Profile Picture</a>




     <!-- modal div -->

      <div id="container0" style='max-widh:600px;<?php
    //echo display = block when neccessary
    if(isset($_SESSION["picture_err_msg"]))
    {
    echo 'display:block';

    }

        ?>' class="w3-modal">
       <div class="w3-modal-content w3-theme">
         <header class="w3-container"><h2>Gettew</h2>
           <span onclick="document.getElementById('container0').style.display='none'"
           class="w3-button w3-display-topright">&times;</span>

         </header>

             <div class="w3-container w3-white">
               <p>Change Profile Picture</p>
               <div class='w3-small w3-text-red'><?php
               //echo display = block when neccessary
               if(isset($_SESSION["picture_err_msg"]))
               {
               echo $_SESSION["picture_err_msg"];

               }

                 ?></div>
               <div class='w3-container'>
                <?= form_open_multipart('Dashboard/edit_details_profile_img') ?>
                 

                   <i  style='margin-right:3%' class="fa fa-image
                    w3-large w3-text-theme w3-center"></i>

                    <input class='w3-center' style='width:60%' type='file' name='profileimage'  />
    <br>
    <input class='w3-center w3-button w3-theme w3-margin-top w3-margin-bottom' type='submit' name='submit' value='Upload Picture'/>
    <br>
    </form>

               </div>


             </div>

             <footer class="w3-container w3-theme">
               <p>&copy; gettew <?php
              if (date('y') == 18)
              {
              echo "20".date('y');
              }else{
              echo "2018 - 20".date('y');
              }
              ?></p>
             </footer>



        </div>

     </div>
    <!--modal ends here-->


</div>

<hr>
<?= form_open_multipart('Dashboard/account_settings') ?>
<div class="w3-container input-grid-container">
<div class="w3-quarter">
  <span class="w3-label">FirstName</span><br>
  <input style="" class='w3-center w3-padding-top w3-padding-bottom
  w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
  type='text' name='firstname' value="<?= $user['firstname'] ?>" placeholder="Firstname" readonly/>

</div>
<div class="w3-quarter">
  <span class="w3-label">LastName</span>
<br>
  <input style="" class='w3-center w3-padding-top w3-padding-bottom
   w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
  type='text' name='lastname' value="<?= $user['lastname'] ?>" placeholder="Lastname" readonly/>

</div>
<div class="w3-quarter">
  <span class="w3-label">Personal Mobile Number</span><br>

  <input style="" class='w3-center w3-padding-top w3-padding-bottom
  w3-margin-bottom w3-margin-top' style='width:50%'
  type='tel' name='pphone' value="<?= $user['phone'] ?>" placeholder='Personal Mobile Number' required/>

</div>
<div class="w3-quarter">
  <span class="w3-label">Personal Email</span>

  <input style="" class='w3-center w3-padding-top w3-padding-bottom
   w3-margin-bottom w3-margin-top' style='width:50%'
  type='email' name='pemail' value="<?= $user['email'] ?>" placeholder='Personal Email' required/>

</div>
<center>
<input id="submitbtn" type="submit" class="w3-button w3-theme w3-hover-text-teal w3-hover-white w3-border w3-border-teal" name="submit"
value="Update Data"/><br><br>
</form></center>
<hr>
<center>
<a class="w3-btn w3-teal w3-hover-text-teal w3-hover-white w3-border w3-margin w3-border-teal w3-center" href="<?=site_url('Dashboard/change_password') ?>">Change Account Password</a></div>
</center>