<?php

class Schools_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Schools_model.php
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

 $holder = array(

"lastlog" => time()



)  ;


   $this->db->update("users",$holder,array("id" => $this->session->id));


}
public function insert_sms_history($history)
{

  $this->db->insert("sms_history", $history);
}
public function save_result($row,$school_id,$session,$term)
{
//check the result if not already exists

//add if not else edit 
$row['school_id'] = $school_id;
$row['subject'] = $this->input->post('subject');
$row['session'] = $session;
$row['term'] = $term;
$row['time']=time();
$row['year'] = "20".date('y');
//get student level here 
$row['level'] =$this->db->get_where('students',array('student_id' => $row['student_id'] ))->row_array()['class'];


/*unique key = concatenation of school_id session student_id term subject  */
$unique_key = md5(strtolower($row['school_id'].$row['session'].$row['term'].$row['student_id'].$row['subject']));
$row['unique_key'] = $unique_key;

  $search_term = $this->db->get_where("results",array("unique_key" => $unique_key));
//CALCULATE PERCENTAGE
$student_score = $row['first_test']+$row['second_test']+$row['exam_score']+$row['practical_score'];
$obtainable_score =$row['first_test_total']+$row['second_test_total']+$row['exam_total']+$row['practical_total'];

$row['percentage_total'] = (($student_score/$obtainable_score)*100);




if (count($search_term->row_array()) < 1){
$this->db->insert("results",$row);
}else{
  $this->db->update("results",$row,array("unique_key" => $unique_key));
}

}

public function get_subjects($school_id)
{
  $this->db->order_by('id','DESC');
  $query = $this->db->get_where("subjects",array('school_id' => $school_id));
  return $query->result_array();
}
public function get_package_by_title($title)
{
  $query = $this->db->get_where("packages",array("title"=> $title));
  return $query->row_array();
}
public function save_csv($csv_det)
{
 $this->db->insert('result_csv',$csv_det); 
}
public function check_subject_if_added($title)
{
  $query = $this->db->get_where("subjects",array('title' => $title));
 if(empty($query->result_array()))
 {
  return true;
 }
return false;
}
public function insert_school_payment($payment){

$this->db->insert("payments",$payment);

}
public function get_results_elements($cond)
{
  $query = $this->db->get_where('results',$cond);
  return $query->result_array();
}
public function make_new_cbt_request($request)
{
  $this->db->insert("cbt_requests",$request);
}
public function add_subject($data)
{

  $this->db->insert("subjects",$data);
}
public function insert_student_payment($payment)
{
  $this->db->insert('students_payment',$payment);
}

public function update_payment_record($rec,$ref)
{
  $this->db->update('payments',$rec,array('ref'=> $ref));
}
public function get_school_payment_record_by_ref_id($ref){

$query = $this->db->get_where("payments",array("ref"=>$ref));
return $query->row_array();

}

public function get_schools($offset,$limit)
{


    //$this->db->order_by("lastlog","DESC");


    $query = $this->db->get('schools',$limit,$offset);
  return $query->result_array();
}
public function get_level_by_class($class,$school_id)
{
  $query = $this->db->get_where('schools_level',array("school_id" => $school_id, 'level'=> $class));
  return $query->row_array();
}
public function set_fee_option()
{

  $this->db->update("schools", array('fee_option'=> $this->input->post('fee_option')),array('id' => $_SESSION['school_id']));
}
public function get_messages($cond)
{

  $query = $this->db->get_where("sms_history",$cond);
  return $query->result_array();
}

public function get_sub_domain($arr)
{


    //$this->db->order_by("lastlog","DESC");


    $query = $this->db->get_where('websites',$arr);
  return $query->row_array();




}

public function insert_card_request($request)
{

  $this->db->insert('card_requests',$request);
}
public function insert_idcard_request($request)
{

  $this->db->insert('idcard_requests',$request);
}
public function insert_sessions($school_session,$school_id)
{
  $this->db->update('schools',array('session'=> $school_session),array('id' => $school_id));
}


public function change_term($term,$school_id)
{
  $this->db->update('schools',array('term'=> $term),array('id' => $school_id));
}



public function edit_session_division($divi,$school_id)
{



    $this->db->update('schools',$divi,array("id" => $school_id));


}





//new
public function get_level($arr)
{
$query = $this->db->get_where('schools_level',$arr);
return $query->row_array();
}


//new
public function get_levels($arr)
{
$query = $this->db->get_where('schools_level',$arr);
return $query->result_array();
}


//New
public function insert_level($lev)
{
   $this->db->insert("schools_level",$lev);
}


//new
public function get_school_by_id($school_id)
{
    $query = $this->db->get_where('schools',array("id" => $school_id));
  return $query->row_array();

}

public function get_class_name_by_level($level,$school_id)
{
  $query= $this->db->get_where("schools_level",array("level" => $level, "school_id" =>$school_id));
  return $query->row_array();

}
public function get_fees($cond)
{
  $query = $this->db->get_where("fees",$cond);
  return $query->result_array();

}
public function get_package_by_id($package_id)
{
$query = $this->db->get_where("packages",array('id' => $package_id));
return $query->row_array();

}
public function insert_new_fee($fee_data)
{
  $this->db->insert("fees",$fee_data);
}
public function get_packages()
{
$query = $this->db->get_where('subscriptions',array('school_id' => $_SESSION['school_id'],'status' => 'done'));
return $query->result_array();
}
public function insert_subscription($subscription)
{
  $this->db->insert("subscriptions",$subscription);
}
public function update_school_details($sch,$school_id)
{
  $this->db->update('schools',$sch,array('id'=> $school_id));
}
public function get_student_option($school_id)
{
$query= $this->db->get_where("schools",array('id' => $school_id));
return $query->row_array()['student_options'];

}
public function save_student_options($options_text,$school_id)
{
$this->db->update("schools",array("student_options"=>$options_text),array('id'=>$school_id));

}


public function edit_school($new_data,$school_id)
{
$this->db->update("schools",$new_data,array('id' => $school_id));
}


}
