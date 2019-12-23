<div class="w3-container w3-col w3-white w3-center">

<br>

<?php
if(isset($_SESSION['action_status_report']))
{
 echo $_SESSION['action_status_report'];
}


?>

  <div class="w3-row-padding w3-margin-bottom">
   <!-- <a href="<?=site_url('gettew_dashboard/application_form') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-user-plus w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Applications</h4>
      </div>
    </div></a>-->
<a href="<?=site_url('gettew_dashboard/cbt_application_form') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-desktop w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>?</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Request CBT Setup</h4>
      </div>
    </div></a>

   <a href="<?=site_url('gettew_dashboard/view_students_list') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?= $no_students?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students</h4>
      </div>
    </div></a>
   <a href="<?=site_url('gettew_dashboard/view_staff_list') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?= $no_staff?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Staff</h4>
      </div>
    </div></a>
       <a href="<?=site_url('gettew_dashboard/payments') ?>"><div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-credit-card w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>$</h3>
        </div>
        <div class="w3-clear"></div>
        <h5>Payments</h5>
      </div>
    </div></a>
  </div>


<center>

  <br>
    <span class="w3-padding-large w3-large w3-red w3-hover-light-grey w3-round-xlarge"
     style="font-weight:900;"><i  class="fa fa-gears
        w3-large w3-center"></i> Gettew Tools</span><br><br>
        
        
        
<div id="tools" class="w3-container w3-row">

<div id="tool" class="w3-container w3-half">
<i class="fa fa-globe w3-text-theme w3-jumbo"></i><br>
<b class="w3-text-theme">
Gettew WEB Package</b><br>
School Website Builder
<br><span class="w3-small">Gettew website builder let you create a website for your school in no time.No Developer,Designer Needed .</span>
<br>
<?php
if(!empty($school_web))
{

echo "<a class='w3-button w3-border w3-margin w3-green'  href='".site_url('gettew_webdashboard')."'>Go to Dashboard</a>";


}else{

echo "<a class='w3-button w3-border w3-margin'  href='".site_url('gettew_prewebsettings')."'>Get Started for Free</a>";


}
?>
</div>



<div id="tool" class="w3-container w3-half">
<i class="fa fa-graduation-cap w3-text-theme w3-jumbo"></i><br>
<b class="w3-text-theme">
Result Publishing</b><br>
Gettew Result Publishing Solution
<br>
<span class="w3-small">Our online result publishing tools  let you publish your students' result online with few clicks.</span>
<br>

<a class='w3-button w3-border w3-margin'  href='<?= site_url('gettew_resultmanager/index') ?>'>Get Started</a>

</div>
</div>

     
     
             
<div id="tools" class="w3-container w3-row">
<div id="tool" class="w3-container w3-half">
<i class="fa fa-comment w3-text-theme w3-jumbo"></i><br>
<b class="w3-text-theme">
Gettew SMS Solution</b><br>
Gettew Bulk SMS Solution
<br><span class="w3-small">Gettew SMS Solution let you send SMS ,bulk Messages,automated Messages,Greetings,Quick Notice and many more to parents and even staff from your dashboard.</span>
<br>
<a class='w3-button w3-border w3-margin'  href='<?= site_url('gettew_dashboard_cont/send_sms') ?>'>Get Started</a>

</div>



<div id="tool" class="w3-container w3-half">
<i class="fa fa-usd w3-text-theme w3-jumbo"></i><br>
<b class="w3-text-theme">
Gettew Payroll</b><br>
Pay Your Staff Easily
<br>
<span class="w3-small">Our Payroll Solution let you pay staff salary easily and also automate your payroll</span>
<br>

<a class='w3-button w3-border w3-margin'  href='<?= site_url('gettew_dashboard/payroll') ?>'>Coming Soon</a>

</div>
</div>

</center></div>
</div>