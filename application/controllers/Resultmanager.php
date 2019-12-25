<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resultmanager extends CI_Controller {

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
 
//edit here? edit in staff controller

 public function index()
 {

  $this->form_validation->set_rules("subject","Subject","required");

  $config['upload_path'] = "./assets/result_csv_files";
    $config['allowed_types'] = 'csv';
    $config['max_size'] = '50000';      
    $this->load->library('upload', $config);
if($this->upload->do_upload('result_file')){
     $csv_slug =$this->upload->data("file_name");
      }

 if(!$this->form_validation->run())
 {

    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Your website school in few minutes";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;

$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);
$data['schl_sec_div'] = json_decode($data['school']['session_division'],true);
 

$data['added_subjects'] = $this->schools_model->get_subjects($data['school']['id']);
    $this->load->view('users/admin/common/header_view',$data);
    $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
    $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/gettew_admin_manage_result_view',$data);
    $this->load->view('common/footer_view',$data);

  }else{
$school= $this->schools_model->get_school_by_id($_SESSION['school_id']);
//use session set by admin
$school_sessions = json_decode($school['sessions'],true);
$session = $school_sessions[count($school_sessions)-1];
$term = $school['term'];
//if user choose to upload result for the chosen term and session

if ($this->input->post('result_det') == "set") {
  $session = $this->input->post("session");
   $term =  $this->input->post("term");
}


    $csv_file_base_url = base_url('assets/result_csv_files/'.$csv_slug);

    //used school id here
    $school = $this->schools_model->get_school_by_id($_SESSION['school_id']);


$filename = $csv_file_base_url;

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;   
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
//var_dump($the_big_array);

$first_line = $the_big_array[0];

for ($i=1; $i < count($the_big_array); $i++){
      $row = [];
      for ($j=0; $j < count($the_big_array[$i]); $j++){ 

       $row[$first_line[$j]]= $the_big_array[$i][$j];

      }
     //echo   var_dump($row)."<br>";

     $this->schools_model->save_result($row,$school['id'],$session,$term);
     //unset($row);

}
//redirect back

$_SESSION['action_status_report'] = "<span class='w3-text-green w3-center'>Result Uploaded Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
show_page('Gettew_resultmanager/index');
  }

 }
}