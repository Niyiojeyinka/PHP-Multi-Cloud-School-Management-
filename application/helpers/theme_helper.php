<?php


/***
 * Name:       Gettew
 * Package:     gettew_theme_helper.php
 * About:       time helper
 * Copyright:  (C) 2018,2019,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

function renderPage($theme_id,$page)
{
  $CI =& get_instance();


  if ($page[0] == "/")
  {
    $CI->load->view("themes/".$theme_id."".$page);
  }else
  {
    $CI->load->view("themes/".$theme_id."/".$page);
  }
}
function themeAssetsBaseUrl($theme_id,$dire)
{
    if ($dire[0] == "/")
    {
return base_url("assets/themes/".$theme_id."".$dire);
    }else
    {
return base_url("assets/themes/".$theme_id."/".$dire);
    }
}

function getWebsiteId()
{//not for public
  
  $CI =& get_instance();
return $CI->uri->segment(3);

}

function getWebsiteSubdomain()
{//public
  
  $CI =& get_instance();
$address = $_SERVER[ 'HTTP_HOST' ];
$address_id ;
if(stripos($address, "gettew"))
{

  $entry_domain_type ="sub";
//definitely its a sub domain
$address_split = explode(".", $address);

if(count($address_split) == 4){
//remove www to be able to compare it with db
 $address_id = str_ireplace("www.", "", $address);

}elseif (count($address_split) == 3) {
//its ok
$address_id = $address;

}
return $address_id;

}else{
    $entry_domain_type ="top";
$address_id =str_ireplace("www.", "", $address);

$address_id = $CI->db->get_where('websites',array("domain"=>$address_id))->row_array()['subdomain'];

return $address_id;

}
}

function insertSettings($key,$value)
{

  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_options'];
    if(!empty($query))
    {
        $query = json_decode($query,true);
  
    }else{
          $query = '[]';

    }

    $query[$key] = $value;
    $query = json_encode($query);
    $CI->db->update("websites",array("theme_options" => $query),array("subdomain" => getWebsiteId()));
    

}


function getSettings($key)
{

  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_options'];
    $query = json_decode($query,true);
    return $query[$key];
    

}

function getColorsOptions($name)
{

  $colors = array('','blue','green','teal','red','orange','blue-gray','cyan','deep-blue','purple','aqua','lime','sand','pink','amber','pale-blue','pale-green','light-green','sand','khaki','amber','deep-orange','brown','black','light-gray','w3-gray','dark-gray','pale-red','indigo');
for ($i=1; $i < count($colors) ; $i++) { 
  
  echo '<span class="w3-margin"><input type="radio" class="w3-jumbo" name="'.$name.'" value="'.$colors[$i].'"/>';

     echo "<span class='w3-padding w3-tag w3-xlarge w3-".$colors[$i]."'></span></span>";
     if($i%4==0)
     {
      echo "<br>";
     }
}
 
}

function getIconsOptions($name)
{

  $icons = array('','fa-adn','fa-book','fa-pencil','fa-hourglass','fa-image','fa-desktop','fa-futbol-o','fa-asterik','fa-automobile','fa-balance-scale','fa-bank','fa-bar-chart','fa-android','fa-ambulance','fa-area-chart','fa-bed','fa-bell','fa-bell-o','fa-bicycle','fa-building','fa-building-o','fa-bullhorn','fa-bullseye','fa-bus','fa-cab','fa-check','fa-check-circle','fa-check-circle-o','fa-check-square','fa-check-square-o','fa-calculator','fa-calendar','fa-calendar-check-o','fa-calendar-minus-o','fa-calendar-o','fa-calendar-plus-o','fa-car','fa-dribbble','fa-graduation-cap','fa-globe','fa-user-md');
for ($i=1; $i < count($icons) ; $i++) { 
  
  echo '<span class="w3-margin"><input type="radio" class="w3-jumbo" name="'.$name.'" value="'.$icons[$i].'"/>';

     echo "<i class='fa ".$icons[$i]."'></i></span>";
     if($i%4==0)
     {
      echo "<br>";
     }
}
 
}
function getLatestEvents($limit)
{

  $CI =& get_instance();
    $CI->db->order_by('id', 'DESC');
    $query = $CI->db->get_where("events",array("subdomain" => getWebsiteSubdomain()),$limit);
   return $query->result_array();
    

}

function getLatestPosts($limit)
{

  $CI =& get_instance();
    $CI->db->order_by('id', 'DESC');
    $query = $CI->db->get_where("blog",array("subdomain" => getWebsiteSubdomain()),$limit);
  return  $query->result_array();
    

}
function getSliders()
{

  $CI =& get_instance();
    $CI->db->order_by('id', 'DESC');
    $query = $CI->db->get_where("sliders",array("subdomain" => getWebsiteSubdomain()));
  return $query->result_array();
}
function getBlogPost($slug)
{

  $CI =& get_instance();
    $query = $CI->db->get_where("blog",array("slug" => $slug));
    if (!empty($query->row_array())) {
  return $query->row_array();
    }else{
      return NULL;
    }
    

}

function getPostSlug(){
    $CI =& get_instance();

  return $CI->uri->segment(2);
}

function insertAdminHeader($key,$value)
{
  //not implemented yet

  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_data'];
    $query = json_decode($query,true);
    $query[$key] = $value;
 if(!empty($query))
    {
        $query = json_decode($query,true);
  
    }else{
          $query = [];

    }
    $CI->db->update("websites",array("theme_data" => $query),array("subdomain" => getWebsiteId()));
    

}


function getAdminHeader($key)
{
  //not implemented yet

  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_data'];
    $query = json_decode($query,true);
    return $query[$key];
    

}


function setData($key,$value)
{
    //not for public
    
  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_data'];
      $query = json_decode($query,true);
    $query[$key] = $value;
  $CI->db->update("websites",array("theme_data" => json_encode($query)),array("subdomain" => getWebsiteId()));
}


function getData($key)
{
    //not for public

  $CI =& get_instance();
    $query = $CI->db->get_where("websites",array("subdomain" => getWebsiteId()));
    $query = $query->row_array()['theme_data'];
    $query = json_decode($query,true);
    return $query[$key];
    

}

function renderAdminPage($theme_id,$page)
{
  $CI =& get_instance();
    //get theme id from db
$theme_info = $CI->websites_model->get_theme_by_id($theme_id);
  if ($page[0] == "/")
  {
    $CI->load->view("themes/".$theme_id."/".$page);


  }else
  {

    $CI->load->view("themes/".$theme_id."/".$page);

  }

}



function registerThemeMediaAction($title,$button_text,$link_style,$theme_data_key)
{
    //not for public
    //admin function only
    //later let developers be able to select type of file they want

    $_SESSION['gettew_media_action'] = array( 'title'=>$title ,'theme_data_key' =>$theme_data_key,'post_media_action_slug'=>$this->uri->uri_string());
      if (empty($link_style) || !isset($link_style)){
        
        echo "<a class='w3-btn w3-teal w3-small' href='".site_url('gettew_webfunction/add_media/'.getWebsiteId())."'>".$button_text."</a>";

        }else{
        echo "<a style='".$link_style."' href='".site_url('gettew_webfunction/add_media/'.getWebsiteId())."'>".$button_text."</a>";

        }

}

function footerDetails()
{

    $CI =& get_instance();

$query = $CI->db->get_where("system_var",array("variable_name" => "footer_details"));
return $query->row_array()['long_value'];



}
function headMetaDetails()
{
  $CI =& get_instance();

$query = $CI->db->get_where("system_var",array("variable_name" => "head_meta_details"));
return $query->row_array()['long_value'];

}
function signInLink()
{
if (ENVIRONMENT =='development') {
   $sign_in_link = 'http://gettew.dev/sign_in';
}else{
   $sign_in_link = 'http://gettew.com/sign_in';

}
$sign_in_link ='/sign_in';
return $sign_in_link;
}

function inbuiltMenus()
{
  /*
if (ENVIRONMENT =='development') {
   $gettew_link ='';//$_SERVER[ 'HTTP_HOST' ];// 'http://gettew.dev';
}else{
   $gettew_link = 'http://gettew.com';

}*/$gettew_link ='';
    return array(array('title' =>'Parents', 'link' =>$gettew_link."/parents"),array('title' =>'Staff', 'link' =>$gettew_link."/staff"),array('title' =>'Students', 'link' =>$gettew_link."/students")/*,array('title' =>'Admission', 'link' =>$gettew_link."/admission/".getWebsiteId())*/);

}
function themeBasePath($path)
{//not for public

    if ($path[0] == "/")
    {
    return base_url('application_users/views/themes'.$path);


    }else
    {

        return base_url('application_users/views/themes/'.$path);

    }
}

function mediaBaseUrl($dire)
{


    if ($dire[0] == "/")
    {
return base_url("assets/media".$dire);


    }else
    {
return base_url("assets/media/".$dire);

    }
}
function getFirstImageLink($texthtml)
{

preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $texthtml, $matches);
if (empty($matches[0])) {
  return mediaBaseUrl('defaultblog.png');
}
return $first_img = $matches[1][0];

}
function getFaviconLink()
{
   $CI =& get_instance();
   $query = $CI->db->get_where("websites",array('subdomain' =>  getWebsiteSubdomain()));

  return mediaBaseUrl($query->row_array()['favicon']);
}
function openImageUploadModal()
{
  if (isset($_SESSION['id'])) {
   
    echo "

<!-- modal div -->

 <div id='container0' style='max-width:600px;display:none;' class='w3-modal'>
  <div class='w3-modal-content w3-teal'>
    <header class='w3-container w3-center'><h2>Change Image</h2>
      <span onclick='document.getElementById(\"container0\").style.display=\"none\"'
      class='w3-button w3-display-topright'>&times;</span>

    </header>

        <div class='w3-container w3-white w3-center w3-padding'>
       <input id='image_u_id' type='hidden' name='image_key' value=''/>
       <!--<br>
       <button class='w3-button w3-teal w3-margin' name='gallery'>Open Gallery </button>-->
       <br>
       <input type='file' name='imagefile' class='w3-padding'/><br><i id='loader' style='display:none;' class='fa fa-hourglass-o w3-large w3-text-theme w3-margin'></i><br>
        <input onclick=\"showLoader()\" type='submit' name='submit' value='Upload' class='w3-button w3-teal w3-margin w3-hover-white w3-border w3-border-teal w3-hover-text-teal'/>

        </div>

        <footer class='w3-container w3-center w3-theme'>
          <p>&copy; Gettew <?php
         if (date('y') == 19)
         {
         echo '20'.date('y');
         }else{
         echo '2019 - 20'.date('y');
         }
         ?></p>
        </footer>
<script type='text/javascript'>
function showLoader(){
  var loaderDiv = document.getElementById('loader');
loaderDiv.style.display='block';
}


  setInterval(function(){
var icons = ['fa-hourglass-o','fa-hourglass-1','fa-hourglass-2','fa-hourglass-3','fa-hourglass-half','fa-hourglass'];
var max = icons.length ;
var min = 0;
 var i = Math.floor(Math.random() * (max - min) ) + min;
var loaderDiv = document.getElementById('loader');
loaderDiv.setAttribute('class','fa '+icons[i]+' w3-jumbo w3-text-theme w3-margin')

  },1000)



</script>



   </div>

</div>
<!--modal ends here-->
";
}
}
function showToAdmin($html)
{
    //CHANGE TO ROLE LATER HERE
    if(isset($_SESSION['id']))
    {
        echo $html;
    }

}
function closeLiveEdit()
{
   $hold= '<input type="submit" name="submit" value="Save Changes" class="w3-btn w3-green w3-circle" style="position: fixed;bottom:10%;right:3%;"></form>';
      showToAdmin($hold);
      unset($hold);

}


function showPen($element_id,$title="",$type="")
{
    //CHANGE TO ROLE LATER HERE
    if(isset($_SESSION['id']))
    {
        if ($type == 'image') {
    return "<i onclick='clickEvent(\"".$element_id."\")' class='fa fa-image w3-medium w3-button w3-hover-text-teal'></i><span class=''>".$title."</span>";
        }else{
    return "<i onclick='liveEditInterfaceTask(\"".$element_id."\")' class='fa fa-pencil w3-medium w3-button'></i><span class=''>".$title."</span>";
        }
        
    }

}
function initLiveEdit(){
    $CI =& get_instance();
if (isset($_SESSION['id'])) {
  
    echo form_open_multipart('gettew_prewebsettings_action/save_all_edit/'.getWebsiteId());

}
 echo "<input type='hidden' name='slug' value='".$CI->uri->segment(4)."'/>";
    echo "<script> function liveEditInterfaceTask(id){
    $('#'+id).css('display','none');
        $('#'+id+'_input').css('display','block');

}";
echo "var submitItem = function(id){
            //hide input box
            //show text
        $('#'+id).css('display','block');
        $('#'+id+'_input').css('display','none');
            //submit with ajax
       var inp = $('#'+id+'_input').val();
       //alert(inp);
  $.post('".site_url('gettew_prewebsettings_action/live_edit_submit_action/'.getWebsiteId())."',
    {
        element : id,
        contents : inp 
    },
    function(data, status){
        /*alert('Data: ' + data + 'Status: ' + status);*/});

  var myVar = setInterval(myTimer, 500);

    $('#'+id).html(inp); 
       }

  </script>";
       openImageUploadModal();
       echo  "<script>function clickEvent(id){
    $(\"#image_u_id\").attr('value',id);
    document.getElementById(\"container0\").style.display=\"block\";
  }</script>";

if(isset($_SESSION['action_status_report']))
{
    echo "<script>alert('".$_SESSION['action_status_report']."')</script>";
}

}

function liveEdit($element_id,$input_type,$editorSwitch,$input_title="",$value_array="",$class="",$style="")
{
    //CHANGE TO ROLE LATER HERE
    if(isset($_SESSION['id']))
    {
        //do live edit
     if ($input_type == 'text') {
         
         echo "<input onchange='submitItem(\"".$element_id."\")' id='".$element_id."_input' style='display:none;'  value='".$input_title."' name='".$element_id."'  type='text' class='w3-padding w3-text-black' />";
     }
 elseif ($input_type == 'longtext') {
         
        if($editorSwitch)
        {
$editorScript = "
<script>
    $(document).ready(function() {
       $('#".$element_id."_input').summernote({
    height: ($(window).height() - 300),
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append('image', image);
    $.ajax({
        url: '".site_url('gettew_webfunction/upload_image')."',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function(url) {
            var image = $('<img>').attr('src',url);
            $('#".$element_id."_input').summernote('insertNode', image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}});
</script>";
$editorStyle ="style='width:inherit;width:inherit;height:260px;'";

  }else{
    $editorScript= "";
    $editorStyle = "style='display:none;width:inherit;width:inherit;height:260px;'";
  }

       echo $editorScript;

         echo "<textarea  name='".$element_id."' onmouseout='submitItem(\"".$element_id."\")'  id='".$element_id."_input' ".$editorStyle." class='".$class."'  >".$input_title."</textarea>";

        // echo "</div>";
 

     }

    }
}

function setPageContents($tag,$class,$data,$element_id,$input_type,$editorSwitch=false)
{
/*
*/
//Edit to role session validation here later
     if($editorSwitch != true)
     {
  echo "<".$tag." class='".$class."' id='".$element_id."'>".$data."</".$tag.">".liveEdit($element_id,$input_type,$editorSwitch,$data)."".showPen($element_id);
}else{
echo liveEdit($element_id,$input_type,$editorSwitch,$data);
//  echo "string";
}

}
function imageUpload($element_id)
{

     
  echo showPen($element_id,'','image');
 if (isset($_SESSION['id'])) {

echo "<script type='text/javascript'>
  var myVar = setInterval(myTimer, 500);

  function myTimer() {
    $('#".$element_id."').load(
      '".site_url('gettew_prewebsettings_action/get_webdata_value/'.getWebsiteId().'/'.$element_id)."',
      function(responseTxt, statusTxt, xhr) {
        if (statusTxt == 'success') {
            $('#".$element_id."').html(responseTxt);
        }
      }
    );
  }

 
</script>";
}


}