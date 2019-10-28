<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Gettew_dashboard_cont extends CI_Controller {
    /*

    Name:Gettew
    Date:Start Rewriting  it on 4 sep, 2018 6:25:49 PM



    */

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('users_model','schools_model','parents_model','staff_model','students_model','blog_model'));
      $this->load->helper(array('url','form','page_helper'));
        $this->load->library(array('form_validation','session','user_agent'));





      if (!isset($this->session->id) || !isset($this->session->logged_in))
       {    
       show_page('login');     }


    }

    public function choose_location()
    {
      //check if already set


      if(!empty($this->users_model->get_user_by_its_id($_SESSION['id'])['country']))
      {
        show_page('Gettew_dashboard');
      }


    $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Choose Location";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
 

$this->form_validation->set_rules('country_s', 'Country','required');
$this->form_validation->set_rules('state_s', 'State','required');
if(!$this->form_validation->run())
{
  $this->load->view('users/admin/common/header_view',$data);
  $this->load->view('users/admin/common/nav_view',$data);
  $this->load->view('users/admin/common/sidebar_view',$data);
  $this->load->view('users/admin/common/content_top_view',$data);
  $this->load->view('users/admin/gettew_admin_location_view',$data);
  $this->load->view('common/footer_view',$data);

}else{

$loc = array(
  'state' => $this->input->post('state_s'),
    'country' => $this->input->post('country_s')
  );

$this->users_model->edit_user_location($loc);

$_SESSION['action_status_report'] = "<span class='w3-text-green w3-center'>Location Saved Successfully</span><br>";
$this->session->mark_as_flash('action_status_report');
show_page('Gettew_dashboard/school_settings');

}


    }

public function send_sms($user_type=NULL,$user_id=NULL)
    {



    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew | Send SMS";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
   
$data['levels'] = $this->schools_model->get_levels(array(
"school_id" => 
$_SESSION['school_id']
));

$this->form_validation->set_rules("name","Sender Name","required|max_length[10]");
$this->form_validation->set_rules("message","Message","required|max_length[160]");
if(!$this->form_validation->run())
{

         
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
      $this->load->view('users/admin/gettew_admin_sms_view',$data);
          $this->load->view('common/footer_view',$data);

}else{
//remember to check for deduction here per sms


  
if(!empty($this->uri->segment(3)))
{
//get user base on user type
  switch ($this->uri->segment(3)) {
    case 'parent':
     
     $receiver = $this->parents_model->get_parent_by_id($user_id);
      break;
     case 'staff':
     
     $receiver = $this->staff_model->get_staff_member_by_reg_no($user_id);
      break;
  }
 $phone = $receiver['phone'];

$sender_name= $this->input->post("name");
$_SESSION['message'] = $this->input->post("message");
$number_arrays = array($phone);

//use api here
}else{
  switch ($this->input->post('receiver_type')) {
    case 'Parents':
     //get parents number and set its result to a variable of type array

   

   $number_arrays= [];

 $md_parents_phone_array = $this->parents_model->get_parents_phones(array());
for ($i=0; $i < count($md_parents_phone_array); $i++) { 
  array_push($number_arrays, $md_parents_phone_array[$i]['phone']);
}

    break;
     case 'Academics':
     //get Academics staff number and  set its result to a variable of type array

   $number_arrays= [];

 $md_staff_phone_array = $this->staff_model->get_staff_phones(array("staff_type" => "Academics"));
for ($i=0; $i < count($md_staff_phone_array); $i++) { 
  array_push($number_arrays, $md_staff_phone_array[$i]['phone']);
}
   

      break; 
     case 'Non-academics':
     //get Non Academic Staff number and  set its result to a variable of type array

   $number_arrays= [];

 $md_staff_phone_array = $this->staff_model->get_staff_phones(array("staff_type" => "Non-academics"));
for ($i=0; $i < count($md_staff_phone_array); $i++) { 
  array_push($number_arrays, $md_staff_phone_array[$i]['phone']);
}
   
   
      break;
       case 'All_staff':
     //get Non Academic Staff number and  set its result to a variable of type array

   $number_arrays= [];

 $md_staff_phone_array = $this->staff_model->get_staff_phones(array());
for ($i=0; $i < count($md_staff_phone_array); $i++) { 
  array_push($number_arrays, $md_staff_phone_array[$i]['phone']);
}
   

      break;
        case 'parent_of':
     //get  number of parents of a certain class and  set its result to a variable of type array
$level = $this->input->post('class_level');
$parents_id_array= [];

 $md_parents_id_array = $this->students_model->get_parents_ids(array("class"=> $level));
for ($i=0; $i < count($md_parents_id_array); $i++) { 
  array_push($parents_id_array, $md_parents_id_array[$i]['parent_id']);
}


$number_arrays = [];
for ($i=0; $i < count($parents_id_array) ; $i++) { 
 
$parent = $this->parents_model->get_parent_by_id($parents_id_array[$i]);

array_push($number_arrays, $parent['phone']);

}

      break;
      case 'specify':

$number_arrays = [];
//add multiple phone number support here later

array_push($number_arrays, $this->input->post('phone'));

     break;
  }

//send to each number here



}

$_SESSION['receivers'] = $number_arrays;






    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew | Confirm SMS";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
   
 $data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);    
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
      $this->load->view('users/admin/gettew_admin_confirm_sms_view',$data);
          $this->load->view('common/footer_view',$data);



//echo var_dump($number_arrays);

}

    }

public function process_sms()
{
if($_POST['action'] == "cancel"){
  unset($_SESSION['receivers']);
unset($_SESSION['message']);
 $_SESSION['action_status_report'] = "<span class='w3-text-green'>Action Cancelled Successfully!</span>";
    $this->session->mark_as_flash('action_status_report');

    show_page('Gettew_dashboard_cont/send_sms');
   

}else{

$school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
$school_sessions = json_decode($school['session'],true);
$session = $school_sessions[count($school_sessions)-1];

$_SESSION['last_sms_ref'] = substr(md5(time()), 0);


foreach ($_SESSION['receivers'] as $receiver) {
  
//send to each
if ($receiver[0] == '0') {
    $receiver = "234".substr($receiver, 1);
}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.africastalking.com/version1/messaging");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'apiKey: 4af309e4a89b0107ec07b5268ae4abc99b3ef1696208a2371c70cf1670200a87',
    'Content-Type:application/x-www-form-urlencoded',
    'Accept:application/json'
));
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, 
         http_build_query(array('username' => 'gettew','to' => $receiver,'message'=> $_SESSION['message'])));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);
$result_array = json_decode($server_output,true); 
$this->schools_model->insert_sms_history(array(
"school_id" => $_SESSION['school_id'],
"message" => $_SESSION['message'],
"receiver" => $receiver,
"session" => $session,
"term" => $school['term'],
"ref" => $_SESSION['last_sms_ref'],
"status" =>$result_array['SMSMessageData']['Recipients'][0]['status'] ,
"message_id" =>$result_array['SMSMessageData']['Recipients'][0]['messageId'] ,
"time" => time()
));

}
if ($result_array['SMSMessageData']['Recipients'][0]['status'] == "Success") {

$school['account_balance'] = $school['account_balance']-3;
$school['amount_spent'] =$school['amount_spent']+3;

$this->schools_model->edit_school(array("account_balance" => $school['account_balance'],"amount_spent"=> $school['amount_spent']),$_SESSION['school_id']);

    //deduct money
  //$hold= 1;
}
   
}

 unset($_SESSION['receivers']);
unset($_SESSION['message']);

    show_page('Gettew_dashboard_cont/post_send_sms');

}
 
public function post_send_sms()
{





    $data['web_favicon_slug'] = "assets/images/favicon.ico";
    $data['description'] = NULL;
    $data["title"] ="Gettew | SMS Status";
    $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
    $data["author"] ="Ojeyinka olaniyi philip";
    $data["descriptions"] ="Online and offline school Management Service for schools
    and colleges";
    $data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
   
 $data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);   

 $data['messages'] = $this->schools_model->get_messages(array("school_id"=> $_SESSION['school_id'],"ref" => $_SESSION['last_sms_ref']  )); 
          $this->load->view('users/admin/common/header_view',$data);
          $this->load->view('users/admin/common/nav_view',$data);
          $this->load->view('users/admin/common/sidebar_view',$data);
          $this->load->view('users/admin/common/content_top_view',$data);
      $this->load->view('users/admin/gettew_admin_post_sms_view',$data);
          $this->load->view('common/footer_view',$data);



}


/*
array("SMSMessageData" => array("Message" => "Sent to 1/1 Total Cost: NGN 2.2000", "Recipients"=> array(array("cost"=> "NGN 2.2000",
"messageId" => "ATXid_67598fe82ed2898fafdc0279579248a7","messageParts"=>1,
"number"=> "+2347086825489","status"=> "Success","statusCode" => 101
)) ));*/

public function action($action,$object_type,$post_id,$action_ref)
{
  if ($object_type == "post"){
   //treat post and set status as published

    $this->blog_model->post_action($action,$post_id,$action_ref );
    $_SESSION['display_modal'] = true;
    $this->session->mark_as_flash("display_modal");
show_page('Gettew_dashboard');

  }elseif($object_type == "sms"){
//send sms to sms part
if ($action == "approve"){
  $msg = $this->blog_model->get_pending_msg_by_ref($action_ref);
  $receiver = $this->parents_model->get_parent_by_id($msg['user_id']);
  $_SESSION['receivers'] = [];

  array_push($_SESSION['receivers'], $receiver['phone']);
$_SESSION['message']= $msg['message'];

show_page('Gettew_dashboard_cont/process_sms');
}else{

$this->blog_model->disapprove_sms($action_ref);
 $_SESSION['display_modal'] = true;
    $this->session->mark_as_flash("display_modal");
    show_page('Gettew_dashboard');
}
 }

}

public function test()
{
  $receiver = "07086825489";
  if ($receiver[0] == "0") {
    
   $receiver = "234".substr($receiver, 1);
   echo $receiver;
 }
}
public function generate_result_checker()
{


$this->form_validation->set_rules("quantity","Quantity" ,"required");

if (!$this->form_validation->run()) {
 


$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
$data["title"] ="Gettew |  Generate Result";
$data["keywords"] ="gettew,school,free,Management,Software,result,checking";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="Online and offline school Management Service for schools
and colleges";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);



      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/gettew_generate_result_checker_view',$data);
      $this->load->view('common/footer_view',$data);

}else{
  //only insert after successful deduction
  $school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
  //deduct the cost of checker card
if ($school['account_balance'] >= ($this->input->post('quantity')*100)) { 
$new_balance = $school['account_balance']- ($this->input->post('quantity')*100);
  $this->schools_model->edit_school(array(
'account_balance' => $new_balance
  ),$_SESSION['school_id']);

$this->schools_model->insert_card_request(array('school_id'=> $_SESSION['school_id'],
  'phone' => $this->input->post('phone'),
  'quantity' =>$this->input->post('quantity'),
  'status'=> 'pending',
  'time'=> time() 

));
}else{
//account balance is low
  
$_SESSION['action_status_report'] = '<span class="w3-text-red">Account Balance is Low Please Fund Your Account <br>Click on fund account in the top left of this screen.</span>';
    $this->session->mark_as_flash('action_status_report');

show_page('Gettew_dashboard_cont/generate_result_checker');

}
    $_SESSION['action_status_report'] = '<span class="w3-text-green">Request Submitted Successfully <br>Our Agent Nearest To you will contact you as soon as possible<br>Thank You</span>';
    $this->session->mark_as_flash('action_status_report');

show_page('Gettew_dashboard_cont/generate_result_checker');


}


}


public function idcard_request()
{


$this->form_validation->set_rules("quantity","Quantity" ,"required");

if (!$this->form_validation->run()) {
 


$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
$data["title"] ="Gettew |  Generate Result";
$data["keywords"] ="gettew,school,free,Management,Software,result,checking";
$data["author"] ="Ojeyinka olaniyi philip";
$data["descriptions"] ="Online and offline school Management Service for schools
and colleges";
$data["noindex"] ='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
$data['school'] = $this->schools_model->get_school_by_id($_SESSION['school_id']);



      $this->load->view('users/admin/common/header_view',$data);
      $this->load->view('users/admin/common/nav_view',$data);
      $this->load->view('users/admin/common/sidebar_view',$data);
      $this->load->view('users/admin/common/content_top_view',$data);
    $this->load->view('users/admin/gettew_request_idcard_view',$data);
      $this->load->view('common/footer_view',$data);

}else{
  //only insert after successful deduction
  $school = $this->schools_model->get_school_by_id($_SESSION['school_id']);
  //deduct the cost of checker card
if ($school['account_balance'] >= ($this->input->post('quantity')*500)) { 
$new_balance = $school['account_balance']- ($this->input->post('quantity')*500);
  $this->schools_model->edit_school(array(
'account_balance' => $new_balance
  ),$_SESSION['school_id']);

$this->schools_model->insert_idcard_request(array('school_id'=> $_SESSION['school_id'],
  'phone' => $this->input->post('phone'),
  'quantity' =>$this->input->post('quantity'),
  'type' => $this->input->post('type'),
  'status'=> 'unread',
  'time'=> time() 

));
}else{
//account balance is low
  
$_SESSION['action_status_report'] = '<span class="w3-text-red">Account Balance is Low Please Fund Your Account <br>Click on fund account in the top left of this screen.</span>';
    $this->session->mark_as_flash('action_status_report');

show_page('Gettew_dashboard_cont/idcard_request');

}
    $_SESSION['action_status_report'] = '<span class="w3-text-green">Request Submitted Successfully <br>Our Agent Nearest To you will contact you as soon as possible<br>Thank You</span>';
    $this->session->mark_as_flash('action_status_report');

show_page('Gettew_dashboard_cont/idcard_request');


}


}



}
