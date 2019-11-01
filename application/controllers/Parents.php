<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Parents extends CI_Controller {
    /*
    Name:Gettew
    Date:Start 2019 may 11:18AM
    */



    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('users_model','schools_model',
          'students_model','parents_model','websites_model','staff_model','blog_model','back_model'));
      $this->load->helper(array('url','form','page_helper','result_helper'));
        $this->load->library(array('form_validation','user_agent'));



   
      if (!isset($this->session->parent_id) || !isset($this->session->parent_logged_in))
       {    
       show_page('parents/login');
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
      $data['title'] = $this->siteName." | Parents' Dashboard";;
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
    
$data['parent']= $this->parents_model->get_parent_by_id($_SESSION['parent_id']);

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/dashboard_view',$data);
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


 public function change_phone($slug = null)
 {
      $this->form_validation->set_rules("current_password","Password","trim|required");
    $this->form_validation->set_rules("new_phone","New Mobile Number","trim|required|is_unique[parents.phone]");
    



    if ($this->form_validation->run() ==  FALSE)
   {
$_SESSION['action_status_report'] = "<span class='w3-text-red'".validation_errors()."</span>";
    $this->session->mark_as_flash('action_status_report');

      show_page('parents/settings');


}else{
//change here
    $user_det =   $this->staff_model->get_parent_by_id($_SESSION['parent_id']);
 if ($user_det['password'] == md5(trim($this->input->post('current_password')))){//change Phone
if( $this->parents_model->insert_new_phone())
  { //show suc message

            $_SESSION['action_status_report'] = '<b class="w3-text-green">Phone Number changed successfully</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("parents/account_settings");
          }else{

              //show err message

             $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('action_status_report');
              show_page("parents/account_settings"); }
 }else{
                  //incorrect password  error page
   $_SESSION["action_status_report"] = '<b class="w3-text-red">The Password you entered is incorrect</b><br>';
    $this->session->mark_as_flash('action_status_report');
    show_page("parents/account_settings");
     }
}
 }

 public function change_password($slug = null)
 {
    $this->form_validation->set_rules("current_password","Current Password","trim|required");
    $this->form_validation->set_rules("new_password","New Password","trim|required|is_unique[parents.password]");
    $this->form_validation->set_rules("confirm_password","Confirm New Password","trim|required|matches[new_password]");
    if ($this->form_validation->run() ==  FALSE)
   {
    $_SESSION['action_status_report'] = "<span class='w3-text-red'".validation_errors()."</span>";
    $this->session->mark_as_flash('action_status_report');

      show_page('parents/account_settings');

}else{

//change here



    $user_det =   $this->staff_model->get_parent_by_id($_SESSION['parent_id']);

       if ($user_det['password'] == md5(trim($this->input->post('current_password'))))
       {
        //change password
          if( $this->parents_model->insert_new_password())
          {
             //show suc message

$_SESSION['action_status_report'] = '<b class="w3-text-green">Password changed successfully</b><br>';
$this->session->mark_as_flash('action_status_report');
show_page("parents/account_settings");
          }else{

  //show err message

 $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
  $this->session->mark_as_flash('action_status_report');
  show_page("parents/account_settings");


          }

       }else{
                   //incorrect password  error page
             $_SESSION["action_status_report"] = '<b class="w3-text-red">The Current Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("parents/account_settings");
       }
}
}
public function pay_fees($child_id= NULL)
{
if($child_id == NULL)
  {


$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | Select Child";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    
$data['parent']= $this->parents_model->get_parent_by_id($_SESSION['parent_id']);
$data['children'] = $this->students_model->get_students_by_parent_id($_SESSION['parent_id']);


       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/select_child_view',$data);
    $this->load->view('common/footer_view',$data);


  }else{





$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | FEES";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";

    $data['child'] = $this->students_model->get_student_by_reg_no($child_id);
$data['parent']= $this->parents_model->get_parent_by_id($data['child']['parent_id']);
$data['child_level'] = $this->schools_model->get_level_by_class($data['child']['class'],$data['child']['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($data['child']['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$session = $data['school_sessions'][count($data['school_sessions'])-1];
$term = $data['school']['term'];
//school_id term session 
 $data['payable_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and school_id and or fee_option == "general" and fee_option == myoptio level== level

  $data['payable_fees'] = $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
  //get fee by current session and school_id and or fee_option == "general" level== level

  $data['payable_fees'] =  $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);

}

//paid fees
$data['paid_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and term child_id

  $data['paid_fees'] = $this->parents_model->get_divisional_paid_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
 //divisional
  //get fee by current division/term and session and child_id
  $data['paid_fees'] =  $this->parents_model->get_sessional_paid_fees($session,$data['school']['id'],$data['child']);

}

       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/fees_view',$data);
        $this->load->view('common/footer_view',$data);







  }
}



public function manage_payments($child_id= NULL)
{
if($child_id == NULL)
  {

      $data['web_favicon_slug'] = "assets/images/favicon.ico";
      $data['title'] = $this->siteName." | Select Child";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
    

$data['parent']= $this->parents_model->get_parent_by_id($_SESSION['parent_id']);
$data['children'] = $this->students_model->get_students_by_parent_id($_SESSION['parent_id']);


       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/select_child_view',$data);
    $this->load->view('common/footer_view',$data);


  }else{





$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | Manage Payments";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";

    $data['child'] = $this->students_model->get_student_by_reg_no($child_id);
$data['parent']= $this->parents_model->get_parent_by_id($data['child']['parent_id']);
$data['child_level'] = $this->schools_model->get_level_by_class($data['child']['class'],$data['child']['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($data['child']['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$session = $data['school_sessions'][count($data['school_sessions'])-1];
$term = $data['school']['term'];
//school_id term session 
 $data['payable_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and school_id and or fee_option == "general" and fee_option == myoptio level== level

  $data['payable_fees'] = $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
  //get fee by current session and school_id and or fee_option == "general" level== level

  $data['payable_fees'] =  $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);

}

//school_id term session 
 $data['paid_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and term child_id

  $data['paid_fees'] = $this->parents_model->get_divisional_paid_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
 //divisional
  //get fee by current division/term and session and child_id
  $data['paid_fees'] =  $this->parents_model->get_sessional_paid_fees($session,$data['school']['id'],$data['child']);

}
       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/manage_payments_view',$data);
        $this->load->view('common/footer_view',$data);







  }



}

public function check_results($child_id= NULL)
{
if($child_id == NULL)
  {
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | Select Child";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
    
$data['parent']= $this->parents_model->get_parent_by_id($_SESSION['parent_id']);
$data['children'] = $this->students_model->get_students_by_parent_id($_SESSION['parent_id']);


       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/select_child_view',$data);
    $this->load->view('common/footer_view',$data);


  }else{

$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew.com | Check Result";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";



$data['child'] = $this->students_model->get_student_by_reg_no($child_id);
$data['parent']= $this->parents_model->get_parent_by_id($data['child']['parent_id']);
$data['child_level'] = $this->schools_model->get_level_by_class($data['child']['class'],$data['child']['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($data['child']['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$session = $data['school_sessions'][count($data['school_sessions'])-1];
$term = $data['school']['term'];
$data['term'] =$term;
$data['session'] =$session;

//school_id term session 
 $data['payable_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and school_id and or fee_option == "general" and fee_option == myoptio level== level

  $data['payable_fees'] = $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
  //get fee by current session and school_id and or fee_option == "general" level== level

  $data['payable_fees'] =  $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);

}

//school_id term session 
 $data['paid_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and term child_id

  $data['paid_fees'] = $this->parents_model->get_divisional_paid_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
 //divisional
  //get fee by current division/term and session and child_id
  $data['paid_fees'] =  $this->parents_model->get_sessional_paid_fees($session,$data['school']['id'],$data['child']);

}


//check result here

//get results
$data['result_elements'] = $this->schools_model->get_results_elements(array("school_id" =>$data['school']['id'],
"student_id" =>$child_id ,
'term' => $data['term'],
"session" => $data['session']
));


       $this->load->view('common/head_meta_view',$data);
        //$this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/results_view_test',$data);
        //$this->load->view('common/footer_view',$data);
  }
}


public function view_payment_history($child_id)
{
$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew | Manage Payments";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";

    $data['child'] = $this->students_model->get_student_by_reg_no($child_id);
$data['parent']= $this->parents_model->get_parent_by_id($data['child']['parent_id']);
$data['child_level'] = $this->schools_model->get_level_by_class($data['child']['class'],$data['child']['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($data['child']['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$session = $data['school_sessions'][count($data['school_sessions'])-1];
$term = $data['school']['term'];

//school_id term session 
 $data['paid_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and term child_id

  $data['paid_fees'] = $this->parents_model->get_divisional_all_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
 //divisional
  //get fee by current division/term and session and child_id
  $data['paid_fees'] =  $this->parents_model->get_sessional_all_fees($session,$data['school']['id'],$data['child']);

}
       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/payments_history_view',$data);
        $this->load->view('common/footer_view',$data);






}

public function pre_paymentgateway_fee()
{if (isset($_POST['submit'])) {
  





$data['web_favicon_slug'] = "assets/images/favicon.ico";
$data['description'] = NULL;
      $data["title"] ="Gettew |PAY FEES";
      $data["keywords"] ="gettew,school,free,Management,Software,result,checking";
      $data["author"] ="Ojeyinka olaniyi philip";
     $data["descriptions"] ="Online and offline school Management Service for schools
     and colleges";
$child_id = $this->input->post('student_id');
    $data['child'] = $this->students_model->get_student_by_reg_no($child_id);
$data['parent']= $this->parents_model->get_parent_by_id($data['child']['parent_id']);
$data['child_level'] = $this->schools_model->get_level_by_class($data['child']['class'],$data['child']['school_id']);
$data['school'] = $this->schools_model->get_school_by_id($data['child']['school_id']);

$data['school_sessions'] = json_decode($data['school']['session'],true);

$session = $data['school_sessions'][count($data['school_sessions'])-1];
$term = $data['school']['term'];
//school_id term session 
 $data['payable_fees'] = NULL;
if($data['school']['fee_option'] == "term")
{
  //divisional
  //get fee by current division/term and session and school_id and or fee_option == "general" and fee_option == myoptio level== level

  $data['payable_fees'] = $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);



}else{
//sessional
  //get fee by current session and school_id and or fee_option == "general" level== level

  $data['payable_fees'] =  $this->parents_model->get_divisional_payable_fees($session,$term,$data['school']['id'],$data['child']);

}

if ($this->input->post('how') =="part") {

 $data['amount_to_pay'] =$this->input->post('amount');

}else{
$data['amount_to_pay'] =$this->input->post('total_amount');

}

//generate ref
 $array_char = array('A','B','C','D');
    $i = mt_rand(0,3);
    $data['ref'] = 'gtw'.uniqid().$array_char[$i];
    $_SESSION['hold'] = array('ref' => $data['ref'],'amount'=>$data['amount_to_pay'],
    'currency_code'=> "NGN"/*$currency_code*/);

//insert PRe_pay payment
    $pre_payment = array(
      'student_id'=>$child_id,
       'ref'=> $data['ref'] ,
       'method'=>"online_payment",
       'amount'=> $data['amount_to_pay'],
       'status'=>'pre_pay',
       'session'=> $session,
       'term'=> $term,
       'level'=>$data['child']['class'],
       'school_id'=> $data['school']['id'],
       'time'=> time()
     );

    $this->parents_model->insert_prepay_payment($pre_payment);
    
       $this->load->view('common/head_meta_view',$data);
        $this->load->view('users/parent/common/header_view',$data);
        $this->load->view('users/parent/pre_paymentgateway_fee_view',$data);
        $this->load->view('common/footer_view',$data);






}else{

  show_page('parents/dashboard');
}



}


public function confirm_pay_payment()
{

 /* $_SESSION['hold'] = array('ref' => $ref,'amount'=>$amount,'currency_code'=>$currency_code); as saved from frontend*/

  if(!isset($_SESSION['hold']['ref']))
  {
           
$_SESSION['action_status_report'] ="<span class='w3-text-red'>Unknown Error Occurred</span>";
$this->session->mark_as_flash('action_status_report');
show_page("parents");
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
//update fee_balance of school
//update total_fee_processed of school
$paymentRecord = $this->parents_model->get_payment_record_by_ref_id($_SESSION['hold']['ref']);
$school = $this->schools_model->get_school_by_id($paymentRecord['school_id']);
//update school data
$this->schools_model->update_school_details(array(
"fee_balance" => $school['fee_balance']+ $chargeAmount,
"total_fee_processed"=> $school['total_fee_processed']+ $chargeAmount
),$paymentRecord['school_id']);

//update payment record to paid
$this->parents_model->update_payment_record(array(
'status' => 'paid'
),$_SESSION['hold']['ref']);

$hold_ref = $ref;
//unset
unset($ref);
//unset session variable here
unset($_SESSION['hold']);

$_SESSION['action_status_report'] ="<span class='w3-text-green'>Payment Successfully Processed</span>";
$this->session->mark_as_flash('action_status_report');
show_page("parents/manage_payments/".$hold_ref);
        } else {
            //Dont Give Value and return to Failure page
          $_SESSION['action_status_report'] ="<span class='w3-text-red'>Payment Failed</span>";
$this->session->mark_as_flash('action_status_report');
show_page("parents/pay_fees");
        }
    }



}



}