<style type="text/css">
	
@media screen and (max-width: 650px){
	#mobileborderless {
		display: block;
}
}
</style>
<div class="w3-center w3-small w3-margin">
	<div class="w3-container w3-block w3-center w3-border w3-border-black w3-small" style="display: inline-block;max-width: 90%"><img style="width:80px;height:80px" src="<?php 
if($school['profile_img'] == NULL)
{
  echo base_url(
  'assets/images/profiles/test.png');
}else{

echo base_url(
  'assets/images/profiles/'.$school['profile_img']);

}
?>" class="w3-margin-right w3-margin" style="display: inline-block;"/>
		<div style="display: inline-block;"><span class="w3-text-teal w3-xlarge"><?=$school['name'] ?></span><br><span class="w3-text-teal w3-small"><?=$school['address'] ?></span></div>
	</div>
	

<?php 
$first_row = $result_elements[0];
 ?>

<div class="w3-container w3-margin">
	<span class="w3-padding w3-border w3-border-black" id="mobileborderless"><b>Name :</b><?=$child['firstname']." ".$child['middlename']." ".$child['lastname']?></span>
	<span class="w3-padding w3-border w3-border-black" id="mobileborderless"><b>Reg No :</b><?=$child['student_id'] ?></span>
	<span class="w3-padding w3-border w3-border-black" id="mobileborderless"><b>SEX : </b><?=$child['gender'] ?></span>
<span class="w3-padding w3-border w3-border-black" id="mobileborderless"><b>YEAR : </b><?=$first_row['year'] ?></span>

</div>
<div class="w3-row">
<div class="w3-third" style="overflow-x: scroll;">
<table  class="w3-margin" border="1">
	
<tr><td class="w3-padding-xlarge"><b>Score(%)</b></td><td class="w3-padding-xlarge"><b>Grade</b></td><td class="w3-padding-xlarge"><b>Remark</b></td></tr>
   <tr><td>70-100</td><td>A</td><td>Excellent</td></tr>
   <tr><td>60-69</td><td>E</td><td>Very Good</td></tr>
   <tr><td>50-59</td><td>E</td><td>Credit</td></tr>
   <tr><td>45-50</td><td>D</td><td>Fair</td></tr>
   <tr><td>40-44</td><td>E</td><td>Pass</td></tr>
	
	<tr><td>0-39</td><td>F</td><td>Fail</td></tr>

</table>
</div><div  style="overflow-x: scroll;" class="w3-twothird">
<table class="w3-margin w3-small" border="1">
	
<tr><td class="w3-padding-large"><b>SESSION</b></td><td class="w3-padding-xlarge"><b>TERM/DIVISION</b></td><td class="w3-padding-large"><b>CLASS/LEVEL</b></td><td class="w3-padding-large"><b>STUDENTS IN CLASS</b></td><td class="w3-padding-large"><b>NO OF TIME<BR> SCHOOL OPENS</b></td><td class="w3-padding-large"><b>NO OF TIME<BR> PRESENT</b></td></tr>
   <tr><td><?=$first_row['session'] ?></td><td><?=$first_row['term'] ?></td><td><?=get_class_by_level($first_row['level'],$school['id'])['level_shortname'] ?></td><td><?php


//get no those in saME class as the user in that year and session,school_id
 echo get_no_in_class($first_row['level'],$school['id'],$session,$term)
 ?></td><td>N/A</td><td>N/A</td></tr>
</table>
</div></div>
<div style="max-width:100%;overflow-x: scroll;" class="w3-container">
		<span class="w3-text-teal w3-xlarge">Performance In Subjects</span>

<table class="w3-small w3-margin w3-center w3-table"  border="1">
<tr>	
	<td colspan="2" rowspan="2" class="w3-padding-jumbo">Subjects</td>
	<td rowspan="2">1st Test</td>
<td>1st Test <br>Mark Obtainable</td>

<td>2nd test</td>
<td>2nd Test Mark<br> Obtainable</td>
<td>Examination</td>
<td>2nd Test Mark <br>Obtainable</td>
<td>Practical</td>
<td>Practical Mark <br>Obtainable</td>
<td>Class <br>Highest score</td>
<td>Class <br>Average score</td>
<td>Class <br>Lowest score</td>
<td>Percentage <br> scored</td>
<td>Score Class</td>
<td>Score Remarks</td>
</tr>	
	<tr></tr>

<?php
if (!empty($result_elements)) {
	$count =0;
	$total_percentage = 0;
	foreach ($result_elements as $each_result) {

		$count++;
		?>


<tr>
	<td colspan="2" class="w3-padding-xlarge"><?=$each_result['subject'] ?></td>
	<td><?=$each_result['first_test'] ?></td>
<td><?=$each_result['first_test_total'] ?></td>
<td><?=$each_result['second_test'] ?></td>
<td><?=$each_result['second_test_total'] ?></td>
<td><?=$each_result['exam_score'] ?></td>
<td><?=$each_result['exam_total'] ?></td>
<td><?=$each_result['practical_score'] ?></td>
<td><?=$each_result['practical_total'] ?></td>

<td><?= get_sub_position_in_class('highest',$each_result['subject'],$first_row['level'],$school['id'],$session,$term)?></td>
<td><?= get_sub_percentage_avg_in_class($each_result['subject'],$first_row['level'],$school['id'],$session,$term)?></td>
<td><?= get_sub_position_in_class('lowest',$each_result['subject'],$first_row['level'],$school['id'],$session,$term)?></td>

<td><?=$each_result['percentage_total'] ?>%</td>
<td><?=get_grade_class($each_result['percentage_total']) ?></td>
<td><?=get_grade_remark($each_result['percentage_total']) ?></td>
</tr>	


<?php
$total_percentage =$total_percentage+$each_result['percentage_total'];
	}




}else{




}



?>


</table>
</div>
<div class="" >


	<!--CALCULATE AMOUNT PAID AND ALSO PAYABLE AMOUNT-->
	<?php
		$paid_total_fee = 0;
 foreach ($paid_fees as $fee){

 $paid_total_fee = $paid_total_fee+$fee['amount'];
}
	$total_fee=0;
	foreach ($payable_fees as $fee) {
	
		$total_fee = $total_fee+$fee['amount'];

	}

?>



<table style="display: inline-block;" border="1" class="w3-margin">
	<tr><td class="w3-padding"><b>TOTAL FEE PAYABLE</b></td><td class="w3-padding"><b>TOTAL AMOUNT PAID</b></td></tr>
	<tr><td>NGN<?=$total_fee ?></td><td>NGN<?=$paid_total_fee ?></td></tr>
</table>

<table style="display: inline-block;overflow-x: scroll;max-width: 90%" class="w3-margin w3-small" border="1">
<tr><td class="w3-padding-large"><b>Total Score</b></td><td class="w3-padding-xlarge"><b>Score <br>Obtainable</b></td><td class="w3-padding-large"><b>Total Percentage Scored</b></td><td class="w3-padding-large"><b>Total Percentage Grade</b></td><td class="w3-padding-large"><b>Total Percentage Remark</b></td></tr>
   <tr><td><?=$total_percentage ?></td><td><?=$count*100 ?></td><td><?= $per = ($total_percentage/($count*100))*100?></td><td><?=get_grade_class($per) ?></td><td><?=get_grade_remark($per) ?></td></tr>
</table>

</div>



<?php
if (in_array($child['class'],json_decode($school['show_position'],true)) && false) {
	?>
<div class="w3-center w3-margin"><span class="">Position In Class:</span> <b><span id="position_bold">Calculating....</span></b></div>


	<?php
}

?>

<button class="w3-btn w3-light-grey w3-border w3-border-gray" onclick="window.print();return false;">Print</button>
</div>