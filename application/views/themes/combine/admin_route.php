<?php

if($admin_slug =="setting" || empty($admin_slug))
{
	renderAdminPage('combine','admin/setting');


}elseif($admin_slug == "edit_home")
{
	renderPage('combine','pages/homepage.php');

}elseif($admin_slug == "edit_forecard")
{
	renderPage('combine','admin/forecard_setting');

}

?>


