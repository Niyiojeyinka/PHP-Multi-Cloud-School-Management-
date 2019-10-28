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
<div class="w3-margin"><b class="w3-xlarge w3-text-teal w3-margin w3-serif">Team Login</b></div> <br>
<span class="w3-block w3-text-red"><?=validation_errors() ?></span>
<?= isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:"" ?>
<?= form_open('back_controller/login')?>

<span class="w3-label">Team ID</span>
<input type="text" name="team_id" placeholder="Team ID" class="w3-input w3-margin" value="<?=empty($this->uri->segment(3))? "": strtoupper($this->uri->segment(3)) ?>" />
<span class="w3-label">Password</span>
<br>
<input type="password" name="password" placeholder="Password" class="w3-input w3-margin w3-animate-input" /><br>
<input type="submit" name="submit" value="Sign In" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-round-large w3-large">
</form>
<br>

</div>	
</center>
</div>









