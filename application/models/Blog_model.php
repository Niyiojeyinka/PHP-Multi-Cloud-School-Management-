<?php

class Blog_model extends CI_Model {


/***
 * Name:        Gettew model
 * Package:    blog_model.php
 * About:        A model class that handle citedlink's blogging model operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();

}



public function insert_post($image,$subdomain)
{
$slg = url_title($this->input->post('title'),"dash",TRUE);

$post = array(

'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
'status' => 'published',
'author' => $_SESSION['id'],
'subdomain' => $subdomain,
'description' => NULL,
'keywords' => NULL,
'img_url' => $image,
'time' => time(),
'slug' => $slg
);

if( $this->db->insert('blog',$post))
{
return true;

}
return false;
}



public function edit_post($image,$slug)
{

$post = array(

'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
'status' => 'published',
'img_url' => $image,
'time' => time(),
);

if( $this->db->update('blog',$post,array("slug" => $slug)))
{

return true;

}
return false;





}




public function insert_page($subdomain)
{
$slg = url_title($this->input->post('title'),"dash",TRUE);

$page = array(

'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
'status' => 'published',
'author' => $_SESSION['id'],
'description' => NULL,
'keywords' => NULL,
'subdomain' => $subdomain,
'time' => time(),
'slug' => $slg
);

if( $this->db->insert('pages',$page))
{


return true;

}
return false;





}

public function edit_page($slug)
{

$page = array(

'text' => $this->input->post('contents'),
'title' => $this->input->post('title'),
'status' => 'published',
'time' => time(),
);

if( $this->db->update('pages',$page,array("slug" => $slug)))
{

return true;

}
return false;





}





public function get_multiple_news($offset,$limit,$subdomain)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('blog',array("subdomain" => $subdomain),$limit,$offset);
  return $query->result_array();

}

public function get_post_by_slug($slug)
{ 
$query = $this->db->get_where('blog',array("slug" => $slug));
  return $query->row_array();
}



public function get_multiple_pages($offset,$limit,$subdomain)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('pages',array("subdomain" => $subdomain),$limit,$offset);
  return $query->result_array();

}

public function get_page_by_slug($slug)
{ 
$query = $this->db->get_where('pages',array("slug" => $slug));
  return $query->row_array();
}

public function post_action($action,$post_id,$action_ref){
if ($action== "approve"){
  $this->db->update('blog',array('status' => 'published'),array( "id" => $post_id));
  

}else{

    $this->db->update('blog',array('status' => 'draft'),array( "id"=> $post_id));

}
  $this->db->update('pending_actions',array('achieve_status' => 'true','read_status' => "read"),array( "object_ref" => $action_ref));
}


public function disapprove_sms($action_ref){

  $this->db->update('pending_actions',array('achieve_status' => 'true','read_status' => "read"),array( "object_ref" => $action_ref));
}
public function get_pending_msg_by_ref($action_ref){
$query = $this->db->get_where('pending_sms',array('ref' => $action_ref));
return $query->row_array();

}
public function delete_item($type,$id,$address_id)
{

if( $type == "news")
{

if($this->db->delete("blog",array('slug' => $id,"subdomain"=> $address_id)))
{
return true;
}
return false;

}elseif($type == "page")
{


if($this->db->delete("pages",array('slug' => $id,"subdomain"=> $address_id)))
{
return true;
}
return false;
}elseif ($type =="media"){
	


if($this->db->delete("media",array('id' => $id,"subdomain"=> $address_id)))
{
	//delete the image file here later
return true;
}
return false;


}elseif ($type =="subject"){
  
//check for school auth here

if($this->db->delete("subjects",array('id' => $id)))
{
  //delete the image file here later
return true;
}
return false;


}elseif ($type =="fee"){
  
//check for school auth here

if($this->db->delete("fees",array('id' => $id)))
{
  //delete the image file here later
return true;
}
return false;


}elseif ($type =="staff"){
  
//check for school auth here

if($this->db->delete("staff",array('staff_id' => $id)))
{
  //delete the image file here later
return true;
}
return false;


}elseif ($type =="event"){
  
//check for school auth here

if($this->db->delete("events",array('ref' => $id)))
{
return true;
}
return false;


}elseif ($type =="slider"){
  
//delete picture
if($this->db->delete("sliders",array('ref' => $id)))
{
return true;
}
return false;


}





}
}