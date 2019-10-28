<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subwebsite extends CI_Controller {

public function __construct()
{
     parent::__construct();
  $this->load->model(array('websites_model'));
  $this->load->library(array('form_validation'));
  $this->load->helper(array('url','form','theme_helper','blog_helper','page_helper'));
     
}

public function index($slug = NULL)
	{
$address = $_SERVER[ 'HTTP_HOST' ];
$address_id ;
if(stripos($address, "gettew"))
{

	$entry_domain_type ="sub";
//definitely its a sub domain
$address_split = explode(".", $address);

if(count($address_split) == 4){
//remove www to be able to compare it with db
 $address_id = str_ireplace("www.", "", $address);

}elseif (count($address_split) == 3) {
//its ok
$address_id = $address;

}
//get by subdomain

 
$theme_id = $this->websites_model->get_web_theme(array(
"subdomain" => trim($address_id)
))['theme_id'];
//var_dump($theme_id);

}else{
		$entry_domain_type ="top";
$address_id =str_ireplace("www.", "", $address);

$cond = array(
"domain" => str_ireplace("www.", "", $address)
);
$theme_id = $this->websites_model->get_web_theme($cond)['theme_id'];


}

if (empty($theme_id)) {
	echo "Website not found";
	echo " Create one on <a href='http://gettew.com'>gettew.com</a>";
	return;
}

$data['theme_id'] = $theme_id;
$data['web_favicon_slug'] = "assets/images/gettew.png";
//set school image shown on fb here

if(	$entry_domain_type =="sub")
{
$arr =array("subdomain" => $address_id);
}else{
$arr =array("domain" => $address_id);

}
$data['school_web'] = $this->websites_model->get_school_website($arr);
$data['description'] = $data['school_web']['name']." | ".$data['school_web']['tagline'];
$data["title"] = $data['school_web']['name']." | ".$data['school_web']['tagline'];
$data["keywords"] = NULL;
$data["author"] =  NULL;
$data["descriptions"] = NULL;
//worry about how to do this later

$theme = $this->websites_model->get_theme_by_id($theme_id);
$data['slug'] = $slug;
$this->load->view("themes/".$theme['theme_id']."/".$theme["public_route_file"],$data);

	}

}
