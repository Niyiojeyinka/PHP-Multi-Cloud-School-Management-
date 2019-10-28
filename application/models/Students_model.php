<?php

class Students_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Students_model.php
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


public function login_check()
{

$this->db->select('password');

$query = $this->db->get_where('students',array("student_id" => strtoupper($this->input->post("student_id"))));


$_pass = md5($this->input->post('password'));

if (!is_array($query->row_array())) {
 return false;
}

if (in_array($_pass,$query->row_array()) )
{
$datab  = array('lastlog' => time() );
$this->db->update('students',$datab,array('student_id' => $this->input->post("student_id")));

return true;
}
   return false;
}


public function search_students($input_text,$offset,$limit)
{

  if(is_numeric(substr($input_text, 3)) )
  {



//get from reg no
$this->db->select('*');
 //$this->db->from('products');
 $this->db->like('student_id',$this->input->post("search"));
 $query = $this->db->get("students",$limit,$offset);



  }elseif(empty($query))
{
//try lastname

$this->db->select('*');
 //$this->db->from('products');
 $this->db->like('lastname',$this->input->post("search"));
 $query = $this->db->get("students",$limit,$offset);



}else{


//get from firstname
$this->db->select('*');
 //$this->db->from('products');
 $this->db->like('firstname',$this->input->post("search"));
 $query = $this->db->get("students",$limit,$offset);



  }


 return $query->result_array();
}

public function get_students_by_parent_id($parent_id)
{
  $query = $this->db->get_where('students', array('parent_id' => $parent_id));
  return $query->result_array();
}

public function update_profile_picture($image_slug)
{

  $this->db->update('students',array('profile_img'=> $image_slug),array("student_id" => $_SESSION['student_id']));
}




public function get_payments($cond,$offset=NULL,$limit=NULL)
{
$this->db->order_by("id","DESC");
$query = $this->db->get_where('students_payment',$cond,$limit,$offset);
return $query->result_array();
}
public function save_new_student($stud)
{


 $this->db->insert('students',$stud);
}

//new
public function get_student_by_reg_no($id)
{
$query = $this->db->get_where('students',array('student_id' => $id ));
return $query->row_array();
}

//new 
public function edit_student_details($datab,$reg_no)
{

  $this->db->update("students",$datab,array("student_id" => $reg_no));
}

public function get_parents_ids($cond)
{
    $this->db->select("parent_id");
  $query = $this->db->get_where("students",$cond);
return $query->result_array();
}

public function get_no_of_students($cond)
{
  $query = $this->db->get_where("students" , $cond);
  return count($query->result_array());
}


public function get_school_students($cond,$limit,$offset)
{
   $query = $this->db->get_where("students",$cond,$limit,$offset);
   return $query->result_array();
}


}
