<div id="singleblog" class="w3-center">

<b><?php
echo $item['title']; ?></b><br>
<i class="w3-small">Posted at <?php
echo date( "F j, Y, g:i a",$item['time']);
?></i>

<br>

<center style="max-width:95%" class="w3-container w3-serif"><?php echo ($item['text']); ?></center>

</div>