<div class="w3-center w3-row">
    <div class="w3-col l9">
<b class="w3-xlarge w3-text-theme">Add News</b><br>

<?php

echo form_open_multipart('gettew_webfunction/add_news/'.$this->uri->segment(3));

?>
<span class="w3-text-red"><?php
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
<input type="text" class="w3-border-blue-grey w3-padding" style="width:58%;" name="title" value="<?php echo set_value('title'); ?>" placeholder="News title"></input>
<br><br>


<script>
    $(document).ready(function() {
       $('#contents').summernote({
    height: ($(window).height() - 300),
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: '<?=site_url("gettew_webfunction/upload_image") ?>',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {
            var image = $('<img>').attr('src', /*'http://' + */url);
            $('#contents').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}});


</script>



<center>
<span class="w3-label">Contents:</span><br>
<textarea id="contents" placeholder="Article contents" class="w3-center w3-border-blue-grey" name="contents"  value="<?php  echo set_value('contents'); ?>" rows="25" cols="52"></textarea><br>


<br>

<?= site_url()?>

</center>
<span class="w3-label">Feature Image:</span><br>
<input type="file" class="w3-border-blue-grey w3-padding" style="width:60%;" name="fimg"  ></input><br>
<br>

<a class="w3-button w3-green" href="<?php echo site_url("media"); ?>">Go to Media</a><br>

<input type="submit" class="w3-btn w3-blue" value="Publish" name="submit"></input><br>


</div>


