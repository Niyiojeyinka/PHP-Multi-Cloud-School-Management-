<?php

if ($slug == NULL) {
	
	renderPage('starter','pages/starter_homepage.php');
}elseif ($slug == 'yes') {

	echo getWebsiteSubdomain();
}else{
		renderPage('starter','pages/404page.php');

}



?>