<?php


/***
 * Name:       Gettew
 * Package:     page_helper.php
 * About:       page helper
 * Copyright:  (C) 2019,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/
function get_grade_remark($score)
{

if ($score < 40 ) {
	
	return "Failed";
}elseif ($score >= 40 && $score < 45){
	return "Pass";
}elseif ($score >=45  && $score < 50){
	return "Fair";
}elseif ($score >=50  && $score < 60){
	return "Good";
}elseif ($score >=60  && $score < 70){
	return "Very Good";
}elseif ($score >=70  && $score <= 100){
	return "Excellent";
}

}
function get_grade_class($score)
{


if ($score < 40 ) {
	
	return "F";
}elseif ($score >= 40 && $score < 45){
	return "E";
}elseif ($score >=45  && $score < 50){
	return "D";
}elseif ($score >=50  && $score < 60){
	return "C";
}elseif ($score >=60  && $score < 70){
	return "B";
}elseif ($score >=70  && $score <= 100){
	return "A";
}

}
 function get_class_by_level($level,$school_id)
{

	$CI =& get_instance();
	$query = $CI->db->get_where('schools_level',array('level'=> $level,'school_id'=> $school_id));
return $query->row_array();


}
function get_no_in_class($level,$school_id,$session,$term)
{

	$CI =& get_instance();
	$query= "SELECT DISTINCT student_id
FROM results WHERE level ='".$level."' AND school_id ='".$school_id."' AND session ='".$session."' AND term ='".$term."';";
//return $query;
		$query = $CI->db->query($query);
return count($query->result_array());


}

function get_sub_percentage_avg_in_class($subject,$level,$school_id,$session,$term)
{

	$CI =& get_instance();
	$CI->db->select('percentage_total');
	$query= $CI->db->get_where('results',array('level'=> $level,'school_id'=> $school_id,'session'=> $session,'term'=> $term,'subject'=>$subject));
	$results =  $query->result_array();
$total_sum = 0;
foreach ($results as $result) {
	$total_sum = $total_sum + $result['percentage_total'];
}

return $total_sum/count($results);

}
function get_sub_position_in_class($position,$subject,$level,$school_id,$session,$term)
{

	$CI =& get_instance();
	$CI->db->select('percentage_total');
	$query= $CI->db->get_where('results',array('level'=> $level,'school_id'=> $school_id,'session'=> $session,'term'=> $term,'subject'=>$subject));
	$results =  $query->result_array();
$score_array = [];
foreach ($results as $result) {
	array_push($score_array, $result['percentage_total'] );
}

array_multisort($score_array);
if ($position =="highest") {

return $score_array[count($score_array)-1];
}else{
	return $score_array[0];

}
	
}


