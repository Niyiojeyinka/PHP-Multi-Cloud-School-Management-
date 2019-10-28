<div class="w3-container w3-center"><br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Messages</span><br>
<?= isset($_SESSION['action_status_report'])? $_SESSION['action_status_report']:'' ?>
<span class="w3-text-red"><?=validation_errors() ?></span>

  <br>
  <hr>
 
 <center><div style="overflow-y: scroll;height: 300px;max-width: 80%;">
 
  <?php
  //var_dump($level_data);
if(!empty($messages))
{
 echo  '<table class="w3-table w3-center w3-striped">
    <tr><td><b>Reference</b></td><td><b>Receiver</b></td><td><b>Session</b></td><td><b>Term/Division</b></td><td><b>Time</b></td></tr>';
foreach ($messages as $message) {
    ?>
<tr><td><?=$message['ref'] ?></td><td><?=$message['receiver'] ?></td><td><?=$message['session'] ?></td><td><?=$message['term'] ?></td><td><?=date("F j, Y, g:ia ",$message['time']) ?></td></tr>


   <?php
}
echo "</table>";
}else{

  echo "<hr>No Recent  Sent Messges<hr>";
}


  ?>

 </div></center>

</div>
