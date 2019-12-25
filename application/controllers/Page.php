<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

public function __construct()
{
     parent::__construct();
  $this->load->model(array('users_model','staff_model','parents_model','students_model','back_model'));
  $this->load->helper(array('url','form','blog_helper','page_helper'));
     $this->load->library(array('form_validation','session'));


    $meta= $this->back_model->get_site_meta();

   
     $this->tagLine =$meta['title'];
     $this->siteName=$meta['sitename'];
     $this->keywords=$meta['keywords'];
     $this->description=$meta['description'];
     $this->author=$meta['author'];
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
     $this->favicon = base_url('assets/images/favicon.ico');

}

public function test()
{
 echo date('y');
}
	public function index()
	{
      $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | ".$this->tagLine;
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;

       $this->load->view('common/head_meta_view',$data); 
       $this->load->view('common/header_view',$data);
		   $this->load->view('public/home_view',$data);
		   $this->load->view('common/footer_view',$data);



	}


  public function pricing()
  {
     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Pricing";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
       $this->load->view('common/head_meta_view',$data); $this->load->view('common/header_view',$data);
        
    $this->load->view('public/pricing_view',$data);
    $this->load->view('common/footer_view',$data);



  }


public function test_domain()
{

echo $_SERVER[ 'HTTP_HOST' ];
var_dump(explode(".", $_SERVER[ 'HTTP_HOST' ]));

}


  	public function register()
  	{
    $this->form_validation->set_rules("firstname","Firstname","required");
    $this->form_validation->set_rules("lastname","Lastname","required");
    $this->form_validation->set_rules("address","School Address","required");
    $this->form_validation->set_rules('email', 'School Email', 'required|is_unique[schools.email]');
    $this->form_validation->set_rules('schoolname', 'School Name', 'required|is_unique[schools.name]');
    $this->form_validation->set_rules("password","Password","required|is_unique[users.password]");
    $this->form_validation->set_rules("cpassword","Password","required|min_length[4]|matches[password]");
    $this->form_validation->set_rules('phone', 'School Mobile Number', 'required|is_unique[schools.phone]');
  if (!$this->form_validation->run())
    {

//echo "test";
 $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | School Registration";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;

       $this->load->view('common/head_meta_view',$data); $this->load->view('common/header_view',$data);
        
    $this->load->view('public/register_view',$data);
  //	$this->load->view('common/footer_view',$data);






    }
    else
    {



    if (!$this->users_model->register() )
    {


      $_SESSION['err_msg'] ='Unknown Error Occurred,
       Please try again later';
      $this->session->mark_as_flash('err_msg');
      show_page("page/register");


    }
    else{

    //show dash
$user = $this->users_model->get_user_by_phone($this->input->post('phone'));
    $_SESSION["id"] = $user['id'];

    $_SESSION["logged_in"] = true;
    //get school id

    $_SESSION['school_id'] = $user['school_id'];
//default school is the first school register

    show_page("dashboard");
    }
 	}

}


	public function login($slug = null)
	{

$this->form_validation->set_rules("password","Password","required");
$this->form_validation->set_rules("phone","Mobile Phone","trim|required|numeric");

if ($this->form_validation->run() == FALSE)
{
//login page
     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Sign In";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
     $this->load->view('common/head_meta_view',$data);

     $this->load->view('common/header_view',$data);
	$this->load->view('public/login_view',$data);
//$this->load->view('common/footer_view',$data);
        }else
        {

        if($this->users_model->login_check())
        {


$user = $this->users_model->get_user_by_phone($this->input->post('phone'));
    $_SESSION["id"] = $user['id'];

    $_SESSION["logged_in"] = true;
    //get school id

    $_SESSION['school_id'] = $user['school_id'];
    show_page("dashboard");

        }
        else{
        //incorrect password error msg
        $_SESSION['err_msg'] = 'Incorrect Login Information';
        $this->session->mark_as_flash('err_msg');

        show_page("login");


        }

        }
      }


public function contact_us()
{

$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('message','Message Contents','required');
if(!$this->form_validation->run())
{
      $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Contact Us";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
       $this->load->view('common/head_meta_view',$data); $this->load->view('common/header_view',$data);
        
    $this->load->view('public/contact_view',$data);
  //  $this->load->view('common/footer_view',$data);


 


}else{

  //send the message to admin


//send email here


$this->load->library('email');

//email start here
$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

$this->email->initialize($config);


$this->email->from($this->input->post('email'), 'System');
$this->email->to('contact@gettew.com');

$this->email->subject('Gettew Contact Us | '.$this->input->post('name'));

$this->email->message($this->input->post('message'));

$this->email->send();



$_SESSION['action_status_report'] = "<span class='w3-text-green'>Message Sent</span>";
$this->session->mark_as_flash('action_status_report');

show_page('contact_us');

}



}


public function sign_in()
{

     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Sign In";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;

       $this->load->view('common/head_meta_view',$data); 
          
        $this->load->view('public/sign_in_view',$data); 


}                
public function staff_login($staff_id= NULL)
{

$this->form_validation->set_rules("staff_id","Staff ID", "required");
$this->form_validation->set_rules("password","Password", "required");
if(!$this->form_validation->run())
{     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Staff Login";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;

       $this->load->view('common/head_meta_view',$data); 
          
        $this->load->view('users/staff/login_view',$data); 


}else{





        if($this->staff_model->login_check())
        {


  $user = $this->staff_model->get_staff_member_by_reg_no($this->input->post("staff_id"));

    $_SESSION["staff_reg"] = $user['staff_id'];

    $_SESSION["staff_logged_in"] = true;
    //get school id

    $_SESSION['school_id'] = $user['school_id'];
    show_page("staff/dashboard");

        }
        else{
        //incorrect password error msg
        $_SESSION['action_status_report'] = '<span class="w3-text-red">Incorrect Login Information</span>';
        $this->session->mark_as_flash('action_status_report');

        show_page("staff/login/".$this->uri->segment(3));


        }


}




}


public function parents_login($parent_id= NULL)
{

$this->form_validation->set_rules("phone","Mobile Number", "required");
$this->form_validation->set_rules("password","Password", "required");
if(!$this->form_validation->run())
{
     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Parent Login";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
       $this->load->view('common/head_meta_view',$data); 
          
        $this->load->view('users/parent/login_view',$data); 


}else{
  if($this->parents_model->login_check()){
  $user = $this->parents_model->get_parent_by_phone($this->input->post("phone"));

    $_SESSION["parent_id"] = $user['id'];
    $_SESSION["parent_logged_in"] = true;
    //get school id

    show_page("parents/dashboard");

        }
        else{
        //incorrect password error msg
        $_SESSION['action_status_report'] = '<span class="w3-text-red">Incorrect Login Information</span>';
        $this->session->mark_as_flash('action_status_report');

        show_page("parents/login/".$this->uri->segment(3));


        }
}
}

public function students_login($student_id= NULL)
{

$this->form_validation->set_rules("student_id","Student ID", "required");
$this->form_validation->set_rules("password","Password", "required");
if(!$this->form_validation->run())
{
     $data['web_favicon_slug'] = $this->favicon;
      $data['title'] = $this->siteName." | Student Pricing";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
       $this->load->view('common/head_meta_view',$data); 
          
        $this->load->view('users/student/login_view',$data); 


}else{
  if($this->students_model->login_check()){
  $user = $this->students_model->get_student_by_reg_no($this->input->post("student_id"));

    $_SESSION["student_id"] = $this->input->post("student_id");
    $_SESSION["student_logged_in"] = true;
    //get school id

    show_page("id/".$this->input->post("student_id"));

        }
        else{
        //incorrect password error msg
        $_SESSION['action_status_report'] = '<span class="w3-text-red">Incorrect Login Information</span>';
        $this->session->mark_as_flash('action_status_report');

        show_page("students/login/".$this->uri->segment(3));


        }
}
}


}
