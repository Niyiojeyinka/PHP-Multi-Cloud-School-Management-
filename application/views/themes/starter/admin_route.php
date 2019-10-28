<?php

if($admin_slug =="setting" || empty($admin_slug))
{
	renderAdminPage('starter','admin/setting');


}elseif($admin_slug == "edit_home")
{
	renderPage('starter','pages/starter_homepage.php');

}

?>


