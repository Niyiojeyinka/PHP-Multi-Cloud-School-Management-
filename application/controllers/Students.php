<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Students extends CI_Controller {
    /*
    Name:Gettew
    Date:Start 2019 5 may 2:12PM
    */



    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('users_model','schools_model',
          'students_model','parents_model','websites_model','staff_model','blog_model'));
      $this->load->helper(array('url','form','page_helper','result_helper'));
        $this->load->library(array('form_validation','user_agent'));



   
      if (!isset($this->session->student_id) || !isset($this->session->student_logged_in))
       {    
       show_page('students/login');
     }



   $this->siteName = $this->back_model->get_system_variable("site_name");
      $this->author = $this->back_model->get_system_variable("author");
      $this->keywords = $this->back_model->get_system_variable("keywords");
      $this->description= $this->back_model->get_system_variable("description");
      $this->tagLine= $this->back_model->get_system_variable("tagline");
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

  }

public function process_profile_image()
{

  $config['upload_path'] = "assets/images/profiles";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '3000';

 $this->load->library('upload', $config);


if($this->upload->do_upload("image"))
{
  $this->students_model->update_profile_picture($this->upload->data("file_name"));
 $_SESSION['action_status_report'] = '<b class="w3-text-green">Profile Picture Changed Successfully</b>';
$this->session->mark_as_flash('action_status_report');

}else{

$_SESSION['action_status_report'] = '<b class="w3-text-red">'.$this->upload->display_errors().'</b>';
$this->session->mark_as_flash('action_status_report');

}
show_page("id/".$_SESSION['student_id']);
}
public function account_settings()
{
 
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | Account Settings";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka Olaniyi Philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/settings_view',$data);
    $this->load->view('common/footer_view',$data);


   }
}