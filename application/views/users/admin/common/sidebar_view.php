
<div style="background-color:rgb(47, 47, 47);<?php 
if(!$this->agent->is_mobile())
{
echo "height:100vh";
}

 ?>;overflow-y: scroll;padding-bottom: 64px;" class="w3-col m2 l2 w3-bar-block">



<a class="w3-bar-item  rep w3-text-white w3-small w3-margin-top w3-small" href="<?php
echo site_url('dashboard');
?>">  <i  style='margin-right:3%' class="fa fa-home
   w3-large w3-text-white w3-center"></i>Home</a>

   <b class="w3-bar-item rep w3-text-grey w3-margin-top">Account</b>



<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/account_settings');
?>">  <i  style='margin-right:3%' class="fa fa-cogs
w3-large w3-text-white w3-center"></i>Account Settings</a>


<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
     echo site_url('dashboard/fund_account');
     ?>">  <i  style='margin-right:3%' class="fa fa-credit-card
        w3-large w3-text-white w3-center"></i>Fund Account</a>


<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
     echo site_url('dashboard/upgrade_account');
     ?>">  <i  style='margin-right:3%' class="fa fa-globe
        w3-large w3-text-white w3-center"></i>Upgrade Account</a>


       <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
      echo site_url('dashboard/logout');
      ?>">  <i  style='margin-right:3%' class="fa fa-minus
         w3-large w3-text-white w3-center"></i>Logout</a>



         <b class="w3-bar-item rep w3-text-grey w3-margin-top w3-margin-bottom">
    School Settings </b>


   <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/edit_school_details');
?>">  <i  style='margin-right:3%' class="fa fa-info-circle
w3-large w3-text-white w3-center"></i>Update School Details</a>

<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/school_settings');
?>">  <i  style='margin-right:3%' class="fa fa-university
w3-large w3-text-white w3-center"></i>School Settings</a>


<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/change_session');
?>">  <i  style='margin-right:3%' class="fa fa-calendar
w3-large w3-text-white w3-center"></i>Change Session</a>


<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/result_settings');
?>">  <i  style='margin-right:3%' class="fa fa-toggle-on
w3-large w3-text-white w3-center"></i>Result Settings</a>

<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/change_term');
?>">  <i  style='margin-right:3%' class="fa fa-calendar-plus-o
w3-large w3-text-white w3-center"></i>Change Term</a>

<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard/manage_subject');
?>">  <i  style='margin-right:3%' class="fa fa-plus
w3-large w3-text-white w3-center"></i>Manage Subject</a>


         <b class="w3-bar-item rep w3-text-grey w3-margin-top w3-margin-bottom">
    Students & Staff Affair </b>

  <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/manage_fee');
 ?>">  <i  style='margin-right:3%' class="fa fa-money
    w3-large w3-text-white w3-center"></i>Create &  Manage FEE</a>

    <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/add_offline_payment');
 ?>">  <i  style='margin-right:3%' class="fa fa-money
    w3-large w3-text-white w3-center"></i>Record Offline Payment</a>

         <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('resultmanager/index');
?>">  <i  style='margin-right:3%' class="fa fa-graduation-cap
  w3-large w3-text-white w3-center"></i>Result Manager</a>


  <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/manage_students');
 ?>">  <i  style='margin-right:3%' class="fa fa-user
    w3-large w3-text-white w3-center"></i>Manage Students</a>





    <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/payments');
 ?>">  <i  style='margin-right:3%' class="fa fa-credit-card
    w3-large w3-text-white w3-center"></i>Student Payments</a>



    <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard_cont/generate_result_checker');
 ?>">  <i  style='margin-right:3%' class="fa fa-stop
    w3-large w3-text-white w3-center"></i>Generate Result Checker Card</a>


    <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard_cont/idcard_request');
 ?>">  <i  style='margin-right:3%' class="fa fa-square
    w3-large w3-text-white w3-center"></i>Request ID Card</a>



<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('dashboard_cont/send_sms');
?>">  <i  style='margin-right:3%' class="fa fa-comments
  w3-large w3-text-white w3-center"></i>Send An SMS</a>


  <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/manage_staff');
 ?>">  <i  style='margin-right:3%' class="fa fa-user
    w3-large w3-text-white w3-center"></i>Manage Staff</a>


    <!--<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
 echo site_url('dashboard/payroll');
 ?>">  <b><i  style='margin-right:3%' class="fa fa-square-o
    w3-large w3-text-white w3-center"></i></b>Payroll</a>
-->

   
<br>
 </div>
