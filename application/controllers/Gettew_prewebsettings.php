<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gettew_prewebsettings extends CI_Controller {

public function __construct()
{
     parent::__construct();
  $this->load->model(array('websites_model','schools_model','users_model'));
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

public function check_subdomain($str)
{

$subdomain = $str.".".str_ireplace("www.","", $_SERVER[ 'HTTP_HOST' ]);
$web_address = $this->websites_model->get_website_by_subdomain($subdomain);
if(empty($subdomain)) {
 $this->form_validation->set_message('check_subdomain', 'The {field} field can not be Empty');

  return FALSE;
}


if (!empty($web_address)) {
 $this->form_validation->set_message('check_subdomain', 'The {field} already exists please choose another!');

  return FALSE;
}else{

return TRUE;
}
}



  public function index()
  {

$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  Your School Website in few clicks";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$this->form_validation->set_rules('web_name',"Website Name","required");
$this->form_validation->set_rules('school_motto',"School Motto","required");
$this->form_validation->set_rules('web_address',"Website Address","callback_check_subdomain");
if(!$this->form_validation->run())
{
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/gettew_admin_website_view',$data);
          $this->load->view('common/footer_view',$data);



}
else{
//insert domain details
  //insert website details
  $school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$new_web = array(
"name" =>$this->input->post('web_name'),
"tagline" =>$this->input->post('school_motto'),
"creation_stage" => '1',
"school_id" => $school['id'],
"admin_id" => $_SESSION['id'],
"subdomain" => $this->input->post('web_address')."".$this->input->post('web_name_o'),
"time" => time()


);
$this->websites_model->insert_new_website($new_web);
show_page("Gettew_prewebsettings_action/choose_theme/".$this->input->post('web_address')."".$this->input->post('web_name_o'));

}


  }


  public function choose_theme($subdomain,$offset = NULL)
  {





  $limit = 8;


    $data['themes'] = $this->websites_model->get_themes($offset,$limit);
      $this->load->library('pagination');

    $config['base_url'] = site_url("gettew_Dashboard/choose_theme");



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
$data['description'] = NULL;
      $data["title"] ="Gettew |  Your School Website in few clicks";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/gettew_admin_choose_theme_view',$data);
          $this->load->view('common/footer_view',$data);





  }

  public function search_themes($subdomain,$offset = 0)
  {
    $input_text = $this->input->post('search_theme');
    
      $limit = 4;
    $data['themes']= $this->websites_model->search_themes($input_text,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("Gettew_prewebsettings/search_themes");

  $config['total_rows'] = count($this->websites_model->search_themes($input_text,NULL,NULL));

    $config['per_page'] = $limit;

   $config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-theme w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-theme w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="" class="w3-btn w3-theme w3-margin-left w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-theme w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();







$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
$data["title"] ="Gettew |  Search Themes";
$data["keywords"] ="gettew,school,free,Management,Software,result,checking";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="Online and offline school Management Service for schools
and colleges";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';



          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/web/gettew_admin_choose_theme_view',$data);
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



}