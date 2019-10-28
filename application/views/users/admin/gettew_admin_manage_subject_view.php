<div class="w3-container w3-center"><br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Manage Subjects</span><br>
<?= isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:'' ?>
<span class="w3-text-red"><?=validation_errors() ?></span>

  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">Add Subject</a></span>
  <hr>

  <div class="">
    <?= form_open('gettew_dashboard/manage_subject') ?>
    <span class="w3-label">Subject Name</span>

    <input style="" class='w3-center w3-padding'
    type='text' name='name' value="<?= set_value(
      'name') ?>" placeholder='Subject Complete Name' required/>

<input type="submit" name="submit" value="Add Subject" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal"/>
</form></div>


  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">Added Subjects</span><br>
  <hr>

 <center><div style="overflow-y: scroll;height: 300px;max-width: 80%;">
  <table class="w3-table w3-center w3-striped">
  <?php
if(!empty($added_subjects))
{
foreach ($added_subjects as $subject) {
    ?>
<tr><td><span class="w3-margin"><?= $subject['title']?></span></td><td><a href="<?=site_url('gettew_webfunction/confirm_delete/na/subject/'.$subject['id']) ?>"><span class="w3-large fa fa-close w3-text-red"></span></a></td></tr>


   <?php
}

}else{
  echo "No Subject Added";
}


  ?></table>

 </div></center>

</div>
