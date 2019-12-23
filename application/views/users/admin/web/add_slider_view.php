<div class="w3-center w3-row">
	<div class="w3-col l9"><br>
<b class="w3-xlarge w3-text-theme">Add Slider</b><br>

<?php

echo form_open_multipart('gettew_webfunction/add_slider/'.$this->uri->segment(3));

?>
<span ="w3-text-red"><?php
echo validation_errors(); ?>
</span>
<?php
if(isset($_SESSION['action_status_report']))
{

	echo $_SESSION['action_status_report'];

}
?>
<br>
<span class="w3-label">Title:</span><br>
<input type="text" class="w3-border-blue-grey w3-padding" name="title" value="<?php
if(isset($_SESSION['gettew_media_action']))
{
echo $_SESSION['gettew_media_action']['title'];
	}else{
		 echo set_value('title');
	}

 ?>" placeholder="Media title" <?php
if(isset($_SESSION['gettew_media_action']))
{
echo 'readonly';
	}
 ?>></input>
<br><br>

<style type="text/css">
  div.use {
  padding:5px 10px;
  //background:#00ad2d;
  border:1px solid #00ad2d;
  position:relative;
  color:#fff;
  border-radius:2px;
  text-align:center;
  //float:right;
  cursor:pointer
}
.hide_file {
    position: absolute;
    z-index: 1000;
    opacity: 0;
    cursor: pointer;
    right: 0;
    top: 0;
    height: 100%;
    font-size: 24px;
    width: 100%;
    
}
</style>
<br>
<span class="w3-serif w3-text-teal w3-small w3-margin">Upload File<br><i class="w3-tiny"> (click to choose file)<i></span><br>

<div class="use w3-button w3-teal w3-hover-white w3-hover-text-teal"><i class="fa fa-file-image-o w3-jumbo"></i>
 <input type="file" name="media" class="hide_file" />
</div>
<div id="preview"  class="w3-center"></div>
<script type="text/javascript">
 $('input[type="file"]').change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];

        var img = document.createElement("img");
         img.setAttribute("class","w3-image");
        
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
<input type="submit" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-round-large w3-margin" value="Save Slider Image" name="submit"></input><br>

<br>
<!--<a class="w3-button w3-white w3-hover-teal w3-text-teal" href="<?php echo site_url("media"); ?>">Go to Media</a>--><br>
</div>

