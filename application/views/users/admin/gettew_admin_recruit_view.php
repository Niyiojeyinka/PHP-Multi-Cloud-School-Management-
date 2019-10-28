<div class="w3-container w3-center">


  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Recruit New Staff</span><br>
  <hr>
  <a href="#" class="w3-button w3-theme w3-center">View Staff</a><br>
  <hr>

  <div class="">
    <?= form_open('pryper_Dashboard') ?>
    <span class="w3-label">Search</span>

    <input style="" class='w3-center w3-padding-top w3-padding-bottom
    w3-margin-bottom w3-margin-top w3-light-grey' style='width:50%'
    type='search' name='search' value="<?= set_value(
      'search') ?>" placeholder='Chemistry Teacher' required></input>

          <select class="w3-center w3-padding-top w3-padding-bottom
          w3-margin-bottom w3-margin-top w3-light-grey" name="staff_type">
            <option value="">Sort By Age</option>
                      <?php


for($i = 20; $i <= 60; $i++)
{


  echo   '<option value="'.$i.'"> Less Than '.$i.' Years Old</option>';
}

             ?>
          </select>

          <select class="w3-center w3-padding-top w3-padding-bottom
          w3-margin-bottom w3-margin-top w3-light-grey" name="staff_type">
          <option value="">Gender</option>
          <option value="Both">Both</option>
   <option value="Male">Male</option>
          <option value="Female">Female</option>

        </select>
   

<input type="submit" name="submit" value="Search" class="w3-button w3-teal"/>
</form></div>


<hr>
  <span class="w3-text-theme w3-xlarge w3-center">Wait List</span><br>
  <hr>

</div>









