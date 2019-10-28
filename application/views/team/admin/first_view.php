<div class="w3-twothird w3-center">
  <div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Users Statistics</b></div>

  <div class="w3-row w3-center w3-small">
    <div class="w3-half">
Users Accounts:<?php echo "<span class='w3-text-green'>".$num_of_users."</span>"; ?><br>
New Accounts in the last 24hrs:<?php echo $num_of_users_24; ?><br>
No Free Accounts:<?php echo $num_of_free_users; ?><br>
<span class="w3-text-green w3-serif w3-large">No Premium Accounts:<?php echo $num_of_premium_users; ?></span><br>


    </div>
    <div class="w3-half">
     Users Online in the last 24hrs:<?php echo $num_of_users_online_24; ?><br>
Users Online in the last 30days:<?php echo $num_of_users_online_30d; ?><br>
Users Upgraded in the last 24hrs:<?php echo $num_of_users_up_24; ?><br>
Users Upgraded in the last 30days:<?php echo $num_of_users_up_30d; ?><br>


    </div>




  </div>


<div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Admin Earnings</b></div>

  <div class="w3-row w3-center w3-small">
    <div class="w3-half">
Total Earnings:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$total_a_earning."</span>"; ?><br>
Total Earnings Last 24hr:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$total_earning_24."</span>"; ?><br>
Total Earnings Last 30days:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$total_earning_30d."</span>"; ?><br>
Total Minor Earnings(500) Last 24hrs:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$admin_earning_24_minor."</span>"; ?><br>
Total Minor Earnings(500) Last 30days:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$admin_earning_30d_minor."</span>"; ?><br>
Total Major Earnings(1500) Last 24hrs:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$admin_earning_24_major."</span>"; ?><br>
Total Major Earnings(1500) Last 30days:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$admin_earning_30d_major."</span>"; ?><br>


    </div>
    <div class="w3-half">
     Number of Total Transaction:<?php echo $num_of_total_transaction; ?><br>
      Number of Major(1500) Transaction:<?php echo $num_major_transaction; ?><br>
       Number of Minor(500) Transaction:<?php echo $num_minor_transaction; ?><br>
Number of Admin Earning  in the last 30days:<?php echo $num_of_transaction_30d; ?><br>
Number of Admin Earning the last 24hrs:<?php echo $num_of_transaction_24; ?><br>
   </div>
</div>



<div class="w3-text-xxlarge w3-text-blue w3-margin"><b>Users Earning</b></div>

  <div class="w3-row w3-center w3-small">
    <div class="w3-half">
Total Users' Pending balance(Ready to be withdrawn):<?php echo "<span class='w3-text-indigo'> <del>N</del>".$pending_earning."</span>"; ?><br>

    </div>
    <div class="w3-half">
     Total Users Refering balance:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$bal_earning."</span>"; ?><br>Total Users BA balance:<?php echo "<span class='w3-text-indigo'> <del>N</del>".$ba_earning."</span>"; ?><br>

    </div>




  </div