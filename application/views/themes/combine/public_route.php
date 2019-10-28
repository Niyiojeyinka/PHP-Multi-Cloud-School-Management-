<?php

if ($slug == NULL) {
	
	renderPage('combine','pages/homepage.php');
}elseif (substr($slug, 0,4) == 'blog') {

	renderPage('combine','pages/blog_post.php');
}elseif ($slug == 'yes') {

	echo getWebsiteSubdomain();
}else{
	
		renderPage('starter','pages/404page.php');

}



?>