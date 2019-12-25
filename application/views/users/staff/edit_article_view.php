
        <!---editor dependency plus jquery-->  
  <link rel="stylesheet"  href="<?php echo base_url('assets/bootstrap3.3.5/css/bootstrap.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>">
        </script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap3.3.5/js/bootstrap.js'); ?>">
        </script>
<link rel="stylesheet"  href="<?php echo base_url('assets/dist/summernote.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/dist/summernote.js'); ?>">

</script><div class="w3-center ">
    <div class="">
<b class="w3-xlarge w3-text-theme">Edit Article</b><br>

<?php

echo form_open_multipart('staff/edit_article/'.$this->uri->segment(3));

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
<input type="text" class="w3-border-blue-grey w3-padding" style="width:58%;" name="title" value="<?= $item['title'] ?>" placeholder="News title"></input>
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
        url: '<?=site_url("webfunction/upload_image") ?>',
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
<textarea id="contents" placeholder="Article contents" class="w3-center w3-border-blue-grey" name="contents"  ><?= $item['text'] ?></textarea><br>


<br>
</center>



<input type="submit" class="w3-button w3-padding w3-hover-white w3-round-large w3-border w3-border-blue w3-hover-text-blue w3-blue w3-margin" value="Update" name="submit"></input><br>


</div>


