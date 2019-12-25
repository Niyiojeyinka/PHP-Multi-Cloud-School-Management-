
<div class="w3-container w3-center">
	<br>
	<span class="w3-xlarge w3-text-teal w3-margin">Starter Settings</span><br>

<br>

	<span class="w3-medium w3-text-teal w3-margin">Primary Color</span><br>

<form method="post" action="<?php echo current_url();?>">
<?php
$colors = array('','blue','green','teal','red','orange','blue-gray','cyan','deep-blue','purple','aqua','lime','sand','pink','amber','pale-blue','pale-green');
for ($i=1; $i < count($colors) ; $i++) { 
	
	echo '<span class="w3-margin"><input type="radio" class="w3-jumbo" name="color" value="'.$colors[$i].'"/>';

     echo "<span class='w3-padding w3-tag w3-xlarge w3-".$colors[$i]."'></span></span>";
     if($i%4==0)
     {
     	echo "<br>";
     }
}
 
?>




<br>
<input type="submit" class="w3-button w3-teal w3-margin" name="submit" value="Change Primary Color" />
</form>

<?php
if(isset($_POST['color']))
{

 setData("primary_color",$_POST['color']);

}

echo "<br>";
echo '<span class="w3-medium w3-text-teal w3-margin">Current Primary Color</span>';
echo "<br>";
echo "<br><br><span class='w3-padding w3-tag w3-xlarge w3-".getData("primary_color")."'></span><br>";



 echo '<br><a class="w3-button" href="'.site_url('prewebsettings_action/theme_settings/'.$this->uri->segment(3)).'/edit_home">  <i  style="margin-right:3%" class="fa fa-eye w3-text-teal w3-large w3-center"></i>View</a>';
?>




</div>
