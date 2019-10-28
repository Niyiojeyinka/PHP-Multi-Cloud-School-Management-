<?php

class Parents_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Parents_model.php
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

public function get_parents_phones($cond)
{
$this->db->select("phone");

$query = empty($cond) ? $this->db->get("parents") : $this->db->get_where("parents",$cond);
return $query->result_array();
}

public function search_students($offset,$limit)
{

  
//get from firstname
$this->db->select('*');
 //$this->db->from('products');
 $this->db->like('firstname',$this->input->post("search"));
 $query = $this->db->get("students",$limit,$offset);



//get from lastname
 if(empty($query))
{
//try lastname

$this->db->select('*');
 //$this->db->from('products');
 $this->db->like('lastname',$this->input->post("search"));
 $query = $this->db->get("students",$limit,$offset);





}


 return $query->result_array();
}

public function insert_new_password()
{
$dab = array(

"password" => md5($this->input->post("new_password"))
)  ;

   if ($this->db->update("parents",$dab,array("id" => $_SESSION["parent_id"])))
   {
    return true;
   }
    return false;
}

public function insert_new_phone()
{
  $dab = array(

"phone" => $this->input->post("new_phone")

)  ;
 if ($this->db->update("parents",$dab,array("id" => $_SESSION["parent_id"])))
   {
 return true;

   }
return false;
}


public function get_parent($school_id)
{

$cond = array(
  'lastname' => $this->input->post('lastname'),
  "phone"=> $this->input->post('p_mobile_1'),
  'school_id' => $school_id
);

    $query = $this->db->get_where('parents',$cond);
  return $query->row_array();
}
public function insert_prepay_payment($pre_pay)
{

 $this->db->insert('students_payment',$pre_pay);
}

public function update_payment_record($rec,$ref)
{
  $this->db->update('students_payment',$rec,array('ref'=> $ref));
}
public function get_payment_record_by_ref_id($ref)
{

  $query = $this->db->get_where('students_payment',array('ref'=> $ref));
  return $query->row_array();
}
public function get_divisional_payable_fees($session,$term,$school_id,$child)
{
if (empty($child['student_options'])) {
 $option = "General";
}else{
  $option = $child['student_options'];
}
if ($option == 'General') {
  
$myquery = "SELECT * FROM fees WHERE session = '".$session."' AND term='".$term."' AND `option`='General';";
//student of the class has no category
}else{

  $myquery = "SELECT * FROM fees WHERE session = '".$session."' AND term='".$term."' AND (`option`='General' OR `option`='".$option."');";
//student of the class has category
}

$query = $this->db->query($myquery);
return $query->result_array();

}


public function get_sessional_payable_fees($session,$term,$school_id,$child)
{
  

if (empty($child['student_options'])) {
 $option = "General";
}else{
  $option = $child['student_options'];
}
if ($option == 'General') {
  
$myquery = "SELECT * FROM fees WHERE session = '".$session."' AND `option`='General' AND level = '".$child['class']."';";
//student of the class has no category
}else{

  $myquery = "SELECT * FROM fees WHERE session = '".$session."' AND level = '".$child['class']."' AND (`option`='General' OR `option`='".$option."');";
//student of the class has category
}

$query = $this->db->query($myquery);
return $query->result_array();

}

public function get_divisional_paid_fees($session,$term,$school_id,$child)
{
  $myquery = "SELECT * FROM students_payment WHERE session = '".$session."' AND term='".$term."' AND student_id ='".$child['student_id']."' AND school_id='".$school_id."' AND status='paid';";

$query = $this->db->query($myquery);
return $query->result_array();

}

public function get_sessional_paid_fees($session,$school_id,$child)
{
  $myquery = "SELECT * FROM students_payment WHERE session = '".$session."' AND student_id ='".$child['student_id']."' AND school_id='".$school_id."' AND status='paid';";

$query = $this->db->query($myquery);
return $query->result_array();

}

public function get_divisional_all_fees($session,$term,$school_id,$child)
{
  $myquery = "SELECT * FROM students_payment WHERE session = '".$session."' AND term='".$term."' AND student_id ='".$child['student_id']."' AND school_id='".$school_id."';";

$query = $this->db->query($myquery);
return $query->result_array();

}

public function get_sessional_all_fees($session,$school_id,$child)
{
  $myquery = "SELECT * FROM students_payment WHERE session = '".$session."' AND student_id ='".$child['student_id']."' AND school_id='".$school_id."';";

$query = $this->db->query($myquery);
return $query->result_array();

}

public function save_new_parent($arr)
{
$this->db->insert('parents',$arr);
}


public function update_parent_details($det,$parent_id)
{
    $this->db->update('parents',$det,array("id" => $parent_id));


}
public function get_parent_by_id($id)
{

$query= $this->db->get_where("parents",array("id"=> $id));
return $query->row_array();

}

public function get_parent_by_phone($phone)
{
$query= $this->db->get_where("parents",array("phone"=> $phone));
return $query->row_array();

}
public function login_check()
{

$this->db->select('password');

$query = $this->db->get_where('parents',array("phone" => $this->input->post("phone")));


$_pass = md5($this->input->post('password'));

if (!is_array($query->row_array())) {
 return false;
}

if (in_array($_pass,$query->row_array()) )
{
$datab  = array('lastlog' => time() );
$this->db->update('parents',$datab,array("phone" => $this->input->post("phone")));

return true;
}
   return false;
}

}
