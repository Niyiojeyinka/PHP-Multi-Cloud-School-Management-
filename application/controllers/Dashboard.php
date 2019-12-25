<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {
    /*
    Name:Gettew
    Date:Start Rewriting  it on Oct 6, 2017 1:09:25 PM
    */



    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('users_model','schools_model',
          'students_model','parents_model','websites_model','staff_model','back_model'));
      $this->load->helper(array('url','form','student_helper','page_helper'));
        $this->load->library(array('form_validation','user_agent'));



   
      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {    
       show_page('login');
     }

if (empty($this->users_model->get_user_by_id()['state']))
{
show_page('dashboard_cont/choose_location');     

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

    public function index()
    {
      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Dashboard";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;


$cond = array(
'school_id' => $_SESSION['school_id']
);

$data['school_web'] = $this->websites_model->get_school_website($cond);
$data['no_staff'] = $this->staff_model->get_no_of_staff(array("school_id" => $_SESSION['school_id']));
$data['no_students'] = $this->students_model->get_no_of_students(array("school_id" => $_SESSION['school_id']));

    $data['school'] =$this->schools_model->get_school_by_id($_SESSION['school_id']);

  $this->load->view('users/admin/common/header_view',$data);
  $this->load->view('users/admin/common/nav_view',$data);
  
 $this->load->view('users/admin/common/sidebar_view',$data);
  $this->load->view('users/admin/common/content_top_view',$data);

$enroll_for_web = false;
if (!empty($data['school_web'])) {
  $enroll_for_web = true;
}


if (($data['school']['license']== "trial") && ($data['school']['license_expire'] < time()) && $enroll_for_web) {
            //its expired and its trial
  $this->load->view('users/admin/admin_trial_expired_view',$data);


          }elseif(($data['school']['license']== "active") && ($data['school']['license_expire'] < time()) && $enroll_for_web){
            //its expired and it normal subscription
          $this->load->view('users/admin/admin_account_expired_view',$data);


          }else{
        //everything is normal

          $this->load->view('users/admin/admin_dash_view',$data);

          }
         // $this->load->view('common/footer_view',$data);



    }

  public function change_password(){
$this->form_validation->set_rules("current_password","Current Password","required");
$this->form_validation->set_rules("new_password","New Password","required");
$this->form_validation->set_rules("confirm_password","Confirm Password","trim|required|matches[new_password]");


if (!$this->form_validation->run()) {
     $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Change Password";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$cond = array(
'school_id' => $_SESSION['school_id']
);

$data['school_web'] = $this->websites_model->get_school_website($cond);
$data['no_staff'] = $this->staff_model->get_no_of_staff(array("school_id" => $_SESSION['school_id']));
$data['no_students'] = $this->students_model->get_no_of_students(array("school_id" => $_SESSION['school_id']));
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
          $this->load->view('users/admin/admin_change_password_view',$data);
          $this->load->view('common/footer_view',$data);

}else{
 $user = $this->users_model->get_user_by_id();
       if ( $user['password'] == md5(md5($this->input->post('current_password'))))
       {

        //change password
          if( $this->users_model->insert_new_password())
          {
             //show suc message

$_SESSION["action_status_report"] = '<b class="w3-text-green">Password Changed Successfully</b><br>';
$this->session->mark_as_flash('action_status_report');
  show_page("dashboard/change_password");
          }else{

             //error page
$_SESSION["action_status_report"] = '<b class="w3-text-red">Error Occurred</b><br>';
$this->session->mark_as_flash('action_status_report');
  show_page("dashboard/change_password");


          }

}else{
 //incorrect password  error page
$_SESSION["action_status_report"] = '<b class="w3-text-red">The Current Account Password you entered is incorrect</b><br>';
$this->session->mark_as_flash('action_status_report');
  show_page("dashboard/change_password");
               }
}
}

public function manage_subject()
{

  $this->form_validation->set_rules("name","Subject Name","required");
  if(!$this->form_validation->run())
  {

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Manage Subject";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['added_subjects'] = $this->schools_model->get_subjects($_SESSION['school_id']);

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_manage_subject_view',$data);
          $this->load->view('common/footer_view',$data);



  }else{


if($this->schools_model->check_subject_if_added($this->input->post('name')))
{
  $this->schools_model->add_subject(array("title"=> $this->input->post("name"),"school_id" => $_SESSION['school_id']));

//show action status report
    $_SESSION['action_status_report'] = "<span class='w3-text-green'>Subject Added Successfully!</span>";
}else{
  $_SESSION['action_status_report'] = "<span class='w3-text-red'>Subject Already Added!</span>";
}


    $this->session->mark_as_flash('action_status_report');

    show_page('dashboard/manage_subject');

  }
}
public function edit_school_details()
{


$this->form_validation->set_rules("schoolname","School Name","required");


            $config['upload_path'] = "./assets/images/profiles";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';


            $this->load->library('upload', $config);
$this->upload->do_upload('schoollogo');
       

if (!$this->form_validation->run()) {

    $data['school'] =$this->schools_model->get_school_by_id($_SESSION['school_id']);


    $data['user'] =$this->users_model->get_user_by_id();


  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Edit School Details";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_school_details_view',$data);
          $this->load->view('common/footer_view',$data);
}else{
 
    //updATE SCHOOL DETAILS
    $sch_db = array(

    "phone" => $this->input->post("schoolphone"),
    "email" => $this->input->post("schoolemail"),
    "profile_img" => $this->upload->data("file_name") 
     );

    
$this->schools_model->update_school_details($sch_db,$_SESSION['school_id']);

    //show action status report
    $_SESSION['action_status_report'] = "<span class='w3-text-green'>School Details Updated Successfully!</span>";
    $this->session->mark_as_flash('action_status_report');

    show_page('dashboard/edit_school_details');



}



}

public function account_settings(){

    $data['school'] =$this->schools_model->get_school_by_id($_SESSION['school_id']);


    $data['user'] =$this->users_model->get_user_by_id();


    $this->form_validation->set_rules('firstname','FirstName','required');
    $this->form_validation->set_rules('lastname','LastName','required');
    



            $config['upload_path'] = "./assets/images/profiles";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
             
            $this->load->library('upload', $config);

$this->upload->do_upload('schoollogo');



    if(!$this->form_validation->run())
    {
    //if validation rules not passed

    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Account Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_details_view',$data);
          $this->load->view('common/footer_view',$data);



    }else{

    //insert to db
 //Updatge personal details
      $user_db = array(

      "phone" => $this->input->post("pphone"),
    "email" => $this->input->post("pemail"),
    "firstname" => $this->input->post("firstname"),
     "lastname" => $this->input->post("lastname")
);
$this->users_model->update_user_details($user_db,$_SESSION['id']);

    //show action status report
    $_SESSION['action_status_report'] = "<span class='w3-text-green'>Details Updated Successfully!</span>";
    $this->session->mark_as_flash('action_status_report');

    show_page('dashboard/account_settings');

    }



    }

    public function edit_details_profile_img()
    {

    $data['user'] =$this->users_model->get_user_by_id();


            $config['upload_path'] = "./assets/images/profiles";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '1000';
              $config['max_width'] = '1000';
              $config['max_height'] = '1000';

            $this->load->library('upload', $config);


    $UP = 0;
    if($this->upload->do_upload('profileimage'))
    {
        $pimg =$this->upload->data("file_name");

        
        



    //insert to db

    //UPDATE USER'S DETAILS


    
    }else{

      if(empty($pimg))
      {
              $pimg = $data['user']['profile_img'];

      }


    }


    $user_db = array(
      "profile_img" => $pimg
      
      );
        $this->users_model->update_user_details($user_db);
      
        
      
      //show action status report
      $_SESSION['action_status_report'] = "<span class='w3-text-green'>Details Updated Successfully!</span>";
    
         $img_err =  $this->upload->display_errors();
    if(!empty($img_err))
    {
    
    $_SESSION['action_status_report'] = "<span class='w3-text-red'>".$img_err."Max Size Allowed is 1mb</span>";

    
    
    }
      
 
         $this->session->mark_as_flash('action_status_report');

      
      show_page('dashboard/edit_details');
      

    }
//callback
public function check_if_staff_exists()
{
if(empty($this->staff_model->get_staff_member(array("school_id"=>$_SESSION['school_id'],"email" => $this->input->post("email")))))
{
  //not exists
  return TRUE;
}
 $this->form_validation->set_message('check_if_staff_exists', 'Staff With this Email Already Added');
return FALSE;
}
    
    public function manage_staff()
    {



    $this->form_validation->set_rules('firstname','FirstName','required');

    $this->form_validation->set_rules('lastname','LastName','required');

    $this->form_validation->set_rules('dob','Date Of Birth','required');

    $this->form_validation->set_rules('phone','Staff Mobile Number','required');

        $this->form_validation->set_rules('staff_type','Staff Type','required',array("required" => "Please select Staff Type"));


    $this->form_validation->set_rules('email','Staff Email','callback_check_if_staff_exists');


   $config['upload_path'] = "assets/images/profiles";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
              

            $this->load->library('upload', $config);

$this->upload->do_upload('profileimage');

    if(!$this->form_validation->run())
    {



  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Manage Staff";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_manage_staff_view',$data);
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
    //$d = mt_rand(0,9);
    $p = mt_rand(0,25);
    $ref_id = $char1[$i].$char2[$v].$char3[$i].$a.$b.$c;
    //.$d;
 
} while (!empty($this->staff_model->get_staff_member_by_reg_no($ref_id)));

    //insert into db
 $pimg =$this->upload->data("file_name");
$staff_data = array(
"firstname" => $this->input->post("firstname") ,
"lastname" =>$this->input->post("lastname"),
"staff_id" => $ref_id,
"profile_img" => $pimg,
"dob" => $this->input->post("dob"),
"email" => $this->input->post("email"),
"phone" => $this->input->post("phone"),
"staff_type"=> $this->input->post("staff_type"),
"school_id"=> $_SESSION['school_id'],

"password" => md5("staffpass")
);
$this->staff_model->insert_new_staff($staff_data);


 $_SESSION['action_status_report'] = "<span class='w3-text-green'>Staff Member Added Successfully!</span>";
    $this->session->mark_as_flash('action_status_report');

    show_page('dashboard/manage_staff');
   
    }


    }





    public function payroll()
    {
//first page seen by main admin

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Payroll";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_payroll_view',$data);
          $this->load->view('common/footer_view',$data);



    }





    public function payments($offset=NULL)
    {


  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Payments";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);
$data['schl_sec_div'] = json_decode($data['school']['session_division'],true);
$cond = array(
'school_id'=> $_SESSION['school_id'],
'term'=> $data['school']['term'],
'session' => $data['school_sessions'][count($data['school_sessions'])-1],
'method' => 'online_payment',
'status' => 'paid'
);
$data['count_online_payments'] = count($this->students_model->get_payments($cond));

$cond = array(
'school_id'=> $_SESSION['school_id'],
'term'=> $data['school']['term'],
'session' => $data['school_sessions'][count($data['school_sessions'])-1],
'method' => 'offline_payment',
'status'=> 'paid'
);
$data['count_offline_payments'] = count($this->students_model->get_payments($cond));



$limit = 5;

$cond = array(
'school_id'=> $_SESSION['school_id'],
'term'=> $data['school']['term'],
'session' => $data['school_sessions'][count($data['school_sessions'])-1],
'status'=> 'paid'
);
$data['payments'] = $this->students_model->get_payments($cond,$offset,$limit);

    $this->load->library('pagination');

    $config['base_url'] = site_url("dashboard/payments");



$config['total_rows'] = count($this->students_model->get_payments($cond,NULL,NULL));

    $config['per_page'] = $limit;

$config['uri_segment'] = 3;
$config['first_tag_open'] = '<span class="w3-btn w3-teal w3-text-white">';
$config['first_tag_close'] = '</span>';
$config['last_tag_open'] = '<br><span class="w3-btn w3-teal w3-text-white">';
$config['last_tag_close'] = '</span>';
$config['first_link'] = 'First';
$config['prev_link'] = 'Previous';
$config['next_link'] = 'Next';
$config['next_tag_open'] = '<span style="" class="w3-btn w3-teal w3-text-white w3-margin-left">';
$config['next_tag_close'] = '</span><br>';
$config['prev_tag_open'] = '<span style="" class="w3-btn w3-teal w3-text-white">';
$config['prev_tag_close'] = '</span>';
//$config['last_link'] = 'Last';
$config['display_pages'] = false;

       $this->pagination->initialize($config);
$data['pagination'] = $this->pagination->create_links();





          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_payments_view',$data);
          $this->load->view('common/footer_view',$data);



    }


    public function fund_account()
    {

$this->form_validation->set_rules('amount','Amount','required');
if (!$this->form_validation->run()) {
      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Fund Account";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_fund_account_view',$data);
          $this->load->view('common/footer_view',$data);
      }else{

    $data['user'] =$this->users_model->get_user_by_id();
$data['amount'] = $this->input->post('amount');

//generate ref
 $array_char = array('A','B','C','D');
    $i = mt_rand(0,3);
    $data['ref'] = 's2g'.uniqid().$array_char[$i];
    $_SESSION['hold'] = array('ref' => $data['ref'],'amount'=>$data['amount'],
    'currency_code'=> "NGN"/*$currency_code*/);

$payment = array(
"user_id" => $data['user']['id'],
"school_id" => $_SESSION['school_id'],
"ref" => $data['ref'],
"method" => "online_payment",
"phone" => $data['user']['phone'],
"amount" => $data['amount'],
"status"=> "pre_paid",
"email"=> $data['user']['email'],
"product"=> "Deposit",
"time"=> time(),
"details" => "Deposit"
);
$this->schools_model->insert_school_payment($payment);

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Account Deposit";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_fund_account_pre_payment_gateway_view',$data);
          $this->load->view('common/footer_view',$data);

      } 


       }




public function confirm_pay_payment()
{

 /* $_SESSION['hold'] = array('ref' => $ref,'amount'=>$amount,'currency_code'=>$currency_code); as saved from frontend*/

  if(!isset($_SESSION['hold']['ref']))
  {
           
$_SESSION['action_status_report'] ="<span class='w3-text-red'>Unknown Error Occurred</span>";
$this->session->mark_as_flash('action_status_report');
show_page("Idcard/pay_fees");
  }

    if (isset($_SESSION['hold']['ref'])) {
        $ref = $_SESSION['hold']['ref'];
        $amount = $_SESSION['hold']['amount']; //Correct Amount from Server
        $currency = $_SESSION['hold']['currency_code']; 
        //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK-e866ec2f42c0e8b718e2d7195c5ffb8a-X",
            "txref" => $ref
        );
         /* $query = array(
            "SECKEY" => "FLWSECK-cc257ca2f7854658a8d5ab2880253f3d-X",
            "txref" => $ref
        );//test*/

        $data_string = json_encode($query);
                
         $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify ');        
        /*$ch = curl_init("https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify"); test */                                 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
          //Give Value and return to Success page
//update payment here 
//update school balance here
$paymentRecord = $this->schools_model->get_school_payment_record_by_ref_id($_SESSION['hold']['ref']);
$school = $this->schools_model->get_school_by_id($paymentRecord['school_id']);
//update school data
$this->schools_model->update_school_details(array(
"fee_balance" => $school['fee_balance']+ $chargeAmount),$paymentRecord['school_id']);

//update payment record to paid
$this->schools_model->update_payment_record(array(
'status' => 'paid'
),$_SESSION['hold']['ref']);

$hold_ref = $ref;
//unset
unset($ref);
//unset session variable here
unset($_SESSION['hold']);

$_SESSION['action_status_report'] ="<span class='w3-text-green'>Payment Successfully Processed</span>";
$this->session->mark_as_flash('action_status_report');

show_page("dashboard/payments");

        } else {
            //Dont Give Value and return to Failure page
          $_SESSION['action_status_report'] ="<span class='w3-text-red'>Payment Failed</span>";
$this->session->mark_as_flash('action_status_report');
show_page("dashboard/fund_account");
        }
    }



}












public function confirm_student_payment()
{
$this->form_validation->set_rules('student_id','Student ID','required');

if (!$this->form_validation->run()) {

  $_SESSION['action_status_report'] = validation_errors();
  $this->session->mark_as_flash('action_status_report');
  show_page('dashboard/payments');
}else{
//get payments by student_id and school_id
  //set conditions based on what user want 

  if ($this->input->post('time_frame') =='current'){
    

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$school_sessions= json_decode($school['session'],true);
$schl_sec_div = json_decode($school['session_division'],true);

$cond = array(
'student_id' => $this->input->post('student_id'),
'school_id'=> $_SESSION['school_id'],
'status' => 'paid',
'term' => $school['term'],
'session' => $school_sessions[count($school_sessions)-1]
);

  
  }else{

$cond = array(
'student_id' => $this->input->post('student_id'),
'school_id'=> $_SESSION['school_id'],
'status' => 'paid',
'term' => $this->input->post('term'),
'session' => $this->input->post('session')
);
  }

  $data['payments'] = $this->students_model->get_payments($cond);


  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Payments";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/view_student_paid_view',$data);
          $this->load->view('common/footer_view',$data);

}


}

public function process_nav_search()
{

  if ($this->input->post("context") == "Staff") {
    
    show_page("dashboard/search_staff");
  }elseif($this->input->post("context") == "Students"){   
    show_page("dashboard/search_students");
  }
}

public function idcard($student_id)
{

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Generate QR Code";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
$data['student_id'] = $student_id;

$this->load->view('users/admin/common/header_view',$data);
$this->load->view('users/admin/common/nav_view',$data);
$this->load->view('users/admin/common/sidebar_view',$data);
$this->load->view('users/admin/common/content_top_view',$data);
$this->load->view('users/admin/idcard_view',$data);
$this->load->view('common/footer_view',$data);


}
    public function website()
    {


  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Activate your online presence";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
      $this->load->view('users/admin/admin_website_view',$data);
          $this->load->view('common/footer_view',$data);



    }


public function change_session()
{
  $this->form_validation->set_rules('session','Session','required',array('required' => "Please choose a session"));
  if(!$this->form_validation->run())
  {


    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Change Session";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school_id'] = $_SESSION['school_id'];
$arr = array(
"school_id" => 
$data['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($school['session'],true);



          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/change_session_view',$data);
          $this->load->view('common/footer_view',$data);

  }else{

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$school_sessions = json_decode($school['session'],true);
//make array unique here

if(!in_array($this->input->post('session'), $school_sessions))
{

  array_push($school_sessions, $this->input->post('session'));
}else{
  //push to the last index
  $new_session_key = array_search($this->input->post('session'), $school_sessions);
  $temp=$school_sessions[$new_session_key];
  $school_sessions[$new_session_key] = $school_sessions[count($school_sessions)-1];
  $school_sessions[count($school_sessions)-1] = $temp;
  unset($temp);
}


$this->schools_model->insert_sessions(json_encode($school_sessions),$school['id']);



$_SESSION['action_status_report'] = "<span class='w3-text-green'>Session Changed Successfully</span>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/change_session');


  }

}

public function change_term()
{
  $this->form_validation->set_rules('term','Term or Division','required',array('required' => "Please a Division or Term of this Session"));
  if(!$this->form_validation->run())
  {


    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Change Term";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


$data['school_id'] = $_SESSION['school_id'];
$data['schl_sec_div'] = json_decode($this->schools_model->get_school_by_id($_SESSION['school_id'])['session_division']);


$arr = array(
"school_id" => 
$data['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);

$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);



          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/change_term_view',$data);
          $this->load->view('common/footer_view',$data);

  }else{

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);


$this->schools_model->change_term($this->input->post('term'),$school['id']);



$_SESSION['action_status_report'] = "<span class='w3-text-green'>Term Changed Successfully</span>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/change_term');


  }



}


public function set_student_option()
{

$this->form_validation->set_rules("options","Options","required");
if ($this->form_validation->run()) {
//split by comma
  //convert to array
  //convert array to text save
  $options_array = explode(",", $this->input->post('options'));
  $this->schools_model->save_student_options(json_encode($options_array,true),$_SESSION['school_id']);

$_SESSION['action_status_report'] = "<span class='w3-text-green'>Student Optons Saved Successfully</span>";
  $this->session->mark_as_flash('action_status_report');
 show_page('dashboard/school_settings#options');

}else {
  $_SESSION['action_status_report'] = validation_errors();
  $this->session->mark_as_flash('action_status_report');

 show_page('dashboard/school_settings#options');



}




}


    public function view_staff_list($offset = 0)
    {

      $limit =8;
      $cond = array(
     "school_id" => $_SESSION['school_id']
      );
    $data['items'] = $this->staff_model->get_school_staff_members($cond,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("dashboard/view_staff_list");



  $config['total_rows'] = count($this->staff_model->get_school_staff_members($cond,NULL,NULL));

    $config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
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
      $data['title'] = $this->siteName." | Staff Members";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
         $this->load->view('users/admin/admin_staff_list_view',$data);
          $this->load->view('common/footer_view',$data);



    }

public function result_settings()
{

 $this->form_validation->set_rules('access_type','Result Access Type','required',array('required' => "Please choose Result Access Type"));
  if(!$this->form_validation->run())
  {

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Result Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school_id'] = $_SESSION['school_id'];
$arr = array(
"school_id" => 
$data['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($school['session'],true);

$data['school'] = $school;

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_result_settings_view',$data);
          $this->load->view('common/footer_view',$data);

  }else{

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$school_sessions = json_decode($school['session'],true);
//make array unique here
$levels = json_encode($this->input->post('level'),true);
$access_type =$this->input->post('access_type');
$price = $this->input->post('amount');

$this->schools_model->edit_school(array(
  'show_position'=>$levels, 'result_access'=>$access_type,
  'result_access_price' => $price
),$school['id']);

//return;
$_SESSION['action_status_report'] = "<span class='w3-text-green'>Result Settings Changed Successfully</span>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/result_settings');


  }



}

    public function view_students_list($offset = 0)
    {

      $limit =8;
      $cond = array(
     "school_id" => $_SESSION['school_id']
      );
    $data['items'] = $this->students_model->get_school_students($cond,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("dashboard/view_students_list");



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
  $config['next_tag_open'] = '<span style="" class="w3-btn w3-theme w3-margin-left w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-theme w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();






  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Students List";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
         $this->load->view('users/admin/admin_students_list_view',$data);
          $this->load->view('common/footer_view',$data);



    }


       public function school_settings(){
      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | School Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


$data['school_id'] = $_SESSION['school_id'];
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['schl_sec_div'] = json_decode($this->schools_model->get_school_by_id($_SESSION['school_id'])['session_division']);



$data['options'] = implode(",",json_decode($this->schools_model->get_student_option($_SESSION['school_id']),true));

$arr = array(
"school_id" => 
$data['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_school_settings_view',$data);
          $this->load->view('common/footer_view',$data);



    }

public function set_level_details()
{

$this->form_validation->set_rules("level","Education Level","required"
,array('required' => "Education Level is required" ));

$this->form_validation->set_rules("class_name","Class Name","required"
,array('required' => "Class Name is required" ));


if(!$this->form_validation->run())
{
$_SESSION['action_status_report'] = "<span class='w3-text-red'>".validation_errors()."</span>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/school_settings');


}else{



$school_id = $_SESSION['school_id'];




$lev = array(
'level' => $this->input->post('level'),
'level_name' => $this->input->post('class_name'),
'level_shortname' => $this->input->post('class_short_name'),
'school_id' => $school_id
);
$this->schools_model->insert_level($lev);


$_SESSION['action_status_report'] = "<span class='w3-text-green'>School Level Added Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/school_settings');



}

}
public function manage_fee()
{

$this->form_validation->set_rules("fee_title","Fee Title","required");
$this->form_validation->set_rules("fee_amount","Fee Amount","required|is_numeric");
$this->form_validation->set_rules("class_level","Class or Level","required");

$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);
$data['schl_sec_div'] = json_decode($data['school']['session_division'],true);

$data['options'] = json_decode($this->schools_model->get_student_option($_SESSION['school_id']),true);


if (!$this->form_validation->run()) {
   $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Add FEE";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
$data['added_subjects'] = $this->schools_model->get_subjects($_SESSION['school_id']);
$data['schl_sec_div'] = json_decode($this->schools_model->get_school_by_id($_SESSION['school_id'])['session_division']);

$data['fees'] = $this->schools_model->get_fees(array("session"=> $data['school_sessions'][count($data['school_sessions'])-1], "school_id"=>$_SESSION["school_id"],"term" => $data['school']['term']));
$data['level_data']  = $this->schools_model->get_levels(array("school_id" => $_SESSION['school_id']));

 $arr = array(
"school_id" => 
$_SESSION['school_id']
);
$data['levels'] = $this->schools_model->get_levels($arr);


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_manage_fee_view',$data);
          $this->load->view('common/footer_view',$data);

}else{

$fee_data= array("fee_title"=>$this->input->post("fee_title"),"amount"=>$this->input->post("fee_amount"),"level"=>$this->input->post("class_level"),"session" => $data['school_sessions'][count($data['school_sessions'])-1],"term" => $data['school']['term'],
  "option" => $this->input->post("option"),
  "school_id" => $_SESSION["school_id"],
  "time" => time()
);
//check for duplicate
$search_dup = $this->schools_model->get_fees(array("fee_title"=>$this->input->post("fee_title"),"amount"=>$this->input->post("fee_amount"),"level"=>$this->input->post("class_level"),"session" => $data['school_sessions'][count($data['school_sessions'])-1],"term" => $data['school']['term'],
  "option" => $this->input->post("option"),
  "school_id" => $_SESSION["school_id"]
));
if(empty($search_dup))
{
  $this->schools_model->insert_new_fee($fee_data);

}



$_SESSION['action_status_report'] = "<span class='w3-text-green'>FEE Added Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/manage_fee');
}



}

    
public function set_term_details()
{

$this->form_validation->set_rules("division","Division","required"
,array('required' => "Division Number is required" ));


if(!$this->form_validation->run())
{
$_SESSION['action_status_report'] = "<span class='w3-text-red'>".validation_errors()."</span>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/school_settings#division');


}else{
$no = $this->input->post('division');

$arr= [];
for ($i=1; $i <= $no; $i++) { 
  if(!empty($this->input->post('name_'.$i)))
  {
array_push($arr, $this->input->post('name_'.$i));
}
}

$session_divisions = json_encode($arr);
$school_id = $_SESSION['school_id'];




$divi = array(

'session_division' => $session_divisions
);
$this->schools_model->edit_session_division($divi,$school_id);


$_SESSION['action_status_report'] = "<span class='w3-text-green'>School Session Division Added Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/school_settings');



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


$data['options'] = json_decode($this->schools_model->get_student_option($_SESSION['school_id']),true);
  

      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/admin_manage_students_view',$data);
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
'password' => md5('parentpass'),
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


show_page('dashboard/student_details/'.$ref_id);
}
}

  public function search_students($offset = 0)
  {
    $input_text = $this->input->post('search');
    
      $limit = 10;
    $data['items']= $this->students_model->search_students($input_text,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("dashboard/search_students");



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
  $config['next_tag_open'] = '<span style="" class="w3-btn w3-theme w3-margin-left w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-theme w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Search Students";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/student_search_view',$data);
      $this->load->view('common/footer_view',$data);




  }

public function cbt_application_form()
{
$this->form_validation->set_rules("address","Address" ,"required");
$this->form_validation->set_rules("phone","Phone Number","required");
$this->form_validation->set_rules("plan","Estimated Number Of Students","required");

if (!$this->form_validation->run()) {
 

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | CBT Software Application";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/request_cbt_setup_view',$data);
      $this->load->view('common/footer_view',$data);

}else{

$request = array(
"address"=>$this->input->post("address"),
"phone"=>$this->input->post("phone"),
"plan" => $this->input->post("plan"),
"time"=>time(),
"school_id" => $_SESSION['school_id'],
"status"=> "new"
);

$this->schools_model->make_new_cbt_request($request);


    $_SESSION['action_status_report'] = '<span class="w3-text-green">Request Submitted Successfully <br>Our Agent Nearest To you will contact you as soon as possible<br>Thank You</span>';
    $this->session->mark_as_flash('action_status_report');


     show_page('dashboard/cbt_application_form');


}
}

  public function search_staff($offset = 0)
  {


$input_text = $this->input->post('search');
      $limit = 10;
    $data['items'] = $this->staff_model->search_staff($input_text,$limit,$offset);
      $this->load->library('pagination');

    $config['base_url'] = site_url("dashboard/search_staff");



  $config['total_rows'] = count($this->staff_model->search_staff($input_text,NULL,NULL));

    $config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
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
      $data['title'] = $this->siteName." | Search Staff";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/staff_search_view',$data);
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

    show_page('dashboard/student_details/'.$reg_no);



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

    show_page('dashboard/student_details/'.$reg_no);



}

    public function student_details($id)
    {

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Manage Result";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
$data['school_id'] = $_SESSION['school_id'];

    $data['student'] = $this->students_model->get_student_by_reg_no($id);
   $data['student']['class'] = $this->schools_model->get_class_name_by_level($data['student']['class'],$data['school_id']);



          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_post_student_reg_view',$data);
          $this->load->view('common/footer_view',$data);



    }


    public function staff_details($id)
    {

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Staff Details";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school_id'] = $_SESSION['school_id'];

    $data['staff'] = $this->staff_model->get_staff_member_by_reg_no($id);

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_post_staff_reg_view',$data);
          $this->load->view('common/footer_view',$data);



    }

public function application_form()
{

$this->form_validation->set_rules('field_name[]','Field Name','required',array('required' => 'You must create atleast one form element'));

if(!$this->form_validation->run())
{
     $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Application Form";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_create_application_form_view',$data);
          $this->load->view('common/footer_view',$data);


  }else{

$field_types = $this->input->post('type');
$field_names = $this->input->post('field_name');


$field_values = $this->input->post('fieldselectitem');
/*
echo "<br>Field Types <br>";
var_dump($field_types);

echo "<br>Field Names <br>";
var_dump($field_names);


echo "<br>Field Values <br>";
var_dump($fieldvalues);*/
$no_expected_field = count($field_types);
$form_makeup_data = [];
for ($i=0; $i < $no_expected_field  ; $i++) { 

if(!empty($field_names[$i]))
{
$form_makeup_data[$i] = array('field_type' => $field_types[$i],'field_names' => $field_names[$i],'field_values' => $field_values[$i] );
}
}
//add time field here 
array_push($form_makeup_data, array('field_type' => 'inbuilt','field_names' => 'time','field_values' => '' ));

$ref_id = substr(md5(time()), 12);
$this->advertiser_model->insert_cpa_form(json_encode($form_makeup_data),$ref_id);

show_page('advertiser_dashboard/post_form_addition/'.$ref_id);
  }
}





    public function logout()
    {


     $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Sign Out";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
       unset($_SESSION["id"]);
    unset($_SESSION["logged_in"]);


    $_SESSION['err_msg'] = 'You are Successfully logged out';
    $this->session->mark_as_flash('err_msg');


     show_page('login');
    

    }



public function set_fee_option()
{
$this->schools_model->set_fee_option();
 $_SESSION['action_status_report'] = '<span class="w3-text-green">FEE option saved Successfully</span><br>';
    $this->session->mark_as_flash('action_status_report');
     show_page('dashboard/school_settings');
}





public function add_offline_payment()
{


$this->form_validation->set_rules('student_id','Student ID','required');
$this->form_validation->set_rules('amount','Amount','required|is_numeric');
$this->form_validation->set_rules('det','Session Option','required');

if (!$this->form_validation->run()){
  
  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Add offline Payment";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$data['school_sessions'] = json_decode($data['school']['session'],true);
$data['schl_sec_div'] = json_decode($data['school']['session_division'],true);
 



          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_add_offline_payment_view',$data);
          $this->load->view('common/footer_view',$data);
}else{

$student = $this->students_model->get_student_by_reg_no($this->input->post('student_id'));

//generate ref
 $array_char = array('A','B','C','D');
    $i = mt_rand(0,3);
    $ref = 'off'.uniqid().$array_char[$i];

if ($this->input->post('det') == 'set') {
  //get session input
  $offline_payment = array(
'student_id' => $this->input->post('student_id'),
'school_id' => $_SESSION['school_id'],
'ref'=> $ref,
'method'=> 'offline_payment',
'amount'=>$this->input->post('amount'),
'status'=> "paid",
'term'=> $this->input->post('term'),
'session'=> $this->input->post('session'),
'level' => $student['class'],
'time'=> time()
);
}else{
  //use current
$school= $this->schools_model->get_school_by_id($_SESSION['school_id']);
//use session set by admin
$school_sessions = json_decode($school['session'],true);
$session = $school_sessions[count($school_sessions)-1];
$term = $school['term'];
 $offline_payment = array(
'student_id' => $this->input->post('student_id'),
'school_id' => $_SESSION['school_id'],
'ref'=> $ref,
'method'=> 'offline_payment',
'amount'=>$this->input->post('amount'),
'status'=> "paid",
'term'=> $term,
'session'=> $session,
'level' => $student['class'],
'time'=> time()
);

}
//insert the array offline_payment

$this->schools_model->insert_student_payment($offline_payment);

$_SESSION['action_status_report'] = '<span class="w3-text-green">Offline Payment added Successfully</span><br>';
    $this->session->mark_as_flash('action_status_report');
     show_page('dashboard/add_offline_payment');

}
}

public function upgrade_account()
{
$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);

//check if not expire and already upgraded
if (($school['license'] == "active" && time() < $school['license_expire']) || ($school['license'] == "active" && time() > $school['license_expire'])){
  show_page('dashboard/renew_account');
}

  //check if not a new customer and redirect to renewal page

$this->form_validation->set_rules('domain','Domain','required');
if (!$this->form_validation->run()) {
      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Upgrade Account";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_upgrade_account_view',$data);
          $this->load->view('common/footer_view',$data);
      }else{
 //select package by title
 $package = $this->schools_model->get_package_by_title($this->input->post('domain'));
//check if balance 
//if yes upgrade for 365
//alert admin

if ($school['account_balance'] >= $package['promo_price'] && $school['account_balance']>1)
{
  $new_bal = $school['account_balance']-$package['promo_price'];
$this->schools_model->update_school_details(array("account_balance" => $new_bal ),$_SESSION['school_id']);
$expiry_secs = time()+(365*24*60*60);
//update school
$this->schools_model->update_school_details(array("license"=>"active","license_expire"=> $expiry_secs ),$_SESSION['school_id']);
//notify admin
$subscription = array(
"package_id" => $package['id'],
"school_id"=> $_SESSION['school_id'],
"status" => "pending",
"time"=> time() 
);
$this->schools_model->insert_subscription($subscription);


$_SESSION['action_status_report'] = "<span class='w3-text-green w3-center'>Account Upgraded Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');

  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Upgrade Successfull";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school'] =$school;


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_upgrade_success_view',$data);
          $this->load->view('common/footer_view',$data);

return;
}else{
$_SESSION['action_status_report'] = "<span class='w3-text-red w3-center'>Insufficient Balance</span><br>";
}
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/upgrade_account');


    
      } 
}





public function renew_account()
{
$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);

//check if not expire and already upgraded
if ($school['license'] == "trial"){
  show_page('dashboard/upgrade_account');
}

  //check if  a new customer and redirect to upgrade page

$packages = $this->schools_model->get_packages();
$last_package = $packages[count($packages)-1];
$package_obj = $this->schools_model->get_package_by_id($last_package['package_id']);
$data['package_obj']= $package_obj;

if (!isset($_POST['submit'])){

   $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Renew Account";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_renew_account_view',$data);
          $this->load->view('common/footer_view',$data);
      }else{
//check if balance 
//if yes upgrade for 365
//alert admin

if ($school['account_balance'] >= $package_obj['normal_price'] && $school['account_balance']>1)
{
  $new_bal = $school['account_balance']-$package_obj['normal_price'];
$this->schools_model->update_school_details(array("account_balance" => $new_bal ),$_SESSION['school_id']);
$expiry_secs = $school['license_expire']+(365*24*60*60);
//update school
$this->schools_model->update_school_details(array("license"=>"active","license_expire"=> $expiry_secs ),$_SESSION['school_id']);
//notify admin
$subscription = array(
"package_id" => $package_obj['id'],
"school_id"=> $_SESSION['school_id'],
"status" => "pending",
"time"=> time() 
);
$this->schools_model->insert_subscription($subscription);


$_SESSION['action_status_report'] = "<span class='w3-text-green w3-center'>Account Renewed Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
  $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Renew Successfull";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$data['school'] =$school;


          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
        $this->load->view('users/admin/admin_renew_success_view',$data);
          $this->load->view('common/footer_view',$data);

return;
}else{
$_SESSION['action_status_report'] = "<span class='w3-text-red w3-center'>Insufficient Balance</span><br>";
}
$this->session->mark_as_flash('action_status_report');
show_page('dashboard/renew_account');


    
      } 
}



}