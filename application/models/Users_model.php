<?php

class Users_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Users_model.php
 * About:        A model class that handle Pryper user  model operation
 * Copyright:  (C) 2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

}
//new
public function register()
{
$trial_expire_time = time()+(14*24*60*60);

     $schl_reg = array(

 'name' =>  $this->input->post('schoolname'),
'address' => $this->input->post('address'),
'phone' => $this->input->post('phone'),
'email' => $this->input->post('email'),
'show_position'=> '[]',
'student_options' =>'["Science","Art","Commercial"]',
'session'=> '[]',
'session_division'=>'[]',
'license' => 'trial',
'license_expire' => $trial_expire_time,
"time" => time()
);
   $this->db->insert('schools',$schl_reg);
    $query = $this->db->get_where('schools',array("phone" => $this->input->post('phone')));
  $school_id = $query->row_array()['id'];

     $reg = array(

'firstname' =>  $this->input->post('firstname'),
'lastname' =>  $this->input->post('lastname'),
'password' =>  md5(md5($this->input->post('password'))),
"school_id" => $school_id,
'phone' => $this->input->post('phone'),
'email' => $this->input->post('email'),
 'time' => time()

);

$this->db->insert('users',$reg);
 return true;


}

public function insert_new_password()
{
$dab = array(

"password" => md5(md5($this->input->post("new_password")))
) ;

   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {
    return true;
   }
    return false;
}

//new
public function login_check()
{

$this->db->select('password');

$query = $this->db->get_where('users',array("phone" => $this->input->post("phone")));


$_pass = md5(md5($this->input->post('password')));

if (!is_array($query->row_array())) {
 return false;
}


if (in_array($_pass,$query->row_array()) )
{
$datab  = array('lastlog' => time() );
$this->db->update('users',$datab,array("phone" => $this->input->post("phone")));



  return true;
}
   else
   {
   return false;
   }






}
/*
public function forg($emmail)
{


$this->db->select('password');
$query = $this->db->get_where('users',array("email" => $emmail));

foreach ($query->result_array() as $arr)
{
return $arr['password'];
}

}

*/
public function edit_user_location($loc)
{
$this->db->update('users',$loc);
}
//new
public function get_user_by_its_id($id)
{


    $query = $this->db->get_where('users',array("id" => $id));
  return $query->row_array();




}
public function get_actions($cond)
{
$query= $this->db->get_where('pending_actions', $cond);
return $query->result_array();

}

//new
public function get_user_by_phone($phone)
{


    $query = $this->db->get_where('users',array("phone" => $phone));
  return $query->row_array();




}

//new
public function get_user_by_id()
{


    $query = $this->db->get_where('users',array("id" => $_SESSION["id"]));
  return $query->row_array();




}



//New
public function insert_new_email()
{

$dab = array(

"email" => $this->input->post("nemail")

)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {



    return true;

   }
    return false;


}

//New
public function insert_new_phone()
{

$dab = array(

"phone" => $this->input->post("nphone"),
"status" => "unverified",
"phonevc" => md5(time())

)  ;






   if ($this->db->update("users",$dab,array("id" => $_SESSION["id"])))
   {



    return true;

   }
    return false;


}


public function update_user_details($user_db,$id)
{
  $this->db->update("users",$user_db,array("id" => $id));
}


}
