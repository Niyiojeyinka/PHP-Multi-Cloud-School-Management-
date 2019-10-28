<div class="w3-container w3-center"><br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Manage Fee</span><br>
<?= isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:'' ?>
<span class="w3-text-red"><?=validation_errors() ?></span>

  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">Add Fee</a></span>
  <hr>

  <div class="">
    <?= form_open('gettew_dashboard/manage_fee') ?>
    <span class="w3-label">FEE Title</span>
     <br>
    <input style="" class='w3-center w3-padding w3-border'
    type='text' name='fee_title' value="<?= set_value(
      'fee_title') ?>" placeholder='Fee Title ex Tuition' required/>
<br>
<span class="w3-label">Amount(NGN)</span>
     <br>
    <input style="" class='w3-center w3-padding'
    type='number' name='fee_amount' value="<?= set_value(
      'fee_amount') ?>" placeholder='Fee Amount ex 100000' required/><br>

       <span class="w3-label">Class/Level</span><br>
   <select class="w3-padding w3-margin" name="class_level">
    <option disabled selected>Please Select Class</option>
   <?php

foreach ($levels as $level) {

echo "<option value='".$level['level']."'>".$level['level_name']."</option>";

}
echo "</select>";

   ?>

<br>

       <span class="w3-label">Option</span><br>
   <select class="w3-padding w3-margin" name="option">
    <option value="general">General</option>
   <?php

foreach ($options as $option) {
echo "<option value='".$option."'>".$option."</option>";
}
echo "</select>";

   ?>

<br><br>
<div class="">
    <span class="">CURRENT SESSION</span>
<br>
     <span class="w3-large w3-text-theme "><?= isset($school_sessions[count($school_sessions)-1])? $school_sessions[count($school_sessions)-1]: ""  ?></span>


</div>

<div class="">
    <span class="">CURRENT Term or Divsion</span>
<br>
     <span class="w3-large w3-text-theme "><?=$school['term'] ?></span>


</div>
<input type="submit" name="submit" value="Add FEE" class="w3-button w3-teal w3-hover-white w3-hover-text-teal w3-border w3-border-teal w3-margin"/>
</form></div>


  <br>
  <hr>
  <span class="w3-text-theme w3-large w3-center">FEES</span><br>
  <hr>

 <center><div style="overflow-y: scroll;height: 300px;max-width: 80%;">
 
  <?php
  //var_dump($level_data);
if(!empty($fees))
{
 echo  '<table class="w3-table w3-center w3-striped">
    <tr><td><b>Fee Name</b></td><td><b>Amount</b></td><td><b>Class/Level</b></td><td><b>Option</b></td><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Delete</b></td></tr>';
foreach ($fees as $fee) {
    ?>
<tr><td><?=$fee['fee_title'] ?></td><td><?=$fee['amount'] ?></td><td><?=$level_data[$fee['level']-1]['level_shortname'] ?></td><td><?=$fee['option'] =="General"? "General": $fee['option'] ?></td><td><?=$fee['session'] ?></td><td><?=$fee['term'] ?></td><td><a href="<?=site_url('gettew_webfunction/confirm_delete/na/fee/'.$fee['id']) ?>"><span class="w3-large fa fa-close w3-text-red"></span></a></td></tr>


   <?php
}
echo "</table>";
}else{

  echo "<hr>No FEE Added for this session or Term<hr>";
}


  ?>

 </div></center>

</div>
