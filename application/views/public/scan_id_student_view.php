<style type="text/css">
@media screen and (min-width: 600px){
	#floatdiv {
		max-width: 60%;
		padding:64px 64px 64px 64px; 
	}
	#parentdiv {
		padding : 128px 64px 64px 64px;
}
}
@media screen and (max-width: 600px){
	#floatdiv {
		max-width: 90%;
		padding: 32px;
}
	#parentdiv {
		padding-top: 64px;
}
}

</style>
<div style="background-image: url('<?=base_url('assets/images/profiles/bgg.png') ?>');" class="w3-container  w3-center" id="parentdiv" >

	<center>
<div id="floatdiv" class="w3-card-8  w3-white">
	<div>
		<!--profile div--->
		<div>
			<?= isset($_SESSION['action_status_report'])?$_SESSION['action_status_report']."<br>":"" ?>
			
<span class="w3-text-teal w3-xlarge"><b><?=$school['name'] ?></b></span><br>
<img style="width:128px;height:128px" src="<?php 
if(empty($student['profile_img']))
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url('assets/images/profiles/'.$student['profile_img']);

}
?>" class="w3-circle w3-margin"/><br><br>
<span class="w3-text-theme w3-large w3-margin"><?=ucfirst($student['firstname']." ".$student['middlename']." ".$student['lastname']) ?></span>
<br>
		</div>
		
<?php
if (isset($_SESSION['student_id'])){
	if (empty($student['profile_img'])) {
		
?>
<!--HTML to show Student logged in-->
<?= form_open_multipart('students/process_profile_image')  ?>


 <input type="file" name="image" class="w3-padding w3-margin" />

<div id="preview"  class="w3-center"></div>


<script type="text/javascript">
 $('input[type="file"]').change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];

        var img = document.createElement("img");
         img.setAttribute("class","w3-image w3-circle");
         img.setAttribute("width","128");
           img.setAttribute("height","128");
        
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
        }
        reader.readAsDataURL(file);
        $("#preview").html(img);
    }
});
 </script>
<br>
<input type="submit" class="w3-button w3-small w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-round-large w3-margin" value="Save Image" name="submit"></input><br>

</form>









<?php
}
}
?>








	</div>
<div class=""><b class="w3-xlarge w3-text-teal w3-margin w3-serif">Student</b></div> <br>
<div class="w3-margin-right">
<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=site_url('idcard/check_results/'.$this->uri->segment(2)) ?>">Check Result</a>
<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=site_url('idcard/pay_fees/'.$this->uri->segment(2)) ?>">Pay FEES</a>

<a class="w3-button w3-block w3-round-large w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin" href="<?=site_url('idcard/check_pay_fees/'.$this->uri->segment(2)) ?>">Confirm FEEs</a>
</div>
</div>	
</center>












<!-- Footer start here -->
<footer class="w3-container w3-padding-32 w3-center w3-xlarge">
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
</div>



</body>
</html>

