<?php


/***
 * Name:       Gettew
 * Package:     student_helper.php
 * About:     student helper
 * Copyright:  (C) 2019,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

function get_student_fullname($student_id)
{

	$CI =& get_instance();
	$query = $CI->db->get_where('students',array('student_id'=>$student_id));
	$student= $query->row_array();
return $student['firstname']." ".$student['lastname'];
}