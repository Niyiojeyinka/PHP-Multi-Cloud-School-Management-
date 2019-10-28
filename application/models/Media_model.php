<?php

class Media_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    media_model.php
 * About:        A model class that handle Gettew users  model operation
 * Copyright:  (C) 2019
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    $this->load->library('session');

}
public function insert_media($new_media)
{
  $this->db->insert('media',$new_media);
}

public function get_media_contents($offset,$limit,$subdomain)
{
  $this->db->order_by('id', 'DESC');
$query = $this->db->get_where('media',array("subdomain" => $subdomain),$limit,$offset);
  return $query->result_array();

}


}