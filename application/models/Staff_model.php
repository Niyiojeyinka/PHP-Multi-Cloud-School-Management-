<?php

class Staff_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Staff_model.php
 * About:        A model class that handle Gettew users  model operation
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
public function get_staff_by_id($id)
{

$query= $this->db->get_where("staff",array("id"=> $id));
return $query->row_array();

}


public function get_staff_phones($cond)
{
$this->db->select("phone");

$query = empty($cond) ? $this->db->get("staff") : $this->db->get_where("staff",$cond);
return $query->result_array();

}

public function get_staff_member_by_reg_no($ref_id)
{
$query = $this->db->get_where('staff',array('staff_id' => $ref_id));
return $query->row_array();
}
public function insert_new_staff($staff)
{
	$this->db->insert("staff",$staff);

}

public function get_staff_member($cond)
{
	$query =  $this->db->get_where("staff",$cond);
	return $query->row_array();
}

public function get_no_of_staff($cond)
{
  $query = $this->db->get_where("staff" , $cond);
  return count($query->result_array());
}
public function get_school_staff_members($cond,$limit,$offset)
{
	 $query = $this->db->get_where("staff",$cond,$limit,$offset);
	 return $query->result_array();
}

public function search_staff($input_text,$offset,$limit)
{

$query = NULL;
  if(is_numeric(substr($input_text, 3)) )
  {



//get from reg no
$this->db->select('*');
 $this->db->like('staff_id',$this->input->post("search"));
 $query = $this->db->get("staff",$limit,$offset);



  }elseif(empty($query))
{
//try lastname

$this->db->select('*');
 $this->db->like('lastname',$this->input->post("search"));
 $query = $this->db->get("staff",$limit,$offset);



}


 return $query->result_array();
}


public function login_check()
{




$this->db->select('password');

$query = $this->db->get_where('staff',array("staff_id" => strtoupper($this->input->post("staff_id"))));


$_pass = md5($this->input->post('password'));
if (empty($query->row_array())) {
  $thearray = array();
}else{
$thearray =$query->row_array();
}
if (in_array($_pass,$thearray) )
{
$datab  = array('lastlog' => time() );
$this->db->update('staff',$datab,array("staff_id" => strtoupper($this->input->post("staff_id"))));

return true;
}
   return false;
}
public function get_multiple_articles($offset, $limit)
{
$query = $this->db->get_where("blog",array("staff_id" =>$_SESSION['staff_reg']),$limit,$offset);
return $query->result_array();
}
public function insert_post($subdomain,$ref)
{
$slg = url_title($this->input->post('title'),"dash",TRUE);

$post = array(

'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
"staff_id"=> $_SESSION['staff_reg'],
'status' => 'pending',
'author' => $_SESSION['staff_reg'],
'subdomain' => $subdomain,
'ref' => $ref,
'description' => NULL,
'keywords' => NULL,
'time' => time(),
'slug' => $slg
);

 $this->db->insert("blog",$post);
 return TRUE;
}
public function submit_staff_message($sms_det){
  $this->db->insert('pending_sms',$sms_det);
}
public function insert_new_action($action)
{

  $this->db->insert("pending_actions",$action);
}

public function update_profile_picture($image_slug)
{

  $this->db->update('staff',array('profile_img'=> $image_slug),array("staff_id" => $_SESSION['staff_reg']));
}
public function edit_post($slug,$ref)
{

$post = array(
"ref" => $ref,
'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
'status' => 'pending',
'time' => time(),
);

if( $this->db->update('blog',$post,array("slug" => $slug)))
{

return true;

}
return false;
}

public function insert_new_password()
{
$dab = array(

"password" => md5($this->input->post("new_password"))
)  ;

   if ($this->db->update("staff",$dab,array("staff_id" => $_SESSION["staff_reg"])))
   {
    return true;
   }
    return false;
}
public function insert_new_email()
{
  $dab = array(

"email" => $this->input->post("new_email")

)  ;
 if ($this->db->update("staff",$dab,array("staff_id" => $_SESSION["staff_reg"])))
   {
 return true;

   }
return false;
}
}
