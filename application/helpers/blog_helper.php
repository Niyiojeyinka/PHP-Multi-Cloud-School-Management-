<?php


/***
 * Name:       HitMark
 * Package:     blog_helper.php
 * About:       blog_helper 
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


function get_blog_excerpt($content,$limit)
{

$excerpt = str_split($content,$limit);
  return $excerpt[0];

}
