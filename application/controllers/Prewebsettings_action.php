<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prewebsettings_action extends CI_Controller {

public function __construct()
{
     parent::__construct();
  $this->load->model(array('websites_model','schools_model','users_model','media_model'));
  $this->load->helper(array('url','form','blog_helper','page_helper','theme_helper'));
     $this->load->library(array('form_validation','user_agent'));


      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {    
       show_page('login');     }



      $this->siteName = $this->back_model->get_system_variable("site_name");
      $this->author = $this->back_model->get_system_variable("author");
      $this->keywords = $this->back_model->get_system_variable("keywords");
      $this->description= $this->back_model->get_system_variable("description");
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

}
 


  public function choose_theme($subdomain,$offset = NULL)
  {
  $limit = 8;
    $data['themes'] = $this->websites_model->get_themes($offset,$limit);
      $this->load->library('pagination');

    $config['base_url'] = site_url("prewebsettings_action/choose_theme");
  $config['total_rows'] = count($this->websites_model->get_themes(NULL,NULL));
    $config['per_page'] = $limit;
   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-theme w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-theme w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';
  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-theme w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-theme w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['num_tag_open'] = '<div>';
  $config['num_tag_close'] = '</div>';


  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();

    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Your website school in few minutes";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/admin_choose_theme_view',$data);
          $this->load->view('common/footer_view',$data);
}


public function theme_details($theme_id = NULL,$sub_domain = NULL)
{
    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | install theme";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;

$data['theme'] = $this->websites_model->get_theme_by_id($theme_id);

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/admin_theme_details_view',$data);
          $this->load->view('common/footer_view',$data);


}


  public function install_theme($theme_id,$subdomain)
  {
//install and redirect to theme admin settings page
$theme = $this->websites_model->get_theme_by_id($theme_id);
$theme_data = array(
"creation_stage" => "2",
"theme_id" => $theme_id,
"theme_options" => "[]",
"theme_data" => $theme['default_theme_data']
);

$this->websites_model->install_theme($theme_data,$subdomain);


show_page("prewebsettings_action/theme_settings/".$this->uri->segment(4));

  }


public function theme_settings($address_id =NULL,$page_id=NULL)
{
    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;

$data['show_editor'] = true;

$cond = array(
"subdomain" => $address_id
);
$theme_id = $this->websites_model->get_web_theme($cond)['theme_id'];
$data['school_web'] = $this->websites_model->get_school_website($cond);

$theme = $this->websites_model->get_theme_by_id($theme_id);
$data["options"]  = json_decode($theme['feature_support'],true);

$data['theme_options'] = json_decode($theme['admin_options'],true);
//load theme settings here

$data['theme_id'] = $theme_id;
$data['admin_slug'] = $page_id;
    $this->load->view('users/admin/common/header_view',$data);
    $this->load->view('users/admin/common/nav_view',$data);
   $this->load->view('users/admin/common/web_sidebar_view',$data);
    $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('themes/'.$theme_id.'/'.$theme['admin_route_file'],$data);
    $this->load->view('common/footer_view',$data);

}

public function check_sub_domain($subdomain){
$subdomain = str_replace("%20","",$subdomain);



if($subdomain != "nocontent")
{


if(empty($this->schools_model->get_sub_domain(array("subdomain" => $subdomain))))
{

  echo "<span class='w3-text-green'>Congratulations, The Sub Domain <b class='w3-text-blue'> ".$subdomain." </b>is Available </span>";

}else{

 echo "<span class='w3-text-red'>Sorry, The Sub Domain <b class='w3-text-blue'> ".$subdomain."</b> already chosen </span><br><span class='w3-tiny'>You may Want to read our <a class='w3-text-theme' href='".site_url('docs/admin/school_website_first_step#choosing_subdoman')."'>documentation</a> on choosing a subdomain </span>";
}
}
}
public function live_edit_submit_action($subdomain)
{
$key = $_POST['element'];
$value = $_POST['contents'];

setData($key,$value);
}
public function get_webdata_value($subdomain,$element_id)
{
  echo getData($element_id);
}
public function get_webdata_value_bulk($subdomain)
{
  $school_web = $this->websites_model->get_school_website(array('subdomain'=> $subdomain));

  echo $school_web['theme_data'];
  
}
public function save_all_edit($subdomain)
{
//echo var_dump($_POST);
if($_POST['submit'] == "Upload")
{
  //treat as file upload
 // redirect back to live edit
 $config['upload_path'] = "assets/media";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
 $config['max_size'] = '3000';
   
 $this->load->library('upload', $config);
 if($this->upload->do_upload('imagefile'))
 {
 $image_slug = $this->upload->data("file_name");
if(!empty($image_slug))
{
//insert to media
  $this->media_model->insert_media(array('name'=> $image_slug, 'link'=>$image_slug,'type'=> $this->upload->data("file_type"),'time'=>time()));

  setData($_POST['image_key'] , $image_slug);

}
  $_SESSION['action_status_report'] = 'Image Changed Successfully';
       //$this->session->mark_as_flash('action_status_report');
        $this->session->mark_as_temp('action_status_report',2);
 }else{
    $_SESSION['action_status_report'] =   strip_tags($this->upload->display_errors());
       //$this->session->mark_as_flash('action_status_report');
        $this->session->mark_as_temp('action_status_report',2);
 }

        show_page("prewebsettings_action/theme_settings/".$subdomain."/".$this->input->post('slug'));


}else{
  //save edited theme contents to website data
  $theme_data = $this->websites_model->get_web_theme(array('subdomain' => $subdomain))['theme_data'];
  $theme_data = json_decode($theme_data,true);
  //var_dump($theme_data);

  foreach ($_POST as $key=>$value){
    if (array_key_exists($key, $theme_data)) {
    //save the key data

      //echo $key."----".$_POST[$key];

      setData($key , $_POST[$key]);
  }
  }


  //back to edit screen
 //incorrect password error msg
    $_SESSION['action_status_report'] = 'Successfully Edited';
       //$this->session->mark_as_flash('action_status_report');
        $this->session->mark_as_temp('action_status_report',2);


        show_page("prewebsettings_action/theme_settings/".$subdomain."/".$this->input->post('slug'));

}

}

}