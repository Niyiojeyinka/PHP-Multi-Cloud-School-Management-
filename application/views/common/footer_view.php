

<!-- modal div -->

 <div id='notification_container' style='max-width:600px;<?=isset($_SESSION['display_modal'])? 'display: block;':'display:none;' ?>;' class='w3-modal'>
  <div class='w3-modal-content w3-teal'>
    <header class='w3-container w3-center'><h2>Notifications</h2>
      <span onclick='document.getElementById("notification_container").style.display="none"'
      class='w3-button w3-display-topright'>&times;</span>

    </header>


<div class="w3-container w3-white w3-text-teal">
  
<?php
//go against mvc here
$cond = array("school_id" => $_SESSION['school_id'],"achieve_status" => "false");
$actions = $this->users_model->get_actions($cond);
if (!empty($actions)){
 foreach ($actions as $action) {

  if($action['type'] =="post")
  {
    //get object from db
$post = $this->db->get_where("blog",array("ref" => $action['object_ref']))->row_array();
//var_dump($post);
    //get initiator from db
    $author = $this->db->get_where("staff",array("staff_id"=> $post['staff_id']))->row_array();

echo "<div class='w3-border w3-margin w3-padding'>";
echo "<span class='w3-text-teal'>";
echo "<a href='".site_url('gettew_webfunction/news_preview/'.$post['subdomain'].'/'.$post['slug'])."'>";
echo $post['title'];
echo "</a>";
echo "<a class='w3-tiny w3-button w3-margin w3-green w3-hover-white w3-border w3-border-green w3-hover-text-green' href='".site_url('gettew_dashboard_cont/action/approve/post/'.$post['id']."/".$post['ref'])."'>Approve</a>";
echo "<a class='w3-tiny w3-button w3-margin w3-red w3-hover-white w3-border w3-border-red w3-hover-text-red' href='".site_url('gettew_dashboard_cont/action/disapprove/post/'.$post['id']."/".$post['ref'])."'>Reject</a>";
echo "</span><br>";

echo "</div>";

  }elseif ($action['type'] == "sms") {
  

    //get object from db
$sms = $this->db->get_where("pending_sms",array("ref" => $action['object_ref']))->row_array();
    //get initiator from db
    $author = $this->db->get_where("staff",array("staff_id"=> $sms['staff_id']))->row_array();

echo "<div class='w3-border w3-margin w3-padding'>";
echo "<span class='w3-text-teal'>";
echo "<div class='w3-small'><b>SMS</b>";
echo $sms['message'];
echo "</div>";
//echo var_dump($author);
echo "<span class=''>".$author['firstname']." ".$author['lastname']." (".$author['staff_id'].")</span>";
echo "<a class='w3-tiny w3-button w3-margin w3-green w3-hover-white w3-border w3-border-green w3-hover-text-green' href='".site_url('gettew_dashboard_cont/action/approve/sms/'.$sms['id']."/".$sms['ref'])."'>Approve</a>";
echo "<a class='w3-tiny w3-button w3-margin w3-red w3-hover-white w3-border w3-border-red w3-hover-text-red' href='".site_url('gettew_dashboard_cont/action/disapprove/sms/'.$sms['id']."/".$sms['ref'])."'>Reject</a>";
echo "</span><br>";

echo "</div>";

 
  }
   




 
  }
}

?>




</div>

        <footer class='w3-container w3-center w3-theme'>
          <p>&copy; Gettew <?php
         if (date('y') == 19)
         {
         echo '20'.date('y');
         }else{
         echo '2019 - 20'.date('y');
         }
         ?></p>
        </footer>
      </div></div>
<?php

if(isset($_SESSION['logged_in']) && isset($_SESSION['id']) && $this->uri->segment(2) != "theme_settings")
{
  
 $pending_actions = $this->db->get_where("pending_actions",array("school_id"=> $_SESSION['school_id'],'achieve_status'=>"false"))->result_array();

$hold = '<div onclick=\'document.getElementById("notification_container").style.display="block"\' class="w3-card w3-padding w3-circle"  style="position: fixed;bottom:10%;right:3%;"> <i 
 class="fa fa-bell-o w3-label w3-xxlarge w3-serif"></i><span class="w3-tag w3-red w3-text-white w3-circle">'.count($pending_actions).'</i></div>';
echo $hold;


}




if(isset($_SESSION['staff_reg']) )
{
  
 
$hold = '<a href="'.site_url('staff/logout').'"><div class="w3-card w3-padding w3-circle"  style="position: fixed;bottom:10%;right:3%;"> <i 
 class="fa fa-minus w3-label w3-xxlarge w3-serif"></i><span class="w3-text-teal">Logout</span></div></a>';
echo $hold;


}




?>

<!-- Footer start here -->
<footer class="w3-container w3-padding-32 w3-light-grey w3-center w3-xlarge">
  <div class="w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-github w3-hover-opacity"></i>
    <i class="fa fa-android w3-hover-opacity"></i>
    <i class="fa fa-windows w3-hover-opacity"></i>
    <i class="fa fa-apple w3-hover-opacity"></i>
    <i class="fa fa-globe w3-hover-opacity"></i>

     </div>
              <span class="w3-xlarge w3-margin-left w3-padding w3-border w3-border-black w3-round-large"><b>Gettew</b></span>
		<p class="w3-small w3-margin-top">Copyright © Gettew - All rights reserved,  <a style="text-decoration: none;" href="http://Gettew.com">Gettew.com</a></p>

</footer>
</body>
</html>
