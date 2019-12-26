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
          'students_model','parents_model','websites_model','staff_model','blog_model','back_model'));
      $this->load->helper(array('url','form','page_helper','result_helper'));
        $this->load->library(array('form_validation','user_agent'));



   
      if (!isset($this->session->student_id) || !isset($this->session->student_logged_in))
       {    
       show_page('students/login');
     }




   $meta= $this->back_model->get_site_meta();

   
     $this->tagLine =$meta['title'];
     $this->siteName=$meta['sitename'];
     $this->keywords=$meta['keywords'];
     $this->description=$meta['description'];
     $this->author=$meta['author'];
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
     $this->favicon = base_url('assets/images/favicon.ico');

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
      $data['title'] = $this->siteName." | Account Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;    
      $data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);


    

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/settings_view',$data);
    $this->load->view('common/footer_view',$data);


   }
}