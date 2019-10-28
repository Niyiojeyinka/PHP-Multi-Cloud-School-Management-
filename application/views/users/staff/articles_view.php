<div class="w3-container w3-center">

	<a class="w3-button w3-hover-blue w3-hover-text-white w3-round-large w3-text-blue" href="<?=site_url('staff/add_new_article') ?>">Create New Article</a><br>

	<span class="w3-xlarge w3-text-teal w3-margin">Manage Articles</span>
	<br><center>
	<div style="max-width: 70%;">Please Note that before your article can go live on the school website, your school head Admin /Director must approve it in his/her Dashboard <br>
<i class="fa fa-close w3-text-red"></i> --> Disapproved
<i class="fa fa-check w3-text-green"></i> --> Approved
<i class="fa fa-circle w3-text-yellow"></i> --> Pending<br>
if your post is not approved you can reapply by editing it. 
	</div></center>
<div class="w3-margin w3-padding">
	
	<div class="w3-container">
		
<?php
if (!empty($items))
{
foreach ($items as $item) {
	//design this later
echo "<div class='w3-container w3-margin w3-padding'>";
echo "<span class='fa fa-circle w3-text-black w3-tiny'> </span> <span class='w3-small'>";
echo $item['title'];
echo "</span><br>";
echo  "<a href='".site_url('staff/news_preview/'.$item['slug'])."' ><span class='fa fa-eye w3-text-theme w3-margin-right'></span></a> <!--<a href='".site_url('staff/delete_article/'.$item['slug'])."' ><span class='fa fa-trash w3-text-theme w3-margin-right'></span></a>-->  <a href='".site_url('staff/edit_article/'.$item['slug'])."' ><span class='fa fa-pencil w3-text-theme'></span></a> ";
if ($item['status'] == 'pending') {
	echo '<i class="fa fa-circle w3-text-yellow"></i>';
}elseif ($item['status'] == 'published') {
	echo ' <i class="fa fa-check w3-text-green"></i>';
	}else{
		echo ' <i class="fa fa-close w3-text-red"></i>';
	}

echo "</div>";

}
echo "<br>";
echo $pagination;
echo "<br>";

}else{

	echo "No News Item Available";
}



?>
	</div>





</div>









</div>