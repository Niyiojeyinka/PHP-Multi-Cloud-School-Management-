
<div style="background-color:rgb(47, 47, 47);text-decoration:none;<?php 
if(!$this->agent->is_mobile())
{
echo "height:100vh";
}

 ?>;overflow-y: scroll;" class="w3-col m2 l2 w3-bar-block longbar">


<a class="w3-bar-item  rep w3-text-white w3-small w3-margin-top w3-small" href="<?php
echo site_url('gettew_dashboard');
?>">  <i  style='margin-right:3%;' class="fa fa-home
   w3-large w3-text-white w3-center"></i>Home</a>

   <b class="w3-bar-item rep w3-text-grey w3-margin-top">Account</b>


   <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
echo site_url('gettew_dashboard/edit_details');
?>">  <i  style='margin-right:3%' class="fa fa-info-circle
w3-large w3-text-white w3-center"></i>Update Details</a>



<a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
     echo site_url('Gettew_dashboard/fund_account');
     ?>">  <i  style='margin-right:3%' class="fa fa-credit-card
        w3-large w3-text-white w3-center"></i>Fund Account</a>


       <a class="w3-bar-item  rep w3-text-white w3-small" href="<?php
      echo site_url('Gettew_dashboard/logout');
      ?>">  <i  style='margin-right:3%' class="fa fa-minus
         w3-large w3-text-white w3-center"></i>Logout</a>

         <b class="w3-bar-item rep w3-text-grey w3-margin-top w3-margin-bottom">
   Gettew Options </b>
<?php


echo '<div class="w3-dropdown-hover w3-margin-bottom w3-hover-margin-bottom">
<a class="w3-bar-item  rep w3-text-white w3-small" href="#">  <i  style="margin-right:3%" class="fa fa fa-image
         w3-large w3-text-white w3-center"></i>Media <i class="fa fa-caret-down"></i></a> 
    <div class="w3-dropdown-content w3-bar-block">
<a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/add_media/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa fa-plus
         w3-large w3-center"></i>Add media</a>

         <a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/manage_media/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-edit
         w3-large w3-center"></i>Manage Media</a>     
    </div>
  </div> <br>';
   



if(in_array("news_support",$gettew_options))
{

echo '<div class="w3-dropdown-hover w3-margin-bottom">
<a class="w3-bar-item  rep w3-text-white w3-small" href="#">  <i  style="margin-right:3%" class="fa fa-bullhorn
         w3-large w3-text-white w3-center"></i>School News <i class="fa fa-caret-down"></i></a> 
    <div class="w3-dropdown-content w3-bar-block">
<a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/add_news/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-bullhorn
         w3-large w3-center"></i>Post News</a>

         <a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/manage_news/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-edit
         w3-large w3-center"></i>Manage News</a>     
    </div>
  </div> <br>';

//style="background-color:rgb(47, 47, 47);" 



}



if(in_array("event_support",$gettew_options))
{

echo '<div class="w3-dropdown-hover w3-margin-bottom">
<a class="w3-bar-item  rep w3-text-white w3-small" href="#">  <i  style="margin-right:3%" class="fa fa-calendar-check-o
         w3-large w3-text-white w3-center"></i>School Events<i class="fa fa-caret-down"></i></a> 
    <div class="w3-dropdown-content w3-bar-block">
<a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/add_event/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-calendar-plus-o
         w3-large w3-center"></i>Post Event</a>

         <a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/manage_events/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-edit
         w3-large w3-center"></i>Manage Events</a>     
    </div>
  </div> <br>';

//style="background-color:rgb(47, 47, 47);" 



}


if(in_array("slider_support",$gettew_options))
{

echo '<div class="w3-dropdown-hover w3-margin-bottom">
<a class="w3-bar-item  rep w3-text-white w3-small" href="#">  <i  style="margin-right:3%" class="fa fa-camera-retro
         w3-large w3-text-white w3-center"></i>Gallery/Slider<i class="fa fa-caret-down"></i></a> 
    <div class="w3-dropdown-content w3-bar-block">
<a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/add_slider/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-camera-retro
         w3-large w3-center"></i>Add Image</a>

         <a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/manage_sliders/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-camera
         w3-large w3-center"></i>Manage Gallery</a>     
    </div>
  </div> <br>';

//style="background-color:rgb(47, 47, 47);" 



}



if(in_array("page_support",$gettew_options))
{

echo '<div class="w3-dropdown-hover w3-margin-bottom">
<a class="w3-bar-item  rep w3-text-white w3-small" href="#">  <i  style="margin-right:3%" class="fa fa fa-bookmark
         w3-large w3-text-white w3-center"></i>Pages <i class="fa fa-caret-down"></i></a> 
    <div class="w3-dropdown-content w3-bar-block">
<a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/add_page/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa fa-bookmark
         w3-large w3-center"></i>Add Page</a>

         <a class="w3-bar-item  rep w3-small" href="'.site_url('gettew_webfunction/manage_pages/'.$this->uri->segment(3)).'">  <i  style="margin-right:3%" class="fa fa-edit
         w3-large w3-center"></i>Manage Page</a>     
    </div>
  </div> <br>';


   
}


if(in_array("favicon_support",$gettew_options))
{


   echo "<a class='w3-bar-item  rep w3-text-white w3-small' href='".site_url('gettew_webfunction/change_favicon/'.$this->uri->segment(3))."'>  <i  style='margin-right:3%' class='fa fa-image
         w3-large w3-text-white w3-center'></i>Change Favicon</a>";
   
}

/*
if(in_array("notice_support",$gettew_options))
{


   echo    "<a class='w3-bar-item  rep w3-text-white w3-small' href='".site_url('Gettew_dashboard/logout')."'>  <i  style='margin-right:3%' class='fa fa-bell
         w3-large w3-text-white w3-center'></i>Notice</a>";

}

if(in_array("slider_support",$gettew_options))
{


   echo    "<a class='w3-bar-item  rep w3-text-white w3-small' href='".site_url('Gettew_dashboard/logout')."'>  <i  style='margin-right:3%' class='fa fa-image
         w3-large w3-text-white w3-center'></i>Sliders</a>";

}
*/
if(in_array("result_support",$gettew_options))
{


   echo    "<a class='w3-bar-item  rep w3-text-white w3-small' href='".site_url('gettew_resultmanager/index')."'>  <i  style='margin-right:3%' class='fa fa-graduation-cap
         w3-large w3-text-white w3-center'></i>Result Manager</a>";

}


?>


       

        <b class="w3-bar-item rep w3-text-grey w3-margin-top w3-margin-bottom">
   Theme Options </b>



<?php


if(!empty($theme_options))
{


for ($i=0; $i < count($theme_options) ; $i++) { 

echo '<a class="w3-bar-item  rep w3-text-white w3-small" href="'.site_url('gettew_prewebsettings_action/theme_settings/'.$this->uri->segment(3).'/'.$theme_options[$i][2]).'"><i  style="margin-right:3%" class="fa '.$theme_options[$i][0].' w3-large w3-text-white w3-center"></i>'.ucfirst($theme_options[$i][1]).'</a>';

}



}


?>


 </div>
