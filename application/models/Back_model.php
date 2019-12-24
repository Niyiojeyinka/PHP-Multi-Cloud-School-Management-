<?php

class Back_model extends CI_Model {


/***
 * Name:      Gettew
 * Package:    back_model.php
 * About:        A model class that handle Gettew users  model operation
 * Copyright:  (C) 2019
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/

 public function __construct()
{
    parent::__construct();
    $this->load->database();
    //$this->load->library('session');


}


public function login_check()
{
$team_id = $this->input->post("team_id");
$password = $this->input->post("password");
    if ($team_id == "commak" && $password == "commak") {
    	return true;
    }else{
 return false;

    }
}

public function get_site_meta()
{
 //get from db here later
$query= $this->db->get_where("system_var", ['variable_name'=> "site_meta"]);

//return json_decode($query->row_array()['long_value'],true);
 return ['title'=>"Cloud School management",'sitename'=>"Myschool App",'keywords'=>"Keyword separated by comma ','",'description'=>"The site SEO Description",'author'=>"Author"];
}
}