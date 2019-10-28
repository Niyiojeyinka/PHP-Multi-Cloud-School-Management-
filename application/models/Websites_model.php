<?php

class Websites_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    Websites_model.php
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





//new
public function insert_new_website($arr)
{



$this->db->insert("websites",$arr);


}




public function get_themes($offset,$limit)
{


    //$this->db->order_by("lastlog","DESC");


    $query = $this->db->get('themes',$limit,$offset);
  return $query->result_array();




}


public function save_favicon($image_slug)
{

$this->db->update("websites",array('favicon' => $image_slug),array("school_id" => $_SESSION['school_id']));
}

public function get_school_website($arr)
{
 //$this->db->order_by("lastlog","DESC");
    $query = $this->db->get_where('websites',$arr);
  return $query->row_array();
}

/*
public function get_gettew_options($theme_id)
{

    $query = $this->db->get_where('themes',array("theme_id" => $theme_id));
  return json_decode($query->row_array()['feature_support'],true);




}
*/
//new
public function install_theme($theme_data,$subdomain)
{


   $this->db->update("websites",$theme_data,array("admin_id" => $_SESSION["id"],
    "subdomain" => $subdomain));




}


public function search_themes($text,$offset,$limit)
{
//get from firstname
$this->db->select('*');
 $this->db->like('name',$text);
 $query = $this->db->get("themes",$limit,$offset);

 return $query->result_array();
}


public function get_multiple_events($offset,$limit,$subdomain)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('events',array("subdomain" => $subdomain),$limit,$offset);
  return $query->result_array();

}


public function get_multiple_slider($offset,$limit,$subdomain)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('sliders',array("subdomain" => $subdomain),$limit,$offset);
  return $query->result_array();

}

public function get_event_by_ref_id($ref)
{
  $query= $this->db->get_where("events",array('ref'=> $ref));
  return $query->row_array();
}
public function insert_newevent($event)
{
$this->db->insert('events',$event);
return TRUE;
}
public function edit_event($event,$ref)
{

  $this->db->update('events',$event,array('ref'=> $ref));
  return TRUE;
}
public function get_website_by_subdomain($subdomain)
{

  $query =$this->db->get_where("websites",array('subdomain' => $subdomain));
  return $query->row_array();
}

//new
public function get_theme_by_id($theme_id)
{
$query = $this->db->get_where('themes',
array(
"theme_id" => $theme_id
));
return $query->row_array();
}



//new
public function get_web_theme($arr)
{
$query = $this->db->get_where("websites",$arr);
return $query->row_array();

}


//new
public function get_theme_id_by_subdomain($subdomain)
{
$query = $this->db->get_where('websites',array('subdomain' => $subdomain));
return $query->row_array()['theme_id'];
}
















}
