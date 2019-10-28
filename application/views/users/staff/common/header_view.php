<div class="w3-padding-xlarge w3-margin-bottom w3-teal w3-center w3-top w3-border w3-border-white">
<span class="w3-xlarge"><b><?=$school['name'] ?> <span class='w3-small'>Staff's Dashboard</span></b></span>
</div><br><br>
 <div class="w3-row-padding w3-margin-bottom w3-margin-top">
   
<a href="<?=site_url('staff/manage_articles') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-desktop w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Manage Article</h4>
      </div>
    </div></a>

   <a href="<?=site_url('staff/manage_students') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?= ""?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students</h4>
      </div>
    </div></a>
   <a href="<?=site_url('staff/result_manager') ?>"> <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-graduation-cap w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?= ""?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Manage Result</h4>
      </div>
    </div></a>
    <a href="<?=site_url('staff/settings') ?>"><div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-cogs w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?= ""?></h3>
        </div>
        <div class="w3-clear"></div>
        <h5>Settings</h5>
      </div>
    </div> </a>
  </div>

	