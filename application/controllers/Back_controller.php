<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Back_controller extends CI_Controller {
    /*
    Name:Gettew
    Date:Start Rewriting  it 6/15/2019 6:15PM
    Back_controller is just an admin controller
    just prefer it to admin.php 
    */

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('users_model','schools_model',
          'students_model','parents_model','websites_model','staff_model','back_model'));
      $this->load->helper(array('url','form','student_helper','page_helper'));
        $this->load->library(array('form_validation','user_agent'));

   if (($this->uri->segment(2) != "login") && ($this->uri->segment(2) != "logout")){
    if (!isset($this->session->backend_admin_id) || !isset($this->session->backend_logged_in))
       {    
       show_page('back_controller/login');
     }
     }

      $this->siteName = $this->back_model->get_system_variable("site_name");
      $this->author = $this->back_model->get_system_variable("author");
      $this->keywords = $this->back_model->get_system_variable("keywords");
      $this->description= $this->back_model->get_system_variable("description");
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

    }

    public function index()
    {
  


      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Dashboard";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
    $this->load->view('team/admin/header_view',$data);
    $this->load->view('team/admin/sidebar_view',$data);
    $this->load->view('team/admin/index_view',$data);
}

 public function login($slug = NULL)
    {
$this->form_validation->set_rules("team_id","Your ID", "required",array('required'=> "Please Your Team ID is required"));
$this->form_validation->set_rules("password","Password", "required");
if(!$this->form_validation->run())
{
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] = "Login";
      $data["keywords"] = "gettew,school,free,Management,Software,result,checking";
      $data["author"] = "Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

    $this->load->view('common/head_meta_view',$data);
    $this->load->view('common/header_view',$data);
    $this->load->view('team/admin/login_view',$data);
    $this->load->view('common/footer_view',$data);


}else{
  
  if($this->back_model->login_check()){

    $_SESSION["backend_admin_id"] = $this->input->post("team_id");
    $_SESSION["backend_logged_in"] = true;

    show_page("back_controller/index");
        }else{
        //incorrect password error msg
        $_SESSION['action_status_report'] = '<span class="w3-text-red">Incorrect Login Information</span>';
        $this->session->mark_as_flash('action_status_report');
    show_page("back_controller/login");


        }
       }
    }




  }