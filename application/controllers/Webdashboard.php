<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webdashboard extends CI_Controller {

public function __construct()
{
     parent::__construct();
  $this->load->model(array('websites_model','schools_model','users_model','back_model'));
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



	public function index()
	{

$school_id = $_SESSION['school_id'];

$cond = array(
'school_id' => $school_id 
);

$school_web = $this->websites_model->get_school_website($cond);

if($school_web['creation_stage'] == "1")
{
show_page('gettew_prewebsettings_action/choose_theme/'.$school_web['subdomain']);

}elseif($school_web['creation_stage'] == "2") {

show_page('gettew_prewebsettings_action/theme_settings/'.$school_web['subdomain']);


}
$data["theme_id"] = $school_web['theme_id'];
echo $school_web['creation_stage'] ;

     $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Your website school in few minutes";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/web_sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/web_admin_view',$data);
          $this->load->view('common/footer_view',$data);

	}

}