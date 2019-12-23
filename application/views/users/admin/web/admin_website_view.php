<div class='w3-container w3-center w3-serif'><br>
<span class="w3-text-teal w3-margin w3-xlarge">Website Details</span><br>

<hr>
<!--
<span class="w3-tiny">Need help? check our <a class="w3-text-theme" href="<?= site_url('docs/admin/school_website_first_step') ?>">documentation</a></span><br>
-->
<hr>
<div class="w3-text-red"><?= validation_errors() ?></div>


<?= form_open('Gettew_prewebsettings/index/'.$this->uri->segment(3)) ?>
<div class="w3-container w3-margin">
<div class="w3-half">
	
<span class="w3-label">School Website Name</span><br>
<input type="text" name="web_name" class="w3-padding" placeholder="Website Name" value="<?= set_value('web_name') ?>" required>
<br>

</div>
<div class="w3-half">
	
<span class="w3-label">School Motto/Tagline</span><br>
<input type="text" name="school_motto" class="w3-padding" placeholder="School Motto" value="<?= set_value('school_motto') ?>"required>
<br>



</div></div><br>

<span class="w3-label">Website Address</span><br>
<input type="text" id="web_address" name="web_address" class="w3-padding" placeholder="Website Address" required/>

<select id="web_name_o" name="web_name_o" class="w3-padding">
<option value=".<?= str_ireplace("www.","", $_SERVER[ 'HTTP_HOST' ])?>">.gettew.com (Free)</option>	

</select>

<div id="check_status"></div>

<script type="text/javascript">
	$("#web_address").change(function(){
   
   	var subdomain = $("#web_address").val();

   	if(subdomain == "")
   	{
   		subdomain = 'nocontent';
   	}else{

    subdomain = $("#web_address").val()+""+$("#web_name_o").val();

    }

 $.get("/index.php/gettew_prewebsettings_action/check_sub_domain/"+subdomain, function(data, status){

 	if (status == "success")
 	{
       $("#check_status").html( data );
 	}else {
$("#check_status").html("A connection Error Occurred");

 	}

    });

});

</script>


<br>
<button type="submit" class="w3-button w3-theme w3-margin">Next <i class="fa fa-arrow-right"></i></button>
</form>
</div>

