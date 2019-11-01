<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Staff extends CI_Controller {
    /*
    Name:Gettew
    Date:Start 2019 may 11:18AM
    */



    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('users_model','schools_model',
          'students_model','parents_model','websites_model','staff_model','blog_model','back_model'));
      $this->load->helper(array('url','form','page_helper'));
        $this->load->library(array('form_validation','user_agent'));



   
      if (!isset($this->session->staff_reg) || !isset($this->session->staff_logged_in))
       {    
       show_page('staff/login');
     }

     
   $this->siteName = $this->back_model->get_system_variable("site_name");
      $this->author = $this->back_model->get_system_variable("author");
      $this->keywords = $this->back_model->get_system_variable("keywords");
      $this->description= $this->back_model->get_system_variable("description");
      $this->tagLine= $this->back_model->get_system_variable("tagline");
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';



  }

    public function dashboard()
    {
 
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  Staff Dashboard";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$data['staff']= $this->staff_model->get_staff_member_by_reg_no($_SESSION['staff_reg']);

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/dashboard_view',$data);
    $this->load->view('common/footer_view',$data);


   }
public function process_profile_image()
{

  $config['upload_path'] = "assets/images/profiles";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '3000';

 $this->load->library('upload', $config);


if($this->upload->do_upload('profileimage'))
{
  $this->staff_model->update_profile_picture($this->upload->data("file_name"));
 $_SESSION['action_status_report'] = '<b class="w3-text-green">Profile Picture Changed Successfully</b>';
$this->session->mark_as_flash('action_status_report');

}else{
$_SESSION['action_status_report'] = '<b class="w3-text-red">'.$this->upload->display_errors().'</b>';
$this->session->mark_as_flash('action_status_report');

}
show_page("staff/index");


}
public function settings()
    {
 
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  Staff Settings";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/settings_view',$data);
    $this->load->view('common/footer_view',$data);


   }


 public function change_email($slug = null)
 {
      $this->form_validation->set_rules("current_password","Password","trim|required");
    $this->form_validation->set_rules("new_email","New Email","trim|required|is_unique[staff.email]");
    $this->form_validation->set_rules("confirm_email","Confirm New Email","trim|required|matches[new_email]");



    if ($this->form_validation->run() ==  FALSE)
   {
$_SESSION['action_status_report'] = "<span class='w3-text-red'".validation_errors()."</span>";
    $this->session->mark_as_flash('action_status_report');

      show_page('staff/settings');


}else{
//change here
    $user_det =   $this->staff_model->get_staff_member_by_reg_no($_SESSION['staff_reg']);
 if ($user_det['password'] == md5(trim($this->input->post('current_password')))){//change Email
if( $this->staff_model->insert_new_email())
  { //show suc message

            $_SESSION['action_status_report'] = '<b class="w3-text-green">Email changed successfully</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("staff/settings");
          }else{

              //show err message

             $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('action_status_report');
              show_page("staff/settings"); }
 }else{
                  //incorrect password  error page
   $_SESSION["action_status_report"] = '<b class="w3-text-red">The Password you entered is incorrect</b><br>';
    $this->session->mark_as_flash('action_status_report');
    show_page("staff/settings");
     }
}
 }

 public function change_password($slug = null)
 {
    $this->form_validation->set_rules("current_password","Current Password","trim|required");
    $this->form_validation->set_rules("new_password","New Password","trim|required|is_unique[staff.password]");
    $this->form_validation->set_rules("confirm_password","Confirm New Password","trim|required|matches[new_password]");
    if ($this->form_validation->run() ==  FALSE)
   {
    $_SESSION['action_status_report'] = "<span class='w3-text-red'".validation_errors()."</span>";
    $this->session->mark_as_flash('action_status_report');

      show_page('staff/settings');

}else{

//change here



     $user_det =   $this->staff_model->get_staff_member_by_reg_no($_SESSION['staff_reg']);

       if ($user_det['password'] == md5(trim($this->input->post('current_password'))))
       {

        //change password
          if( $this->staff_model->insert_new_password())
          {
             //show suc message

$_SESSION['action_status_report'] = '<b class="w3-text-green">Password changed successfully</b><br>';
$this->session->mark_as_flash('action_status_report');
show_page("staff/settings");
          }else{

  //show err message

 $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
  $this->session->mark_as_flash('action_status_report');
  show_page("staff/settings");


          }

       }else{
                   //incorrect password  error page
             $_SESSION["action_status_report"] = '<b class="w3-text-red">The Current Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("staff/settings");
       }
}
}

public function manage_articles($offset = 0)
{

    $limit = 8;
    $data['items'] = $this->staff_model->get_multiple_articles($offset,
    $limit);

      $this->load->library('pagination');

      $config['base_url'] = site_url("staff/manage_articles");

    $config['total_rows'] = count($this->staff_model->get_multiple_articles(NULL,
    NULL));
    //  $config['total_rows'] = 10;
      $config['per_page'] = $limit;

     // $config['uri_segment'] = 4;
      $config['first_tag_open'] = '<span class="w3-btn  w3-theme w3-text-white w3-round-xlarge">';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<br><span class="w3-btn  w3-theme w3-text-white w3-round-xlarge">';
      $config['last_tag_close'] = '</span>';
      $config['first_link'] = 'First';
      $config['prev_link'] = 'Prev';
      $config['next_link'] = 'Next';
      $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-theme w3-text-white w3-round-xlarge">';
      $config['next_tag_close'] = '</span><br>';
      $config['prev_tag_open'] = '<span style="" class="w3-btn w3-theme w3-text-white w3-round-xlarge">';
      $config['prev_tag_close'] = '</span>';
      $config['num_tag_open'] = ' <span style="" class="w3-btn w3-theme w3-text-white w3-round-xlarge w3-tiny">';
      $config['num_tag_close'] = '</span>';
      $config['cur_tag_open'] = '<span style="" class="w3-btn w3-white w3-text-teal w3-round-xlarge">';
      $config['cur_tag_close'] = '</span>';
      $config['last_link'] = 'Last';
      $config['display_pages'] = TRUE;
      //$config["use_page_numbers"] = TRUE;


         $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();






$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  Manage Articles";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);

    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/articles_view',$data);
    $this->load->view('common/footer_view',$data);



}

public function news_preview($slug)
{


$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  News Preview";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);


$data['item'] = $this->blog_model->get_post_by_slug($slug);


if(empty($data['item']))
{

  show_404();
}$this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/preview_post_view',$data);
    $this->load->view('common/footer_view',$data);
}

public function add_new_article()
{
$this->form_validation->set_rules('title','Article Title','required');

$this->form_validation->set_rules('contents','Article Contents','required');

if (!$this->form_validation->run()) {
  

$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  New Article";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);

    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/create_article_view',$data);
    $this->load->view('common/footer_view',$data);

}else{
$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$school_website = $this->websites_model->get_school_website(array('school_id'=> $school['id']));
$ref = md5(((time()/0.5)*100)." encode");

 if($this->staff_model->insert_post($school_website['subdomain'],$ref))
  {
//insert to action
//insert action 
//here action is like nofication for the main admin
 $action_item = array(
'type' => "post",
'read_status' => "unread",
'achieve_status' => "false",
'object_ref' => $ref,
'school_id'=>$_SESSION['school_id'],
'time'=> time()
  );
$this->staff_model->insert_new_action($action_item);

  //sucesspage
    $slg = url_title($this->input->post('title'),"dash",TRUE);
    $_SESSION['action_status_report'] = "<span class='w3-text-green'>Post Added successfully
  </span>";
$this->session->mark_as_flash('action_status_report');
show_page("staff/edit_article/".$slg);
  }else{
  //error page
    $_SESSION['action_status_report'] = "<span class='w3-text-red'>Error Occurred
  </span>";
  $this->session->mark_as_flash('action_status_report');

show_page("staff/add_new_article");
  }
    

}
}

public function edit_article($slug)
{
$this->form_validation->set_rules('title','Article Title','required');

$this->form_validation->set_rules('contents','Article Contents','required');

if (!$this->form_validation->run()) {
  

$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |  New Article";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['item'] = $this->blog_model->get_post_by_slug($slug);

    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/edit_article_view',$data);
    $this->load->view('common/footer_view',$data);

}else{
$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$ref = md5(((time()/0.5)*100)." encode");

 if($this->staff_model->edit_post($slug,$ref))
  {//insert to action
//insert action 
//here action is like nofication for the main admin
 $action_item = array(
'type' => "post",
'read_status' => "unread",
'achieve_status' => "false",
'object_ref' => $ref,
'school_id'=> $_SESSION['school_id'],
'time' => time()
  );
$this->staff_model->insert_new_action($action_item);

  //sucesspage
    $_SESSION['action_status_report'] = "<span class='w3-text-green'>Post Edited successfully
  </span>";
$this->session->mark_as_flash('action_status_report');

  }else{
  //error page
    $_SESSION['action_status_report'] = "<span class='w3-text-red'>Error Occurred
  </span>";
  $this->session->mark_as_flash('action_status_report');


  }
    show_page("staff/edit_article/".$this->uri->segment(3));

}
}


public function manage_students()
{
$this->form_validation->set_rules('firstname','FirstName','required');
$this->form_validation->set_rules('lastname','LastName','required');
$this->form_validation->set_rules('dob','Date Of Birth','required');

$this->form_validation->set_rules('class_level','Class Level','required');

$this->form_validation->set_rules('admission_date','Admission Date','required');

$this->form_validation->set_rules('student_address','Student Address','required');

$this->form_validation->set_rules('p_mobile_1','Parent Mobile Number','required');

$this->form_validation->set_rules('gender','Gender','required');

  $config['upload_path'] = "assets/images/profiles";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '3000';

 $this->load->library('upload', $config);


if($this->upload->do_upload('profileimage'))
{
$up = 1;

}


if(!$this->form_validation->run())
{


$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
$data["title"] ="Gettew |  Manage Students";
$data["keywords"] ="gettew,school,free,Management,Software,result,checking";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="Online and offline school Management Service for schools
and colleges";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';

$data['school_id'] = $_SESSION['school_id'];
$arr = array(
"school_id" => 
$data['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);


$data['options'] = json_decode($this->schools_model->get_student_option($_SESSION['school_id']),true);
  

    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/admin/gettew_admin_manage_students_view',$data);
    $this->load->view('common/footer_view',$data);

     
    
   
}else{

do {
 
//create random alpha numeric
     $char1 = array_reverse(array('A','B','C','D','E','F','G','H'
      ,'I',"J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"));
    $char2 = array_reverse(array('A','B','C','D','E','F','G','H'
      ,'I',"J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"));
     $char3 = array('A','B','C','D','E','F','G','H'
      ,'I',"J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

    $v = mt_rand(0,25);
    $i = mt_rand(0,25);
    $a = mt_rand(0,9);
    $b = mt_rand(0,9);
    $c = mt_rand(0,9);
    $d = mt_rand(0,9);
    $p = mt_rand(0,25);
    $ref_id = $char1[$i].$char2[$v].$char3[$i].$a.$b.$c.$d;
 
} while (!empty($this->students_model->get_student_by_reg_no($ref_id)));


    //result ex:cbd3432,ZQA1471
    $ids =[];
    array_push($ids, $ref_id);
    $ids = json_encode($ids);


$school_id = $_SESSION['school_id'];

//check if parent already exists

  if(empty($this->parents_model->get_parent($school_id)))
  {
  //if no add new parent


$par = array(

  'lastname' => $this->input->post('lastname'),
    'child_ids' => "[]",
    'school_id' => $school_id,
'phone' => $this->input->post('p_mobile_1'),
'time' => time()

);

$this->parents_model->save_new_parent($par);

  
  }

//add child id to parent's child list

$parent = $this->parents_model->get_parent($school_id);
$child_array = json_decode($parent['child_ids']);
if(is_array($child_array) )
{

 array_push($child_array, $ref_id);
$child_array = json_encode($child_array);
}

$new_p_det = array(
'child_ids' => $child_array
);
/*if($new_p_det =="null")
{
  $new_p_det = NULL;
}*/
$this->parents_model->update_parent_details($new_p_det,$parent['id']);

//store new student details to db

$stud = array(

"firstname" => $this->input->post('firstname'),
"lastname" => $this->input->post('lastname'),
"middlename" => $this->input->post('middle_name'),
"password" => md5('depass'),
"parent_id" => $parent['id'],
"dob" => $this->input->post('dob'),
"class" => $this->input->post('class_level'),
"student_options" => $this->input->post("option"),
"profile_img" => $this->upload->data("file_name"),
"admission_date" => $this->input->post('admission_date'),
"student_address" => $this->input->post('student_address'),
"gender"=> $this->input->post('gender'),
"student_id" => $ref_id,
"school_id" => $_SESSION['school_id']


);

$this->students_model->save_new_student($stud);


show_page('staff/student_details/'.$ref_id);
}
}



    public function student_details($id)
    {


    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew |  Manage Result";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';


$data['school_id'] = $_SESSION['school_id'];

    $data['student'] = $this->students_model->get_student_by_reg_no($id);
   $data['student']['class'] = $this->schools_model->get_class_name_by_level($data['student']['class'],$data['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);



    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/admin/gettew_admin_post_student_reg_view',$data);
    $this->load->view('common/footer_view',$data);



    }

public function promote_student($reg_no)
{


$data['school_id'] = $_SESSION['school_id'];
$student = $this->students_model->get_student_by_reg_no($reg_no);
$levels = $this->schools_model->get_levels(array("school_id" => $data['school_id']));
$highest_level = $levels[count($levels)-1]['level'];

if ($student['class'] < $highest_level) {

  $this->students_model->edit_student_details(array("class"=> $student['class']+1),$reg_no);
}

   $new_class = $this->schools_model->get_class_name_by_level($student['class']+1,$data['school_id']);


$report = "<span class='w3-text-green w3-large'>Student Promoted To <span class='w3-text-blue'>".$new_class['level_name']."</span> Successfully</span>";
    $_SESSION['action_status_report'] = $report;
    $this->session->mark_as_flash('action_status_report');

    show_page('staff/student_details/'.$reg_no);



}

public function demote_student($reg_no)
{


$data['school_id'] = $_SESSION['school_id'];
$student = $this->students_model->get_student_by_reg_no($reg_no);
$levels = $this->schools_model->get_levels(array("school_id" => $data['school_id']));
$highest_level = $levels[count($levels)-1]['level'];

if ($student['class'] != 1) {

  $this->students_model->edit_student_details(array("class"=> $student['class']-1),$reg_no);
}

   $new_class = $this->schools_model->get_class_name_by_level($student['class']-1,$data['school_id']);


$report = "<span class='w3-text-green w3-large'>Student Demoted To <span class='w3-text-red'>".$new_class['level_name']."</span> Successfully</span>";
    $_SESSION['action_status_report'] = $report;
    $this->session->mark_as_flash('action_status_report');

    show_page('staff/student_details/'.$reg_no);



}

 
    public function view_students_list($offset = 0)
    {

      $limit =8;
      $cond = array(
     "school_id" => $_SESSION['school_id']
      );
    $data['items'] = $this->students_model->get_school_students($cond,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("staff/view_students_list");



  $config['total_rows'] = count($this->students_model->get_school_students($cond,NULL,NULL));

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
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();







    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew | Students List";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);



    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
      $this->load->view('users/admin/gettew_admin_students_list_view',$data);
    $this->load->view('common/footer_view',$data);
          


    }


  public function search_students($offset = 0)
  {
    $input_text = $this->input->post('search');
    
      $limit = 10;
    $data['items']= $this->students_model->search_students($input_text,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("staff/search_students");



  $config['total_rows'] = count($this->students_model->search_students($input_text,NULL,NULL));

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
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();







$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
$data["title"] ="Gettew |  Search Students";
$data["keywords"] ="gettew,school,free,Management,Software,result,checking";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="Online and offline school Management Service for schools
and colleges";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);




    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
    $this->load->view('users/admin/gettew_student_search_view',$data);
    $this->load->view('common/footer_view',$data);

  }


 public function result_manager()
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
$data['description'] = NULL;
      $data["title"] ="Gettew |   Manage Result";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';


$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);
$data['schl_sec_div'] = json_decode($data['school']['session_division'],true);
 

$data['added_subjects'] = $this->schools_model->get_subjects($data['school']['id']);




    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
       $this->load->view('users/admin/gettew_admin_manage_result_view',$data);

    $this->load->view('common/footer_view',$data);



  }else{
$school= $this->schools_model->get_school_by_id($_SESSION['school_id']);
//use session set by admin
$school_sessions = json_decode($school['session'],true);
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


    public function send_sms($user_type,$id)
    {

$this->form_validation->set_rules("message","Message","required");

if (!$this->form_validation->run()) {
 
    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew |  Manage Result";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';


$data['school_id'] = $_SESSION['school_id'];

    $data['student'] = $this->students_model->get_student_by_reg_no($id);
   $data['student']['class'] = $this->schools_model->get_class_name_by_level($data['student']['class'],$data['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);



    $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/staff/common/header_view',$data);
        $this->load->view('users/staff/send_sms_view',$data);
    $this->load->view('common/footer_view',$data);

}else{
//submit message for review
 //create a md5 hash from time value 
 $ref = md5(((time()/0.5)*100)." encode");

$sms_det = array("user_type" => $this->uri->segment(3),
"user_id" => $this->uri->segment(4),
"staff_id" => $_SESSION['staff_reg'],
"message" => $this->input->post('message'),
"ref"=> $ref,
"status"=>"pending",
"time"=> time()
);
//insert action 
//here action is like nofication for the main admin
  $this->staff_model->submit_staff_message($sms_det);
  $action_item = array(
'type' => "sms",
'read_status' => "unread",
'achieve_status' => "false",
'object_ref' => $ref,
'school_id' => $_SESSION['school_id'],
'time' => time()
  );
$this->staff_model->insert_new_action($action_item);


  $_SESSION['action_status_report']= "<span class='w3-text-green'> Message Submitted For Review</span>";
$this->session->mark_as_flash("action_status_report")
;
show_page('staff/send_sms/parent/'.$this->uri->segment(4));

}

    }




    public function logout()
    {


   

       unset($_SESSION["staff_reg"]);
    unset($_SESSION["logged_in"]);


    $_SESSION['action_status_report'] = '<span class="w3-text-red">You are Successfully logged out</span>';
    $this->session->mark_as_flash('action_status_report');


     show_page('staff/login');
    

    }







}